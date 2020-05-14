<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes//brand.php';?>
<?php include '../classes/category.php';?>
<?php include_once '../classes/product.php'?>
<?php 
	$fm = new Format();
    $prod = new product();
    if(isset($_GET['delid'])){
        $id = $_GET['delid'];
        $delprod = $prod->delete_product($id);
    }


    
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách sản phẩm</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Tên sản phẩm</th>
					<th>Ảnh</th>
					<th>Thương hiệu</th>
					<th>Danh mục</th>
					<th>Size</th>
					<th>Giá</th>
					<th>Mô tả</th>
					<th>Loại sản phẩm</th>
					<th>Tùy chọn</th>			
				</tr>
			</thead>
			<tbody>
				<?php 
					$prod = new product();
					
					$prodList = $prod->Show_Product();
					if($prodList){
					
						while ($result = $prodList->fetch_assoc()) {
							
						
				 ?>
				
				<tr class="old gradeX">
					<td><?php echo $result['productId'] ?></td>
					<td><?php echo $result['productName'] ?></td>
					<td><img src="uploads/<?php echo $result['image']?>" width="70" ></td>		
					<td><?php echo $result['brandName'] ?></td>
					<td><?php echo $result['catName'] ?></td>
					<td><?php echo $result['size'] ?></td>
					<td><?php echo $result['price'] ?></td>
					<td><?php echo $fm->textShorten($result['description'],30) ?></td>
					<td><?php 
						if($result['type'] ==0){
							echo 'Không nổi bật';
						} 
						else{
							echo 'Nổi bật';
							}

					?></td>
				
					<td class="center"> </td>
					<td ><a href="addsizeproduct.php?prodid=<?php echo $result['productId']?>">Add Size</a> 
						||<a href="productedit.php?prodid=<?php echo $result['productId']?>"> Edit</a> 
						|| <a onclick ="return confirm('Bạn có muốn xóa?')" href="?delid=<?php echo $result['productId']?>">Delete</a></td>
				</tr>
				<?php 
					}
				}
			 ?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
