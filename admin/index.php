<?php include "includes/admin_header.php" ?>

    <div id="wrapper">
    

		
		<!-- Navigation -->
       <?php include "includes/admin_navigation.php" ;?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small><?php echo $_SESSION['username'] ; ?></small>
                        </h1>
                        
                               
                <!-- /.row -->
                
						<div class="row">
						
							<div class="col-lg-3 col-md-6">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="row">
											<div class="col-xs-3">
												<i class="fa fa-file-text fa-5x"></i>
											</div>
											<div class="col-xs-9 text-right">
											<?php
											
											$query = "SELECT * FROM posts";
											$select_all_posts = mysqli_query($connection, $query);
											$post_count = mysqli_num_rows($select_all_posts);	
											?>
											
										  <div class='huge'><?php echo $post_count  ;?></div>
												<div>Posts</div>
											</div>
										</div>
									</div>
									<a href="posts.php">
										<div class="panel-footer">
											<span class="pull-left">View Details</span>
											<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
											<div class="clearfix"></div>
										</div>
									</a>
								</div>
							</div><!-- col lg-1 md-6 -->
							
							<div class="col-lg-3 col-md-6">
								<div class="panel panel-green">
									<div class="panel-heading">
										<div class="row">
											<div class="col-xs-3">
												<i class="fa fa-comments fa-5x"></i>
											</div>
											<div class="col-xs-9 text-right">
											<?php
											
											$query = "SELECT * FROM comments";
											$select_all_comments = mysqli_query($connection, $query);
											$comment_count = mysqli_num_rows($select_all_comments);	
											?>
											 <div class='huge'><?php echo $comment_count ;?></div>
											  <div>Comments</div>
											</div>
										</div>
									</div>
									<a href="comments.php">
										<div class="panel-footer">
											<span class="pull-left">View Details</span>
											<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
											<div class="clearfix"></div>
										</div>
									</a>
								</div>
							</div><!-- col lg-1 md-6 -->
							
							<div class="col-lg-3 col-md-6">
								<div class="panel panel-yellow">
									<div class="panel-heading">
										<div class="row">
											<div class="col-xs-3">
												<i class="fa fa-user fa-5x"></i>
											</div>
											<div class="col-xs-9 text-right">
											<?php
											
											$query = "SELECT * FROM users";
											$select_all_users = mysqli_query($connection, $query);
											$user_count = mysqli_num_rows($select_all_users);	
											?>
											 <div class='huge'><?php echo $user_count ;?></div>
												<div> Users</div>
											</div>
										</div>
									</div>
									<a href="users.php">
										<div class="panel-footer">
											<span class="pull-left">View Details</span>
											<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
											<div class="clearfix"></div>
										</div>
									</a>
								</div>
							</div><!-- col lg-1 md-6 -->
							
							<div class="col-lg-3 col-md-6">
								<div class="panel panel-red">
									<div class="panel-heading">
										<div class="row">
											<div class="col-xs-3">
												<i class="fa fa-list fa-5x"></i>
											</div>
											<div class="col-xs-9 text-right">
											<?php
											
											$query = "SELECT * FROM categories";
											$select_all_categories = mysqli_query($connection, $query);
											$cat_count = mysqli_num_rows($select_all_categories);	
											?>
											 <div class='huge'><?php echo $cat_count ;?></div>
												 <div>Categories</div>
											</div>
										</div>
									</div>
									<a href="categories.php">
										<div class="panel-footer">
											<span class="pull-left">View Details</span>
											<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
											<div class="clearfix"></div>
										</div>
									</a>
								</div>
							</div><!-- col lg-1 md-6 -->
							
						</div><!-- /.row PANELS-->
										
                    </div><!-- col-12 -->
					<?php

						$query = "SELECT * FROM posts WHERE post_status = 'Published'";
						$select_all_published_posts = mysqli_query($connection, $query);
						$post_published_count = mysqli_num_rows($select_all_published_posts);

						$query = "SELECT * FROM posts WHERE post_status = 'Draft'";
						$select_all_draft_posts = mysqli_query($connection, $query);
						$post_draft_count = mysqli_num_rows($select_all_draft_posts);
					
						$query = "SELECT * FROM comments WHERE comment_status = 'pending'";
						$select_all_pending_comments = mysqli_query($connection, $query);
						$comment_pending_count = mysqli_num_rows($select_all_pending_comments);
					
						$query = "SELECT * FROM users WHERE user_role = 'Subscriber' ";
						$select_all_subscriber_users = mysqli_query($connection, $query);
						$subscriber_count = mysqli_num_rows($select_all_subscriber_users);						
						

					
					
					?>
                    
                    
                    <div class="row">
                    	
						<script type="text/javascript">
							  google.charts.load('current', {'packages':['bar']});
							  google.charts.setOnLoadCallback(drawChart);
							  function drawChart() {
								var data = google.visualization.arrayToDataTable([
								  ['', 'Count' ],

									<?php
									$element_text = ['All Posts' ,'Published Posts','Draft Posts', 'Comments','Pending Comments', 'Users','Subscribers' , 'Categories'];
									$element_count = [$post_count,$post_published_count, $post_draft_count, $comment_count,$comment_pending_count, $user_count, $subscriber_count , $cat_count];
									
									for($i=0 ; $i < 8; $i++){
										echo "['{$element_text[$i]}' , {$element_count[$i]} ]," ;
									}
									?>
								]);

								var options = {
								  chart: {
									title: 'CMS DEMO',
									subtitle: 'Blog Stats',
								  }
								};

								var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

								chart.draw(data, options);
							  }
						</script>
						<div class="col-sm-12">
							<div  id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
						</div>
                    </div><!-- row CHART -->
                    
                    
                    
                    
                    
                    
                    
                </div><!-- /.row -->
                

            </div><!-- /.container-fluid -->
            

        </div><!-- /#page-wrapper -->
        

    </div><!-- /#wrapper -->
    
    
    
<?php include "includes/admin_footer.php"  ?>