﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php'?>
<?php 
    $cat = new category();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $catName = $_POST['catName'];
        $catSize = $_POST['catSize'];
       

        $insertCat = $cat->insert_category($catName,$catSize);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm danh mục sản phẩm</h2>
                <?php
                    if(isset($insertCat)){
                        echo $insertCat;
                    }
                ?>
               <div class="block copyblock"> 
                 <form acction = "catadd.php" method= "post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type = "text" name="catName" placeholder="Thêm danh mục sản phẩm của bạn..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type = "text" name="catSize" placeholder="Thêm size..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>