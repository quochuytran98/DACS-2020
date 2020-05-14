<?php
	require_once("../lib/database.php");
	$db_handle = new database();
	if(!empty($_POST["catId"])){
		$query = "SELECT * FROM tbl_size WHERE catId= '" . $_POST["catId"] ."' ORDER BY size ASC";
		$result = $db_handle->runQuery($query);
		?>
<option value disable selected >Chọn size</option>
<?php
	foreach ($result as $size) {
		?>
<option value="<?php echo $size["sizeId"];?>" ><?php echo $size["size"]; ?></option>
<?php
	}
} 
 ?>