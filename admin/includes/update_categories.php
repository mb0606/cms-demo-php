<form action="" method="post">

	<div class="form-group">
		<label  for="cat_title">Edit Category </label>

		<?php

		if(isset($_GET['edit'])) {
			$cat_id = $_GET['edit'];


			$query = "SELECT * FROM categories WHERE cat_id = $cat_id";
			$select_cat_id = mysqli_query($connection, $query);

			while($row = mysqli_fetch_assoc($select_cat_id)){
				$cat_id = $row['cat_id'];
				$cat_title = $row['cat_title'];

			?>
			<input value="<?php if(isset($cat_title)){echo $cat_title;} ;?>" class="form-control" type="text" name="cat_title">


	<?php	}
		}
		?>
		<?php // UPDATE QUERY
				if(isset($_POST['update_category'])){
					$cat_title = $_POST['cat_title'];

					$query = "UPDATE categories SET cat_title = '{$cat_title}' WHERE cat_id = {$cat_id}";
					$update_query = mysqli_query($connection, $query);
					if(!$update_query){
						die("Query Failed". mysqli_error($connection));
					} else {
						header("Location: categories.php");						
					}
				}		

			?>


	</div><!-- cat title -->

	<div class="form-group">
		<input type="submit" name="update_category" value="Update" class="btn btn-default">
	</div><!-- cat title --> 

</form>