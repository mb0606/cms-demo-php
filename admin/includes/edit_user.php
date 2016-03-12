<h1 class="page-header">
EDIT USER
</h1>


<?php
		if(isset($_GET['u_id'])) {

			$user_id =  $_GET['u_id'];

			$query = "SELECT * FROM users WHERE user_id = {$user_id}";
			$select_user_by_id = mysqli_query($connection, $query);

			while($row = mysqli_fetch_assoc($select_user_by_id)){
				$username = $row['username'];
				$user_password = $row['user_password'];
				$user_firstname = $row['user_firstname'];
				$user_lastname = $row['user_lastname'];
				$user_email = $row['user_email'];
				$user_image = $row['user_image'];
				$user_role = $row['user_role'];


			}
		}
	
	?>
	<?php 

	if(isset($_POST['edit_user'])) {
		$username = $_POST['username'];
		$user_password = $_POST['user_password'];
		$user_firstname = $_POST['user_firstname'];
		$user_lastname = $_POST['user_lastname'];
		$user_email = $_POST['user_email'];
		
		$user_image = $_FILES['user_image']['name'];
		$user_image_temp = $_FILES['user_image']['tmp_name'];
		
		$user_role = $_POST['user_role'];


		
		move_uploaded_file($user_image_temp, "../images/$user_image" );
		
		if(empty($user_image)){
			$query = "SELECT * FROM users WHERE user_id = {$user_id}";
			$select_image = mysqli_query($connection, $query);
			
			while($row = mysqli_fetch_assoc($select_image)) {
				
				$user_image = $row['user_image'];
			}
		}
		


		$query =  "UPDATE users SET ";
		$query .= "username = '{$username}', ";
		$query .= "user_password = '{$user_password}', ";
		$query .= "user_firstname = '{$user_firstname}', ";
		$query .= "user_lastname = '{$user_lastname}', ";
		$query .= "user_email = '{$user_email}', ";
		$query .= "user_image = '{$user_image}', ";
		$query .= "user_role = '{$user_role}' ";
		$query .= "WHERE user_id = '{$user_id}' ";
		

		
		$update_post = mysqli_query($connection, $query);
		
		confirm_query($update_post);
		header("Location: users.php");
	}






?>

<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="user_firstname">First Name</label>
		<input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname ;?>"  >
	</div>
	<div class="form-group">
		<label for="user_lastname">Last Name</label>
		<input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname ;?>" >
	</div>
	<div class="form-group">
		<label for="username">Username</label>
		<input type="text" class="form-control" name="username"  value="<?php echo $username ;?>" required>
	</div>
	<div class="form-group">
		<label for="user_password">Password</label>
		<input type="password" class="form-control" name="user_password"  value="<?php echo $user_password ;?>" required>
	</div>

	
	<div class="form-group">
		<label for="user_email">email</label>
		<input type="email" class="form-control" name="user_email"  value="<?php echo $user_email ;?>" required>
	</div>
	<div class="form-group">
		<img width="50" height="50" src="../images/<?php echo $user_image;?>" alt="">
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
				
				if($role_title === $user_role){
					echo "<option value='{$role_title}' selected>{$role_title}</option>";
				}else{
					echo "<option value='{$role_title}'>{$role_title}</option>";
				}
			}
				
			?>
			
			
		</select> 
	</div>
	
	
	
	
	
	<br><br>

	<div class="form-group">
		<a href = "users.php" ><button class="btn btn-default" style="margin-right:10px"  value="Cancel">Cancel</button></a>
		<input class="btn btn-primary" type="submit" name="edit_user" value="Edit User">
	</div>


	
	
	
</form>