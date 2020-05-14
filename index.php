<?php
	
	include 'inc/header.php';
	include 'inc/slider.php';

?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>SẢN PHẨM NỔI BẬT</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
	      		$get_ProductbyType = $pro->Get_ProductFeathered();
	      		if($get_ProductbyType){
	      			while($result =$get_ProductbyType->fetch_assoc()){


	      		
	      	 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proname=<?php echo $result['productName'] ?>"><img src="admin/uploads/<?php echo $result['image']?>" width = "200px" height="200px" alt="" /></a>
					 <h2 href="details.php?proname=<?php echo $result['productName'] ?>" ><?php echo $result['productName'] ?> </h2>
					 <!-- <p><?php echo $fm->textShorten($result['description'],30) ?></p> -->
					 <p><span class="price"><?php echo $result['price']." VNĐ" ?> </span></p>
				     <div class="button"><span><a href="details.php?proname=<?php echo $result['productName'] ?>" class="details">Mua</a></span></div>
				</div>
				<?php  
				}
			}
				?>
				
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Sản phẩm mới</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php 
	      		$get_ProductNew = $pro->get_ProductNew();
	      		if($get_ProductNew){
	      			while($result_new =$get_ProductNew->fetch_assoc()){


	      		
	      	 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proname=<?php echo $result_new['productName'] ?>"> <img src="admin/uploads/<?php echo $result_new['image']?>" width = "200px" height="200px" alt="" /></a>
					 <h2 href="details.php?proname=<?php echo $result_new['productName'] ?>"><?php echo $result_new['productName'] ?> </h2>
					 <!-- <p><?php echo $fm->textShorten($result_new['description'],30) ?></p> -->
					 <p><span class="price"><?php echo $result_new['price']." VNĐ" ?> </span></p>
				     <div class="button"><span><a href="details.php?proname=<?php echo $result_new['productName'] ?>" class="details">Mua</a></span></div>
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