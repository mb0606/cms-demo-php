<table class="table table-border table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Author</th>
			<th>Comment</th>
			<th>Email</th>
			<th>Status</th>
			<th>In Response to</th>
			<th>Date</th>
			<th>Approved</th>
			<th>Unapproved</th>
			<th>Delete</th>

		</tr>
	</thead>
	<tbody>
	<?php
		$query = "SELECT * FROM comments";
		$select_comments_all = mysqli_query($connection, $query);

		while($row = mysqli_fetch_assoc($select_comments_all)){
			$comment_id = $row['comment_id'];
			$comment_post_id = $row['comment_post_id'];
			$comment_author = $row['comment_author'];
			$comment_content = $row['comment_content'];
			$comment_email = $row['comment_email'];
			$comment_status = $row['comment_status'];
			$comment_date = $row['comment_date'];

			echo "<tr>";
			echo "<td>$comment_id</td>";
			echo "<td>$comment_author</td>";
			echo "<td>$comment_content</td>";
			
//			$query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
//			$select_cat_id = mysqli_query($connection, $query);
//
//			while($row = mysqli_fetch_assoc($select_cat_id)){
//				$cat_id = $row['cat_id'];
//				$cat_title = $row['cat_title'];
//				
//				echo "<td>$cat_title</td>";
//			}


			echo "<td>$comment_email</td>";
			echo "<td class='{$comment_status}'>$comment_status</td>";
			$query = "SELECT * FROM posts WHERE post_id = {$comment_post_id}";
			$select_post_id = mysqli_query($connection, $query);
			
			// GET POST TITLE the comment is associated to
			while($row = mysqli_fetch_assoc($select_post_id)){
				$post_id = $row['post_id'];
				$post_title = $row['post_title'];
				
				echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
			}
			
			echo "<td>$comment_date</td>";	
			echo "<td class='text-center'><a href='comments.php?approve={$comment_id}&current_status={$comment_status}'><i class='glyphicon glyphicon-thumbs-up'></i</a></td>";	
			echo "<td class='text-center'><a href='comments.php?unapprove={$comment_id}&current_status={$comment_status}'><i class='glyphicon glyphicon-thumbs-down'></i</a></td>";
			echo "<td class='text-center'><a href='comments.php?delete={$comment_id}&current_status={$comment_status}'><i class='glyphicon glyphicon-remove'></i</a></td>";	
			echo "</tr>";

		}

	if(isset($_GET['delete'])){
		
		$comment_id = $_GET['delete'];

		$query = "DELETE FROM comments WHERE comment_id = {$comment_id}";
		
		$delete_query = mysqli_query($connection, $query);
		
		confirm_query($delete_query);
		// UPDATE POST COMMENT COUNT
		if($_GET['current_status'] === 'approve') {
			$query = "UPDATE posts SET post_comment_count = post_comment_count - 1 ";
			$query .= "WHERE post_id = $comment_post_id";

			$update_comment_count = mysqli_query($connection, $query);
			}
		header("Location: comments.php");
		
	}
		
	if(isset($_GET['unapprove'])){

		$comment_id = $_GET['unapprove'];

		$query = "UPDATE comments SET comment_status = 'unapprove' WHERE comment_id ={$comment_id} ";

		$unapprove_comment_query = mysqli_query($connection, $query);

		confirm_query($unapprove_comment_query);


		// UPDATE POST COMMENT COUNT
		if($_GET['current_status'] === 'approve') {
			$query = "UPDATE posts SET post_comment_count = post_comment_count - 1 ";
			$query .= "WHERE post_id = $comment_post_id";

			$update_comment_count = mysqli_query($connection, $query);
			}
		header("Location: comments.php");
		
	}
		
		if(isset($_GET['approve'])){
		
		$comment_id = $_GET['approve'];

		$query = "UPDATE comments SET comment_status = 'approve' WHERE comment_id ={$comment_id} ";
		
		$approve_comment_query = mysqli_query($connection, $query);
		
		confirm_query($approve_comment_query);
		// UPDATE POST COMMENT COUNT
		if($_GET['current_status'] === 'unapprove') {
			$query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
			$query .= "WHERE post_id = $comment_post_id";

			$update_comment_count = mysqli_query($connection, $query);
		}
		
		header("Location: comments.php");
		
	}	


	?>

	</tbody>
</table>