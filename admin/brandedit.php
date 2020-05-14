<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php'?>
<?php 
    $brand = new brand();
    if(!isset($_GET['brandid']) || $_GET['brandid']==NULL){
        echo "<script>window.location = 'brandlist.php'</script>";
        
    }else{
        $id = $_GET['brandid'];
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $brandName = $_POST['brandName'];
       

        $updateBrand = $brand->update_brand($brandName,$id);
    }
?>
<?php ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục thương hiệu</h2>
                <div class="block copyblock">
                <?php
                    if(isset($update_brand)){
                        echo $update_brand;
                    }
                ?>
                <?php 
                    $get_Name= $brand->getnamebyId($id);
                    if($get_Name){
                        while($result = $get_Name->fetch_assoc()){
                ?>                
                 <form acction = "" method= "post">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input type = "text" value="<?php echo $result['brandName'] ?>" name="brandName" placeholder="Sửa danh mục thương hiệu của bạn..." class="medium" />
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Edit" />
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
<?php include 'inc/footer.php';?>