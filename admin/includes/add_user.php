<h1 class="page-header">
CREATE USER
</h1>
	

	<?php 

	if(isset($_POST['create_user'])) {
		$username = $_POST['username'];
		$user_password = $_POST['user_password'];
		$user_firstname = $_POST['user_firstname'];
		$user_lastname = $_POST['user_lastname'];
		$user_email = $_POST['user_email'];
		
		$user_image = $_FILES['user_image']['name'];
		$user_image_temp = $_FILES['user_image']['tmp_name'];
		
		$user_role = $_POST['user_role'];


		
		move_uploaded_file($user_image_temp, "../images/$user_image" );
		
		$query = "INSERT INTO users (username, user_password, user_firstname, user_lastname, user_email, 
		user_image, user_role) ";
		$query .= "VALUES ('{$username}', '{$user_password}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_image}', '{$user_role}') ";


		$create_user_query =  mysqli_query($connection, $query);
		
		confirm_query($create_user_query);
		$_SESSION['notice'] = "The user was successfully created.";
		header("Location: users.php");
		
		echo "User Created: " . " ";
		
	}






?>

<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="user_firstname">First Name</label>
		<input type="text" class="form-control" name="user_firstname">
	</div>
	<div class="form-group">
		<label for="user_lastname">Last Name</label>
		<input type="text" class="form-control" name="user_lastname">
	</div>
	<div class="form-group">
		<label for="username">Username</label>
		<input type="text" class="form-control" name="username" required>
	</div>
	<div class="form-group">
		<label for="user_password">Password</label>
		<input type="password" class="form-control" name="user_password" required>
	</div>

	
	<div class="form-group">
		<label for="user_email">email</label>
		<input type="email" class="form-control" name="user_email" required>
	</div>
	
	<div class="form-group">
		<label for="post_image">Image</label>
		<input type="file"  name="user_image">
	</div>
	
	
		<div class="form-group">
		<label for="user_role">Role</label>
		<select name="user_role" id="">
			<?php
			$query = "SELECT * FROM roles ";
			$select_roles = mysqli_query($connection, $query);
			
			confirm_query($select_roles);

			while($row = mysqli_fetch_assoc($select_roles)){
				$role_id = $row['role_id'];
				$role_title = $row['role_title'];
				
				echo "<option value='{$role_title}'>{$role_title}</option>";
			}
				
			?>
			
			
		</select> 
	</div>
	
	
	
	
	
	<br><br>

	<div class="form-group">
		<a href = "users.php" ><button class="btn btn-default" style="margin-right:10px"  value="Cancel">Cancel</button></a>
		<input class="btn btn-primary" type="submit" name="create_user" value="Create User">
	</div>


	
	
	
</form>