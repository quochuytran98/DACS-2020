<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php'?>
<?php 
    $cat = new category();
    if(!isset($_GET['catname']) || $_GET['catname']==NULL){
        echo "<script>window.location = 'catlist.php'</script>";
        
    }else{
        $name = $_GET['catname'];
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $catName = $_POST['catName'];
       

        $updateCat = $cat->update_Category($catName,$name);
    }
?>
<?php ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục sản phẩm</h2>
                <div class="block copyblock">
                <?php
                    if(isset($update_Category)){
                        echo $update_Category;
                    }
                ?>
                <?php 
                    $get_Name= $cat->getnamebyId($name);
                    if($get_Name){
                        while($result = $get_Name->fetch_assoc()){
                ?>                
                 <form acction = "" method= "post">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input type = "text" value="<?php echo $result['catName'] ?>" name="catName" placeholder="Sửa danh mục sản phẩm của bạn..." class="medium" />
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