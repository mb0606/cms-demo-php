<?php 
include "includes/db.php";
include "includes/header.php";
?>

    <!-- Navigation -->
    <?php include "includes/navigation.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-xs-12"> 
               <div class="background-header">               
					<h1 class="page-header text-center">
						BLOG
						<small></small>
					</h1>
                </div>
            </div><!--col-12 PAGE TITLE

            <!-- Blog Entries Column -->
            <div class="col-md-8">
               
               

                
                <?php
                    $query = "SELECT * FROM posts WHERE post_status = 'published'";

                    $select_all_posts = mysqli_query($connection, $query);
                    
                    while($row = mysqli_fetch_assoc($select_all_posts)){
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = substr($row['post_content'], 0, 100);
                        $post_tags = $row['post_tags'];
                ?>
                        
                        <!--Blog Post -->
                        <h2>
                            <a href="post.php?p_id=<?php echo $post_id ;?>"><?php echo $post_title; ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author;?></a>
                        </p>
                        <p class="meta"><i class="glyphicon glyphicon-time"></i><?php echo $post_date; ?>  <i class="glyphicon glyphicon-tags"></i>  <?php echo $post_tags; ?> </p>
                        <hr>
                        <a href="post.php?p_id=<?php echo $post_id ;?>">
                        <img class="img-responsive" src="images/<?php echo $post_image;  ?>" alt="">
                        </a>
                        <hr>
                        <p><?php echo $post_content; ?></p>
                        <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id;?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>    
                        
                
                <?php
                        
                    }
    
    
    
                ?>






                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div><!-- col-8 -->

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>
<?php include "includes/footer.php" ?>
