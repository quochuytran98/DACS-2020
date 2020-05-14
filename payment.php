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
	if(!isset($_GET['id'])){
       echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";

    }

?>

<?php 
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_buy'])){

       $buyer= Session::get('customer_user');
        $insertOrder = $ct->insert_Order($_POST,$buyer);
        $MaxId = $ct->get_Max_Id();
        if($MaxId){
        	while ($result = $MaxId->fetch_assoc()){
        
        $insertOrderDetails = $ct->insert_OrderDetail($result['order_Id']);
 	   		}
		}
        $destroyCart = $ct->Del_cart_by_Session();
        header('Location:success.php');

    }
    // else{
    // 	 echo "<script>window.location = '404.php'</script>";
    // }
?>

<style type="text/css">
	.box_left {
    width: 55%;
    border: 1px solid #666;
    float: left;
    padding:  4px;


	}
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
	.box_right {
    width: 42%;
    border: 1px solid #666;
    float: right;
    padding: 4px
	}
	in.submit_buy {
		padding: 7px 20px; 
		background: red;
		font-size: 25px;
		color: #fff;
		

	}
</style>
<form action="" method="post">
 <div class="main">

 	<form action="" method="post">	
    <div class="content">
    	<div class="section group">
    		<div class="heading">
    			<h3>Thanh toán sản phẩm</h3>		
    		</div>
    		<div class="clear"></div>
    		<div class="box_left">
				<div class="cartpage">
			    	
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
								<td  name ="total"><?php  
									
									echo $sub_total." VNĐ";
									Session::set('qtt',$sl);
									
								?></td>
							</tr>
					   </table>
					  <!--  </form> -->
					</div>

    		</div>
    		<div class="box_right">
    			<form action="" method="post">
    		<table class ="tblone">
    			 
    			<?php 
    			$userr= Session::get('customer_user');
	      		$show_Cus = $user->Get_User($userr);
	      		if($show_Cus){
	      			while($result =$show_Cus->fetch_assoc()){


	      		
	      	 ?>
				<tr>
					<td>Tài khoản</td>
					<td>:</td>
					<td><?php echo $result['username'] ?></td>

				</tr>
				<tr>
					<td>Tên khách hàng</td>
					<td>:</td>
					<td><input type="text" name="name" value="<?php echo $result['nameCus'] ?>"></td>
					

				</tr>
				<tr>
					<td>Số điện thoại</td>
					<td>:</td>
					<td><input type="text" name="phone" value="<?php echo $result['phone'] ?>"></td>
					

				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><input type="text" name="email" value="<?php echo $result['emailCus'] ?>"></td>
					

				</tr>
				<tr>
					<td>Tỉnh/Thành phố</td>
					<td>:</td>
					
					<td><select id="city" name="city" >
						<?php 
							$citylist = $city->Show_City();
							if($citylist){
								while ($resultCity = $citylist->fetch_assoc()){


						 ?>
                        <option
							<?php 
								if($resultCity['matp'] == $result['TP']){
									echo 'selected';
								}
							 ?>
                         value="<?php echo $resultCity['matp']?>" data-name="<?= $result['matp'] ?>"><?php echo $resultCity['name'] ?></option>
                        <?php 

                           }
							}

					 ?>
                        </select></td>
					 

				</tr>
				<tr>
					<td>Quận/Huyện</td>
					<td>:</td>
					
					<td>
						<select id="district" name="district" class="form-control" class="form-control">
									<option value="<?php echo $result['QH']?>"><?php echo $result['TT'] ?></option>         
									

				         </select>

					</td>

				</tr>
				<tr>
					<td>Địa chỉ</td>
					<td>:</td>
					<td><input type="text" name="address" value="<?php echo $result['address'] ?>"></td>
					

				</tr>
				<!-- <tr>
					<td colspan="3"><input type="submit" name="save" value="Cập nhật" class="grey" ></td>
					

				</tr> -->
				<?php  
				}
			}
				?>
    		 </table>
    		
    			
    		</div>

    		
 		</div>
 		
 	</div>
 	<script>
    $(document).ready(function(){
        $('#city').change(function(){
            var matp = $('#city option:selected').val();
            // alter(matp);
            data = {
                city:1,
                matp:matp
            };
            $.ajax({
                url:"cityy.php",
                type:"POST",
                data:data
            }).done(function(result){
                $('#district').html(result);
                
            })
        })

    });
</script>
 	<center> <input type="submit" name="submit_buy" class="grey" value="MUA HÀNG" class="grey"></center>
 	</form>
<?php
	include 'inc/footer.php';
	

?>
