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

       

        $insertOrder = $cat->insert_Order($_POST);
        $destroyCart = $ct->Del_cart_by_Session();
        header('Location:success.php');

    }
?>

<style type="text/css">
	.box_left {
    width: 55%;
    border: 1px solid #666;
    float: left;
    padding:  4px;


	}

	.box_right {
    width: 42%;
    border: 1px solid #666;
    float: right;
    padding: 4px
	}
	a.submit_buy {
		padding: 7px 20px; 
		background: red;
		font-size: 25px;
		color: #fff;
		
	
	}
	p.seccess_note{

		text-align: center;
		padding: 7px;
		font-size: 23px;
	}
</style>
<form action="" method="post">
 <div class="main">

 	<form action="" method="post">	
    <div class="content">
    	<div class="section group">
    		<center><h2 >THANH TOÁN THÀNH CÔNG</h2></center>
    		<p class="seccess_note">Xin chào bạn, <br>Rất cảm ơn bạn đã mua hàng của chúng tôi.</p>
    		<p class="seccess_note">Đơn hàng của bạn đang được sử lý. <a href="orderdetails.php">Xem chi tiết!</a> </p>
    		<p class="seccess_note"><a href="index.php">Tiếp tục mua hàng</a> </p>
			   		
    	</div>
    </div>
</div>
</form>
<?php
	include 'inc/footer.php';
	

?>
