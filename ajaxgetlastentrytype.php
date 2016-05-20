<?php
include 'connectdb.php';
$result = $conn->query("SELECT type FROM entry order by entry_id desc limit 1") or trigger_error($conn->error);
$row = $result->fetch_array(MYSQL_BOTH);
echo $row['type'];
mysqli_close($conn);
?>