﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php'?>
<?php 
    $cat = new category();
    if(isset($_GET['delname'])){
        $id = $_GET['delname'];
        $delcat = $cat->delete_Category($id);
    }


    
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">  
                <?php
                    if(isset($delete_Category)){
                        echo $delete_Category;
                    }
                ?>     
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$show = $cat->show_category();
						if($show){
							$i = 0;
							while($result = $show->fetch_assoc()){
								$i++;
						
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['catName']; ?></td>
							<td><a href="catedit.php?catname=<?php echo $result['catName']?>">Edit</a> || <a onclick ="return confirm('Bạn có muốn xóa?')" href="?delname=<?php echo $result['catName']?>">Delete</a></td>
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

