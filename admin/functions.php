<?php



function confirm_query($result){
	global $connection;
	if(!$result){

		die("QUERY FAILED" . mysqli_error($connection));
	}

}

function insert_categories() {
	global $connection;
	if(isset($_POST['submit'])) {
	$cat_title = $_POST['cat_title'];
		if($cat_title == "" || empty($cat_title)){
			echo "This Field Should not be empty";
		}else{
			$query = "INSERT INTO categories(cat_title)";
			$query .= "VALUE('{$cat_title}')";

			$create_category_query = mysqli_query($connection, $query);

			if(!$create_category_query){
				die('Query Failed'. mysqli_error($connection));
			}
		}
	}
}



function find_all_categories(){
		global $connection;
		$query = "SELECT * FROM categories";
		$select_all_cat_query = mysqli_query($connection, $query);

		while($row = mysqli_fetch_assoc($select_all_cat_query)){
			$cat_id = $row['cat_id'];
			$cat_title = $row['cat_title'];

			echo "<tr>";
			echo "<td>{$cat_id}</td>";
			echo "<td>{$cat_title}</td>";
			echo "<td class='text-center'><a  href='categories.php?edit={$cat_id}'><i class='glyphicon glyphicon-pencil'></i></a></td>";
			echo "<td class='text-center'><a  href='categories.php?delete={$cat_id}'><i class='glyphicon glyphicon-remove'></i></a></td>";
			echo "</tr>";
		}
}


function delete_category(){
	global $connection;	
	if(isset($_GET['delete'])){
	$the_cat_id = $_GET['delete'];

	$query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
	$delete_query = mysqli_query($connection, $query);
	header("Location: categories.php");
	}	
}
?>