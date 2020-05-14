<?php
	include 'inc/header.php';

?>
<?php 
				$check = Session::get('customer_login');
				if($check){
					header('Location:order.php');
				}
?>
<?php 
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

       

        $insertCus = $user->insert_Customer($_POST);
    }
?>
 <?php 
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){

       

        $loginCus = $user->Login_Customer($_POST);
    }
?> 
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Đăng nhập</h3>
        		<?php  
    			if(isset($loginCus)){
                        echo $loginCus;
                    }
    		?>
        	<form action="" method="POST" id="member">
                	<input  type="text" name="username" class="field" placeholder="Tài khoản hoặc email...">
                    <input  type="password" name="password" class="field" placeholder="Mật khẩu...">
                 
                 <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                    <div class="buttons"><div><input type="submit" name="login" class="grey" value="Đăng nhập"></div></div>
                    </div>
            </form>
    	<div class="register_account">
    		<h3>Đăng ký tài khoản</h3>
    		<?php  
    			if(isset($insertCus)){
                        echo $insertCus;
                    }
    		?>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Tên" >
							</div>
							<div>
								<input type="text" name="username" placeholder="Tài khoản">
							</div>
							
							<div>
								
					      	
							   <select id="city" name="city" class="form-control action">
							   	<option value="">Chọn thành phố</option>  
							   	<?php 
						      		$get_city = $city->Show_City();
						      		if($get_city){
						      			while($result =$get_city->fetch_assoc()){
						      				 ?>
										<option value="<?php echo $result['matp'] ?>" data-name="<?= $result['matp'] ?>"><?php echo $result['name'] ?></option>   
										<?php  
								}
							}
								?>
								 </select>
							
							</div>
							
							
							<!-- <div>
								<input type="text" name="zipcode" placeholder="Zip-Code">
							</div> -->
							<div>
								<input type="text" name="address" placeholder="Địa chỉ">
							</div>
							
							 
		    			 </td>
		    			<td>
		    				<div>
					          <input type="text" name="phone" placeholder="Điện thoại">
					          </div>
		    			
						<div>
						<div>
							<input type="text" name="password" placeholder="Mật khẩu">
						</div>
						<select id="district" name="district" class="form-control" class="form-control">
									<option >Chọn quận huyện</option>         
									

				         </select>
						 </div>		
						
		    		        <div>
								<input type="text" name="email" placeholder="Email">
							</div>
	
		           
				 

				 
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><input type="submit" name="submit" class="grey" value="Tạo tài khoản" class="grey"></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
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
<?php
	include 'inc/footer.php';
	

?>