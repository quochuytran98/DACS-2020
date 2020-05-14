<?php
	include 'inc/header.php';

?>
<?php 
       if(!isset($_GET['order_Id']) || $_GET['order_Id']==NULL){
        echo "<script>window.location = 'productlist.php'</script>";
        
    }else{
        $id = $_GET['order_Id'];
    }
   
?>

<style type="text/css">
	.box_left {
    width: 50%;
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
    width: 47%;
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
    			<h3>CHI TIẾT ĐƠN HÀNG</h3>		
    		</div>
    		<div class="clear"></div>
    		<div class="box_left">
				<div class="cartpage">
			    	
						<table class="tblone">
							<tr>
								<th width="20%">Sản phẩm</th>
								<th width="15%">Ảnh</th>
								<th width="15%">Size</th>
								<th width="20%">Số lượng</th>
								<th width="10%">Tổng tiền</th>
								
							</tr>
							<?php 
								$sub_total = 0; 
								$sl = 0;
							
								$get_bill = $bill->get_BillDetails($id);
								if($get_bill){
									
	                                while ($result = $get_bill->fetch_assoc()) {
	                                        
	                       
							?>
							<tr>
								<td>#<?php echo $result['productName']?> </td>
								<td><img src="admin/uploads/<?php echo $result['image']?>" width="70"?/></td>
								<td><?php echo $result['size']?> </td>
								<td><?php echo $result['quantity']?> </td>
								<td><?php echo $result['price']?></td>
								
								
									<?php $total= $result['price'] * $result['quantity'];								
									$sl +=$result['quantity'];
									?>
									
							
							</tr>
							<?php 
							$sub_total += $total;
							}

									}
							?>
							
						<!-- <form action="" method="post">	 -->	
						</table>
						
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
	      		$get_bill = $bill->get_Bill_by_Id($id);
					if($get_bill){
									
	                    while ($result = $get_bill->fetch_assoc()) {


	      		
	      	 ?>
				<tr>
					<td>Tài khoản</td>
					<td>:</td>
					<td><?php echo $userr ?></td>

				</tr>
				<tr>
					<td>Tên khách hàng</td>
					<td>:</td>
					<td><?php echo $result['receiver'] ?></td>
					

				</tr>
				<tr>
					<td>Số điện thoại</td>
					<td>:</td>
					<td><?php echo $result['phone'] ?></td>
					

				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
				
					<td><?php echo $result['email'] ?></td>
					

				</tr>
				<tr>
					<td>Địa chỉ</td>
					<td>:</td>
					<td><?php echo $result['address'].", " .$result['city'].",".$result['dis'] ?></td>
					

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
   
</script>
 
 	</form>
<?php
	include 'inc/footer.php';
	

?>
