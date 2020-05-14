<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php'?>
<?php 
    $cat = new brand();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $brandName = $_POST['brandName'];
       

        $insertName = $cat->insert_Brand($brandName);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm thương hiệu</h2>
               <?php
                    if(isset($insert_Brand)){
                        echo $insert_Brand;
                    }
                ?> 
               <div class="block copyblock"> 
                 <form acction = "brandadd.php" method= "post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type = "text" name="brandName" placeholder="Thêm thương hiệu của bạn..." class="medium" />
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