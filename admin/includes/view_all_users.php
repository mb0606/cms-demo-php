<h1 class="page-header text-center">
	All Users
	<small></small>
</h1>


<table class="table table-border table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Username</th>
			<th>Password</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Image</th>
			<th>Role</th>
			<th class="text-center">Edit</th>
			<th class="text-center">Delete</th>


		</tr>
	</thead>
	<tbody>
	<?php
		$query = "SELECT * FROM users";
		$select_users_all = mysqli_query($connection, $query);

		while($row = mysqli_fetch_assoc($select_users_all)){
			$user_id = $row['user_id'];
			$username = $row['username'];
			$user_password = $row['user_password'];
			$user_firstname = $row['user_firstname'];
			$user_lastname = $row['user_lastname'];
			$user_email = $row['user_email'];
			$user_image = $row['user_image'];
			$user_role = $row['user_role'];

			echo "<tr>";
			echo "<td>$user_id</td>";
			echo "<td>$username</td>";
			echo "<td>$user_password </td>";
			echo "<td>$user_firstname</td>";
			echo "<td>$user_lastname</td>";
			echo "<td>$user_email</td>";
			echo "<td><img width='50' height='50' src='../images/$user_image'></td>";
			echo "<td>$user_role</td>";
			echo "<td class='text-center'><a href='users.php?source=edit_user&u_id={$user_id}'><i class='glyphicon glyphicon-pencil'></i</a></td>";	
			echo "<td class='text-center'><a href='users.php?delete={$user_id}'><i class='glyphicon glyphicon-remove'></i</a></td>";	
			echo "</tr>";


		}

	if(isset($_GET['delete'])){
		
		$user_id = $_GET['delete'];

		$query = "DELETE FROM users WHERE user_id = {$user_id}";
		
		$delete_user_query = mysqli_query($connection, $query);
		
		confirm_query($delete_user_query);

		header("Location: users.php");
		
	}
//		
//	if(isset($_GET['unapprove'])){
//
//		$comment_id = $_GET['unapprove'];
//
//		$query = "UPDATE comments SET comment_status = 'unapprove' WHERE comment_id ={$comment_id} ";
//
//		$unapprove_comment_query = mysqli_query($connection, $query);
//
//		confirm_query($unapprove_comment_query);
//
//
//		// UPDATE POST COMMENT COUNT
//		if($_GET['current_status'] === 'approve') {
//			$query = "UPDATE posts SET post_comment_count = post_comment_count - 1 ";
//			$query .= "WHERE post_id = $comment_post_id";
//
//			$update_comment_count = mysqli_query($connection, $query);
//			}
//		header("Location: comments.php");
//		
//	}
//		
//		if(isset($_GET['approve'])){
//		
//		$comment_id = $_GET['approve'];
//
//		$query = "UPDATE comments SET comment_status = 'approve' WHERE comment_id ={$comment_id} ";
//		
//		$approve_comment_query = mysqli_query($connection, $query);
//		
//		confirm_query($approve_comment_query);
//		// UPDATE POST COMMENT COUNT
//		if($_GET['current_status'] === 'unapprove') {
//			$query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
//			$query .= "WHERE post_id = $comment_post_id";
//
//			$update_comment_count = mysqli_query($connection, $query);
//		}
//		
//		header("Location: comments.php");
//		
//	}	


	?>

	</tbody>
</table>