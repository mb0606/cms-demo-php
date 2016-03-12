<?php include "includes/admin_header.php";?>

    <div id="wrapper">
		<!-- Navigation -->
       <?php include "includes/admin_navigation.php" ;?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            CATEGORIES
                            <small></small>
                        </h1>
                        
                        <div class="col-xs-6">
                        	<?php insert_categories(); ?>

                        	<form action="" method="post">
                        	
                        		<div class="form-group">
                        			<label  for="cat_title">Add Category </label>
                        			<input class="form-control" type="text" name="cat_title">
	                        	</div><!-- cat title -->
	                        	
                        		<div class="form-group">
                        			<input type="submit" name="submit" value="Add Category" class="btn btn-default">
	                        	</div><!-- cat title --> 
	                        	                       		
                        	</form>

                       
							<?php // UPDATE and INCLUDE 
								if(isset($_GET['edit'])) {
								$cat_id = $_GET['edit'];
							
								include "includes/update_categories.php";
							}
							?>
                       
                        </div><!-- col-xs-6 -->
                        
                        <div class="col-xs-6">
                        	<table class="table table-bordered table-hover">
                        		<thead>
                        			<tr>
                        				<th>ID</th>
                        				<th>Category</th>
                        			</tr>
                        		</thead>
                        		<tbody>
										<?php // Find all categories Query
											find_all_categories();
										?>	
                       		
                       					<?php // DELETE QUERY
											delete_category();
										?>
                        		</tbody>
                        	</table>
                        	
                        </div><!-- col-xs-6 Display all cat -->

                    </div><!-- col-lg-12 -->
                </div><!-- /.row -->
                

            </div><!-- /.container-fluid -->
            

        </div><!-- /#page-wrapper -->
        

    </div><!-- /#wrapper -->
    
    
    
<?php include "includes/admin_footer.php"  ?>