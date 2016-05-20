<?php
include 'connectdb.php';
$id = $_POST['id'];

if (isset($_POST['id'])) {
	$sql = "DELETE FROM promotion WHERE promotion_id = " . $id;

	$query = mysqli_query( $conn, $sql);
	if($query){
		echo "deleted";
	}else{
		echo mysql_error();
	}
	
}else{
	echo "Deleted failed";
}

mysqli_close($conn);
?>