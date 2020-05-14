<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php'?>
<?php 
    $brand = new brand();
    if(isset($_GET['delid'])){
        $id = $_GET['delid'];
        $delbrand = $brand->delete_Brand($id);
    }


    
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Brand List</h2>
                <div class="block">  
                <?php
                    if(isset($delete_brand)){
                        echo $delete_brand;
                    }
                ?>     
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$show = $brand->show_brand();
						if($show){
							$i = 0;
							while($result = $show->fetch_assoc()){
								$i++;
						
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['brandName']; ?></td>
							<td><a href="brandedit.php?brandid=<?php echo $result['brandId']?>">Edit</a> || <a onclick ="return confirm('Bạn có muốn xóa?')" href="?delid=<?php echo $result['brandId']?>">Delete</a></td>
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

