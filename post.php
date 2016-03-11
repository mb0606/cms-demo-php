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
            <div class="col-md-8">
               
               
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

                    $select_all_posts = mysqli_query($connection, $query);
                    
                    while($row = mysqli_fetch_assoc($select_all_posts)){
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                        $post_tags = $row['post_tags'];
                ?>
                        
                        <!--Blog Post -->
                        <h2>
                            <?php echo $post_title; ?>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author;?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"> </span><?php echo $post_date; ?>  <i class="glyphicon glyphicon-tags"> </i>  <?php echo $post_tags; ?> </p>
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $post_image;  ?>" alt="">
                        <hr>
                        <p><?php echo $post_content; ?></p>
                        

                        <hr>    
                        
                
                <?php
                        
                    }
    
    			}
    
                ?>
                <!-- Comments Form -->
                <div class="well">
                   
                   
                 
                    <h4>Leave a Comment:</h4>
                    <form action="#" method="post" role="form">
                      
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

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>
			</div><!-- col-8-->

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php" ?>

        </div><!-- /.row -->
        

        <hr>
<?php include "includes/footer.php" ?>
               