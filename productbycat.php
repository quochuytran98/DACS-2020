<?php
	include 'inc/header.php';


?>
<?php 
	if(!isset($_GET['catname']) || $_GET['catname']==NULL){
        echo "<script>window.location = '404.php'</script>";
        
    }else{
        $name = $_GET['catname'];
    }
    // if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

    //    $size = $_POST['size'];
    //    $quantity = $_POST['quantity'];
    //    $addCart = $ct->AddToCart($name,$quantity,$size);
    // }
 ?>


 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">

    		<h3>Sản phẩm thuộc danh mục: <?php echo $name ?></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php  
						
					
						$prodList = $pro->Show_ProductByCat($name);
						if($prodList){
						
							while ($result = $prodList->fetch_assoc()) {
							
						
				 ?>
				<div class="grid_1_of_4 images_1_of_4">
					
				
					 <a href="preview-3.php"><img src="admin/uploads/<?php echo $result['image']?>" width = "200px" height="200px"   alt="" /></a>
					 <h2><?php echo $result['productName'] ?></h2>
					 
					 <p><span class="price"><?php echo $result['price']."VNĐ" ?></span></p>
				     <div class="button"><span><a href="details.php?proname=<?php echo $result['productName'] ?>" class="details">Mua</a></span></div>
				     
				</div>
				<?php 
					}
				}
			 ?>
				
			</div>

	
	
    </div>
 </div>
<?php
	include 'inc/footer.php';
	

?>