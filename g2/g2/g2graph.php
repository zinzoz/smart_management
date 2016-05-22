<?php
if(isset($_POST['month'])){
	$month = $_POST['month'];
}

include '../../connectdb.php';
$sql = "SELECT DAY(ts) as day, COUNT(*) as entry FROM entry WHERE ts BETWEEN '2016-05-01 00:00:01' AND'2016-05-31 23:59:59' GROUP BY day";

$result = $conn->query($sql) or trigger_error($conn->error);
$sum_entry = array();
while ($row = $result->fetch_array()){
  $sum_entry[$row['day']] = $row['entry'];
}

$sum_entry_all = array();
$string_return = "";
for($i=0;$i<=31;$i++){
	if(!isset($sum_entry[$i])){
		$sum_entry_all[$i] = 0;
	}else{
		$sum_entry_all[$i] = (int)$sum_entry[$i];
	}
	if($i!=31){
		$string_return = $string_return . $sum_entry_all[$i] . ',';
	}else{
		$string_return = $string_return . $sum_entry_all[$i];
	}
}

echo $string_return;
mysqli_close($conn);

