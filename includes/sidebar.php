            <div class="col-md-4">
               

                

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                        <div class="input-group">
                            <input name="search" type="text" class="form-control" value="">
                            <span class="input-group-btn">
                                <button name="submit" class="btn btn-default" type="submit">

                                    <i class="glyphicon glyphicon-search"></i>
                            </button>
                            </span>
                        </div>
                    </form><!-- search form -->
                    
                    <!-- /.input-group -->
                </div><!-- well -->

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                            <ul class="list-unstyled">
                            <?php
                                $query = "SELECT * FROM categories LIMIT 4";
                                $select_all_cat_query = mysqli_query($connection, $query);

                                while($row = mysqli_fetch_assoc($select_all_cat_query)){
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                    echo "<li><a href='category.php?category={$cat_id}&cat_title={$cat_title}'>{$cat_title}</a></li>";
                                }
                                ?>
                            </ul>

                </div><!-- well -->

                <!-- Side Widget Well -->
                <?php include "includes/widget.php" ;?>

            </div><!-- col -->