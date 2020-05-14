<?php
	include 'inc/header.php';
	

?>
<?php  
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
	   $cartId = $_POST['cartId'];
       $quantity = $_POST['quantity'];

        $update_Slcart = $ct->update_Slcart($quantity,$cartId);
    }
?>
<?php  
	if(isset($_GET['delid'])){
        $id = $_GET['delid'];
        $delcat = $ct->delete_cart($id);
    }

?>
<?php 
	$check = Session::get('customer_login');
	if($check== false){
		header('Location:login.php');
	}else
	{
		
	}
 ?>
<?php  
	if(!isset($_GET['id'])){
       echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";

    }

?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
			    	<?php  
			    		if(isset($update_Slcart)){
			    			echo $update_Slcart;
			    		}
			    	?>
						<table class="tblone">
							<tr>
								<th width="20%">Product Name</th>
								<th width="15%">Image</th>
								<th width="15%">Price</th>
								<th width="15%">Size</th>
								<th width="20%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php 
								$sub_total = 0; 
								$sl = 0;
								$get_cat = $ct->get_Cart();
								if($get_cat){
									
	                                while ($result = $get_cat->fetch_assoc()) {
	                                        
	                       
							?>
							<tr>
								<td><?php echo $result['productName']?> </td>
								<td><img src="admin/uploads/<?php echo $result['image']?>" width="70"?/></td>
								<td><?php echo $result['price']?> </td>
								<td><?php echo $result['size']?> </td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartId"min = 0 value="<?php echo $result['cartId']?>"/>
										<input type="number" name="quantity"min = 0 value="<?php echo $result['quantity']?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>
									<?php $total= $result['price'] * $result['quantity'];								
									echo $total;
									$sl +=$result['quantity'];
									?>
									
								</td>
								<td><a onclick ="return confirm('Bạn có muốn xóa?')" href="?delid=<?php echo $result['cartId']?>">Xóa</a></td>
							</tr>
							<?php 
							$sub_total += $total;
							}

									}
							?>
							
						<!-- <form action="" method="post">	 -->	
						</table>
						<?php  
							if($sl == 0)
								echo 'Your cart is empty! Please go to shopping Now!!!!!!';
						?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Total price : </th>
								<td><?php  
									
									echo $sub_total." VNĐ";
									Session::set('qtt',$sl);
								?></td>
							</tr>
					   </table>
					  <!--  </form> -->
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php
	include 'inc/footer.php';
	

?>