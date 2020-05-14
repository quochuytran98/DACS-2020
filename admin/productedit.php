
<?php include 'inc/header.php';?>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<?php include 'inc/sidebar.php';?>
<?php include '../classes//brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php'?>

<?php 
    $prod = new product();
    if(!isset($_GET['prodid']) || $_GET['prodid']==NULL){
        echo "<script>window.location = 'productlist.php'</script>";
        
    }else{
        $id = $_GET['prodid'];
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

       

        $updateProd = $prod->update_product($_POST,$_FILES,$id);
    }
?>

<div class="grid_10">  
    <div class="box round first grid">
        <h2>Cập nhật sản phẩm</h2>
        <?php
                    if(isset($updateProd)){
                        echo $updateProd;
                    }
                ?> 
        <?php 
                    $get_list= $prod->getproductByid($id);
                    if($get_list){
                        while($result_prod = $get_list->fetch_assoc()){
                ?>           

        <div class="block">               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên sản phẩm</label>
                    </td>
                    <td>
                        <input type="text" name= "productName" value="<?php echo $result_prod['productName'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Thương hiệu</label>
                    </td>
                    <td>
                        <select id="brand" name="brand" >
                            
                            <?php
                                $brand = new brand();
                                $brandlist = $brand->show_brand();
                                if($brandlist){
                                    while ($result = $brandlist->fetch_assoc()) {
                                        
                            ?>
                                 <option 
                                    <?php 
                                        if($result['brandId'] == $result_prod['brandId']){
                                            echo 'selected';
                                        }

                                     ?>

                                 value="<?php echo $result['brandId']?>"><?php echo $result['brandName']?></option>
                            <?php  
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Danh mục</label>
                    </td>
                    <td>
                        <select id="category" name="category"  class="form-control action">
                            
                            <?php
                                $cat = new category();
                                $catlist = $cat->show_category();
                                if($catlist){
                                    while ($result = $catlist->fetch_assoc()) {
                                        
                            ?>
                                 <option 
                                 <?php 
                                        if($result['catId'] == $result_prod['catId']){
                                            echo 'selected';
                                        }

                                     ?>
                                 value="<?php echo $result['catId']?>" data-name="<?= $result['catName'] ?>"><?php echo $result['catName']?></option>
                            <?php  
                                }
                            }
                            ?>
                            
                        </select>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Size</label>
                    </td>
                    <td>
                        <select id="size" name="size"  class="form-control">
                           <!--  <option>Chọn Size</option>
 -->                            <option><?php echo $result_prod['size']?></option>
                            
                          
                        </select>
                    </td>
                </tr>
               
                
                
                <tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input type="text" name= "price" value= "<?php echo $result_prod['price'] ?>"  class="medium" />
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea name="description" class="tinymce"><?php echo $result_prod['description']?></textarea>
                    </td>
                </tr>
            
            
                <tr>
                    <td>
                        <label>Hình ảnh</label>
                    </td>
                    <td>
                        <img scr="upload/<?php echo $result_prod['image']?>" width="80" ?>
                        <input  type="file" name="image" />
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Loại sản phẩm</label>
                    </td>
                    <td>
                        <select id="type" name="type" >
                            <option>Chọn loại sản phẩm</option>
                            <?php 
                                if($result_prod['type'] !=0){                               
                             ?>
                                <option selected value="1">Nổi bật</option>
                                <option value="0">Không nổi bật</option>
                            <?php 
                            }else{
                            ?>
                                <option  value="1">Nổi bật</option>
                                <option  selected value="0">Không nổi bật</option>
                            <?php 
                            }
                             ?>
                            
                        </select>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="Save" />
                    </td>
                </tr>
            </table>
            </form>
             <?php 
                }
            }
                ?> 
        </div>
    </div>
</div>

<!-- Load TinyMCE -->

<script>
    $(document).ready(function(){
        $('#category').change(function(){
            var catName = $('#category option:selected').text();
            data = {
                category:1,
                catName:catName
            };
            $.ajax({
                url:"size.php",
                type:"POST",
                data:data
            }).done(function(result){
                $('#size').html(result);
                
            })
        })

    });
</script>
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>

<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


