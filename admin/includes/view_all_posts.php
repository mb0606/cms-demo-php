<h1 class="page-header text-center">
	ALL POSTS 
	<small></small>
</h1>
<div class="row well">
<form action="" method="post" >
	<div id="bulkOptionsContainer" class="col-xs-6 col-md-4 form-group">
		<select name="" id="" class="form-control">
			<option value=""></option>
			<option value="">Make Draft</option>
			<option value="">Publish</option>
			<option value="">Delete</option>
		</select>
	</div>
	<div class="col-xs-6 col-md-4">
		<input type="submit" name="submit" class="btn btn-success" value="Apply">
		<a href="../posts.php?source=add_post" class="btn btn-primary">Add New</a>
	</div>
</div><!--row -->



<table class="table table-border table-hover">
	<thead>
		<tr>
			<th><input type="checkbox" id="selectAllBoxes"></th>
			<th>ID</th>
			<th>Author</th>
			<th>Title</th>
			<th>Category</th>
			<th>Status</th>
			<th>Image</th>
			<th>Content</th>
			<th>Tags</th>
			<th>Comments</th>
			<th>Date</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$query = "SELECT * FROM posts";
		$select_posts_all = mysqli_query($connection, $query);

		while($row = mysqli_fetch_assoc($select_posts_all)){
			$post_id = $row['post_id'];
			$post_author = $row['post_author'];
			$post_title = $row['post_title'];
			$post_category_id = $row['post_category_id'];
			$post_status = $row['post_status'];
			$post_image = $row['post_image'];
			$post_content = $row['post_content'];
			$post_tags = $row['post_tags'];
			$post_comment_count = $row['post_comment_count'];
			$post_date = $row['post_date'];

			echo "<tr>"; ?>
			
			<td><input type="checkbox" class="checkBox" name="checkBoxArray[]" value="<?php $post_id ;?>"></td>
			
			<?php
			echo "<td>$post_id</td>";
			echo "<td>$post_author</td>";
			echo "<td>$post_title</td>";
			
			$query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
			$select_cat_id = mysqli_query($connection, $query);

			while($row = mysqli_fetch_assoc($select_cat_id)){
				$cat_id = $row['cat_id'];
				$cat_title = $row['cat_title'];
				
				echo "<td>$cat_title</td>";
			}

			
			
			
			
			
			echo "<td>$post_status</td>";
			echo "<td><img width='100' src='../images/$post_image'></td>";
			echo "<td>$post_content</td>";
			echo "<td>$post_tags</td>";
			echo "<td>$post_comment_count</td>";
			echo "<td>$post_date</td>";	
			echo "<td class='text-center'><a href='posts.php?source=edit_post&p_id={$post_id}'><i class='glyphicon glyphicon-pencil'></i</a></td>";	
			echo "<td class='text-center'><a href='posts.php?delete={$post_id}'><i class='glyphicon glyphicon-remove'></i</a></td>";	
			echo "</tr>";

		}

	if(isset($_GET['delete'])){
		
		$post_id = $_GET['delete'];

		$query = "DELETE FROM posts WHERE post_id = {$post_id}";
		
		$delete_query = mysqli_query($connection, $query);
		
		confirm_query($delete_query);
		header("Location: posts.php");
		
	}	


	?>

	</tbody>
</table>
</form>