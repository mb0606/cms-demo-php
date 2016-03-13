<?php 
include "includes/db.php";
include "includes/header.php";
?>

    <!-- Navigation -->
    <?php include "includes/navigation.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->

               
               
<!--
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
-->
                
                <?php
					if(isset($_GET['p_id'])){				
	
					$post_id = $_GET['p_id'];
                    $query = "SELECT * FROM posts WHERE post_id = {$post_id}";

                    $select_post_id = mysqli_query($connection, $query);
                    
                    while($row = mysqli_fetch_assoc($select_post_id)){
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                        $post_tags = $row['post_tags'];
                ?>
                    <div class="col-xs-12">    
                        <!--Blog Post -->
                        <h2>
                            <?php echo $post_title; ?>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author;?></a>
                        </p>
                        <p class="meta"><i class="glyphicon glyphicon-time"> </i><?php echo $post_date; ?>  <i class="glyphicon glyphicon-tags"> </i>  <?php echo $post_tags; ?> </p>
                        <hr>
                    </div><!-- col -12 -->
                    <div class="col-md-8">
                        <img class="img-responsive" src="images/<?php echo $post_image;  ?>" alt="">
                        <hr>
                        <p><?php echo $post_content; ?></p>
                        

                        <hr>    
                        
                
                <?php
                        
                    }
    
    			}
    
                ?>
                
                <?php
				if(isset($_POST['create_comment'])) {
					$comment_author = $_POST['comment_author'];
					$comment_email = $_POST['comment_email'];
					$comment_content = $_POST['comment_content'];
					$comment_post_id = $_GET['p_id'];
					
					
					//insert
					$query  = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date  )";
					$query .= "VALUES ('{$comment_post_id}', '{$comment_author}', '{$comment_email}', '{$comment_content}', 'pending', now())";
					
					$create_comment = mysqli_query($connection, $query);
					
					
				}
				
				
				
				?>
                
                
                
                <!-- Comments Form -->
                <div class="well">
                   
                   
                 
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                      
                        <div class="form-group">
                         <label for="Author">Author</label>
                          <input type="text" name="comment_author" class="form-control" name="comment_author">
                        </div>
                        
                         <div class="form-group">
                         <label for="Author">Email</label>
                          <input type="email" name="comment_email" class="form-control" name="comment_email">
                        </div>
                       
                        <div class="form-group">
                            <label for="comment">Your Comment</label>
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                <?php

					if(isset($_GET['p_id'])) {
						$comment_post_id = $_GET['p_id'];

						$query  = "SELECT * FROM comments WHERE comment_post_id = {$comment_post_id} AND comment_status='approve'";

						$all_comment_post_id = mysqli_query($connection, $query);
						while($row = mysqli_fetch_assoc($all_comment_post_id)){

							$comment_author = $row['comment_author'];
							$comment_date = $row['comment_date'];
							$comment_content = $row['comment_content'];
							
				?>			
							<!-- Comment -->
							<div class="media">
								<a class="pull-left" href="#">
									<img class="media-object" src="http://placehold.it/64x64" alt="">
								</a>
								<div class="media-body">
									<h4 class="media-heading"><?php echo $comment_author; ?>
										<small><?php echo $comment_date; ?></small>
									</h4>
									<?php echo $comment_content; ?>

								</div>
							</div>

				<?php
						}
						
					}
				
				
				?>
			</div><!-- col-8-->

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php" ?>

        </div><!-- /.row -->
        

<?php include "includes/footer.php" ?>
               
