<?php
	include 'inc/header.php';

?>
<?php 
				$check = Session::get('customer_login');
				if($check= false){
					header('Location:login.php');
				}
?>
<style >
	.cartpage {
    font-size: 20px;
    font-weight: bold;
    color: red;
}
</style>
<div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
					<div class= "not_found"></div>
					<h3>Order</h3>
			</div>
					
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
	include 'inc/footer.php';
	

?>