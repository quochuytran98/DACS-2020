	<?php
	include 'inc/header.php';


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
	// if(!isset($_GET['proname']) || $_GET['proname']==NULL){
 //        echo "<script>window.location = '404.php'</script>";
        
 //    }else{
 //        $name = $_GET['proname'];
 //    }
 //    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

 //       $size = $_POST['size'];
 //       $quantity = $_POST['quantity'];
 //       $addCart = $ct->AddToCart($name,$quantity,$size);
 //    }
 ?>

 <div >

	
</div>
 <div class="main">
    <div class="content">   	
    		<div class="content_top">
    		<div class="heading">
    		<h3>THÔNG TIN CÁ NHÂN</h3>
    		</div>
    		<!-- <div class="heading">
    		<li><a href="orderdetails.php"> DANH SÁCH ĐƠN MUA </a></li>
    		</div> -->
    		<div class="clear"></div>
    	</div>
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
					<td><?php echo $result['nameCus'] ?></td>

				</tr>
				<tr>
					<td>Số điện thoại</td>
					<td>:</td>
					<td><?php echo $result['phone'] ?></td>

				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><?php echo $result['emailCus'] ?></td>

				</tr>
				<tr>
					<td>Tỉnh/Thành phố</td>
					<td>:</td>
					<td><?php echo $result['HH'] ?></td>

				</tr>
				<tr>
					<td>Quận/Huyện</td>
					<td>:</td>
					<td><?php echo $result['TT'] ?></td>

				</tr>
				<tr>
					<td>Địa chỉ</td>
					<td>:</td>
					<td><?php echo $result['address'] ?></td>

				</tr>
				<tr>
					<td colspan="3"><a href="updateprofile.php">Cập nhật thông tin</a></td>
					

				</tr>
				<?php  
				}
			}
				?>
    		 </table>
    		
 	
 	</div>




<?php
	include 'inc/footer.php';
	

?>
