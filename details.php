<?php
	include 'inc/header.php';

?>
<style>
	.container ul{
		color: black;
	}
	.container ul li{
			float: left;
			list-style: none;
			 /*/*height: 50px; **/
			  line-height: 50px;
			 /* margin-left: -5px;*/


		}
</style>


<?php 
	if(!isset($_GET['proname']) || $_GET['proname']==NULL){
        echo "<script>window.location = '404.php'</script>";
        
    }else{
        $name = $_GET['proname'];
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

       $size = $_POST['size'];
       $quantity = $_POST['quantity'];
       $addCart = $ct->AddToCart($name,$quantity,$size);
    }
 ?>

 <div >

	<div class="container">
		<ul >

		    <li><a href="index.php"> Trang chủ / </a></li>
		    <li><a href="products.php"> Sản phẩm / </a></li>
	  	    <li><a href="details.php?proname=<?php echo $name ?>"> <?php echo $name ?></a></li>    	  
	  	</ul>
			</div>
</div>
 <div class="main">

 	<form action="" method="post">	
    <div class="content">
    	
    	<div class="section group">
    		<?php
					
					$prodList = $pro->get_1Product($name);
					if($prodList){
					
						while ($result_1pro = $prodList->fetch_assoc()) {
							
						
				 ?>
				
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/uploads/<?php echo $result_1pro['image']?>" alt="" />
					</div>

				<div class="desc span_3_of_2">
					<h2><?php echo $result_1pro['productName'] ?></h2>
					<p><?php echo $result_1pro['description']?> </p>
								
					<div class="price">
						<p>Price: <span ><?php echo $result_1pro['price']." VNĐ" ?></span></p>
						<p>Category: <span><?php echo $result_1pro['catName'] ?></span></p>
						<p>Brand:<span><?php echo $result_1pro['brandName'] ?></span></p>
						
						<p>Size:<span>
							<td>
							
							<select id="size" name="size" class="form-control action">
								<!-- <option>Chọn size</option> -->
								<?php
	               
	                                $size = $pro->getSize_1Product($name);
	                                if($size){
	                                    while ($result1 = $size->fetch_assoc()) {
	                                        
	                            	?>
		                            	<option><?php echo $result1['size']?></option>
		                            <?php  
	                                }
	                            }
	                            ?>
							</select>
							
							</td>
						</span></p>
						
					</div>
					
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1" min = "1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>				
				</div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			
	   		</div>
				
	</div>
	</form>	
	<?php 
	}
	}
	 ?>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
						<?php 
							$show = $cat->show_category();
							if($show){
								$i = 0;
								while($result = $show->fetch_assoc()){
									$i++;	
						 ?>
				      <li><a href="productbycat.php?catname=<?php echo $result['catName']?>"><?php echo $result['catName']; ?></a></li>
				      <?php
					}
						}
						?>
				      
    				</ul>
    	
 				</div>
 		</div>
 	</div>
<?php
	include 'inc/footer.php';
	

?>
