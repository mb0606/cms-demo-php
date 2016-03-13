
<div class="col-md-4">
	<aside id="right-sidebar">
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
		<!-- Login Search Well -->
		<div class="well">
			<h4>Login</h4>
			<form action="includes/login.php" method="post">

				<div class="form-group">
					<input name="username" type="text" class="form-control" placeholder="Enter Username" value="">
				</div>
				<div class="form-group">
					<input name="user_password" type="password" class="form-control" placeholder="Enter Passwordform" value="">
				</div>
					<div class="form-group">
						<input class="btn btn-primary" type="submit" name="login" value="Sign In">
					</div>


			</form><!-- Login form -->

			<!-- /.input-group -->
		</div><!-- well -->
		<div class="well">
			<?php
			//assign adsense code to a variable
			$googleadsensecode = '
			<script type="text/javascript">
			google_ad_client = "pub-123456789";
			google_ad_slot = "123456";
			google_ad_width = 180;
			google_ad_height = 150;
			//-->
			</script>
			<script type="text/javascript"
			src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
			</script>';
			//now outputting this to HTML
			echo $googleadsensecode;
			?>

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
   </aside>
</div><!-- col -->