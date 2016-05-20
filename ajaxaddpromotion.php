<?php
include 'connectdb.php';
$title = $_POST['title'];
$description = $_POST['description'];
$typevalue = $_POST['typevalue'];

if (isset($_POST['title'])) {
	$sql = "INSERT INTO promotion(promotion_id, display_text, for_type, datetime, title) VALUES (NULL, '$description' , $typevalue , '', '$title')";

	$query = mysqli_query( $conn, $sql);
	if($query){
		echo "added";
	}else{
		echo mysql_error();
	}
	
}else{
	echo "Form Submitted failed";
}

mysqli_close($conn);
?>