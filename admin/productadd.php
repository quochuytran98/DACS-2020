
<?php include 'inc/header.php';?>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<?php include 'inc/sidebar.php';?>
<?php include '../classes//brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php'?>
<?php 
    $prod = new product();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

       

        $insertProd = $prod->insert_product($_POST,$_FILES);
    }
?>

<div class="grid_10">  
    <div class="box round first grid">
        <h2>Thêm mới sản phẩm</h2>
        <?php
                    if(isset($insertProd)){
                        echo $insertProd;
                    }
                ?> 
        <div class="block">               
         <form action="productadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên sản phẩm</label>
                    </td>
                    <td>
                        <input type="text" name= "productName" placeholder="Nhập tên sản phẩm..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Thương hiệu</label>
                    </td>
                    <td>
                        <select id="brand" name="brand">
                            <option>Chọn thương hiệu</option>
                            <?php
                                $brand = new brand();
                                $brandlist = $brand->show_brand();
                                if($brandlist){
                                    while ($result = $brandlist->fetch_assoc()) {
                                        
                            ?>
                                 <option value="<?php echo $result['brandId']?>"><?php echo $result['brandName']?></option>
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
                        <select id="category" name="category" class="form-control action">
                            <option>Chọn danh mục</option>
                            <?php
                                $cat = new category();
                                $catlist = $cat->show_category();
                                if($catlist){
                                    while ($result = $catlist->fetch_assoc()) {
                                        
                            ?>
                                 <option value="<?php echo $result['catId']?>" data-name="<?= $result['catName'] ?>"><?php echo $result['catName']?></option>
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
                        <select id="size" name="size" class="form-control">
                            <option>Select size</option>
                            
                          
                        </select>
                    </td>
                </tr>
               
                
                
                <tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input type="text" name= "price" placeholder="Nhập giá..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea name="description" class="tinymce"></textarea>
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Hình ảnh</label>
                    </td>
                    <td>
                        <input  type="file" name="image" />
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Loại sản phẩm</label>
                    </td>
                    <td>
                        <select id="type" name="type">
                            <option>Chọn loại sản phẩm</option>
                            <option value="1">Nổi bật</option>
                            <option value="0">Không nổi bật</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
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


