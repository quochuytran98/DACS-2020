<?php
	include 'inc/header.php';

?>

<?php  
	// if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
	//    $cartId = $_POST['cartId'];
 //       $quantity = $_POST['quantity'];

 //        $update_Slcart = $ct->update_Slcart($quantity,$cartId);
 //    }
?>
<?php  
	if(isset($_GET['delid'])){
        $id = $_GET['delid'];
        $delOrder = $bill->delete_Order($id);
    }

?>
<?php  
	// if(!isset($_GET['id'])){
 //       echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";

 //    }

?>

<?php 
    
  //   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_buy'])){

  //      $buyer= Session::get('customer_user');
  //       $insertOrder = $ct->insert_Order($_POST,$buyer);
  //       $MaxId = $ct->get_Max_Id();
  //       if($MaxId){
  //       	while ($result = $MaxId->fetch_assoc()){
        
  //       $insertOrderDetails = $ct->insert_OrderDetail($result['order_Id']);
 	//    		}
		// }
  //       $destroyCart = $ct->Del_cart_by_Session();
  //       header('Location:success.php');

  //   }
    // else{
    // 	 echo "<script>window.location = '404.php'</script>";
    // }
?>

<style type="text/css">
	.box_left {
    width: 100%;
    border: 1px solid #666;
   
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
    			<h3>DANH SÁCH CÁC ĐƠN HÀNG</h3>		
    		</div>
    		<div class="clear"></div>
    		<div class="box_left">
				<div class="cartpage">
			    	
						<table class="tblone">
							<tr>
								<th width="20%">Mã đơn hàng</th>
								<th width="15%">Ngày đặt hàng</th>
								<th width="15%">Người nhận</th>
								<th width="20%">Tổng tiền</th>
								<th width="10%">Trạng thái</th>
								<th width="15%">Thông tin</th>
							</tr>
							<?php 
								$buyer= Session::get('customer_user');
								$get_bill = $bill->get_Bill_by_Customer($buyer);
								if($get_bill){
									
	                                while ($result = $get_bill->fetch_assoc()) {
	                                        
	                       
							?>
							<tr>
								<td>#<?php echo $result['order_Id']?> </td>
								<td><?php echo $result['date']?> </td>
								<td><?php echo $result['receiver']?> </td>
								<td><?php echo $result['totalprice']?> </td>
								<td>Đang xử lý</td>
								
								<td><a  href="billdetails.php?order_Id=<?php echo $result['order_Id']?>">Chi tiết</a>
								|| <a onclick ="return confirm('Bạn có muốn xóa?')" href="?delid=<?php echo $result['order_Id']?>">Xóa</a></td>
							</tr>
							<?php 
							
							}

									}
							?>
							
						<!-- <form action="" method="post">	 -->	
						</table>
						
						
					  <!--  </form> -->
					</div>

    		</div>
    		

    		
 		</div>
 		
 	</div>
 	
 	
 	</form>
<?php
	include 'inc/footer.php';
	

?>
