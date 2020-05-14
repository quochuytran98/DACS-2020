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
 	$userr= Session::get('customer_user');
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])){

       
       $updateCus = $user->Update_Customer($_POST,$userr);
    }
 ?>

 <div >

	
</div>
 <div class="main">
    <div class="content">   	
    		<div class="content_top">
    		<div class="heading">
    		<h3>CẬP NHẬT THÔNG TIN CÁ NHÂN</h3>
    		
    		</div>
    		<div class="clear"></div>
    	</div>

    	<form action="" method="post">
    		<table class ="tblone">
    			 <tr><?php
                    if(isset($updateCus)){
                        echo '<td colspan="3">'.$updateCus.'</td>'; 
                    }
                ?> </tr>
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
				<tr>
					<td colspan="3"><input type="submit" name="save" value="Cập nhật" class="grey" ></td>
					

				</tr>
				<?php  
				}
			}
				?>
    		 </table>
    		 </form>
    		
 	
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
