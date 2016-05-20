<?php
include 'connectdb.php';

$type = $_POST['type_show'];
$sql = "SELECT title, display_text FROM promotion WHERE for_type =".$type. " order by promotion_id desc";
$result = $conn->query($sql) or trigger_error($conn->error);

while ($row = $result->fetch_array(MYSQL_BOTH)){

echo "<p style='font-size: 70px'>" . $row['title'] . "</p>";
echo "<p style='font-size: 50px'>" . $row['display_text'] . "</p>";

}
mysqli_close($conn);
?>