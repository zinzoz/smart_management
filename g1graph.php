<?php

$date = $_POST['date'];

include 'connectdb.php';
$sql_man = "SELECT a.hour, COALESCE(b.entry, 0) as man_entry FROM ( SELECT 8 as hour, 0 as entry UNION SELECT 9 as hour, 0 as entry UNION SELECT 10 as hour, 0 as entry UNION SELECT 11 as hour, 0 as entry UNION SELECT 12 as hour, 0 as entry UNION SELECT 13 as hour, 0 as entry UNION SELECT 14 as hour, 0 as entry UNION SELECT 15 as hour, 0 as entry UNION SELECT 16 as hour, 0 as entry UNION SELECT 17 as hour, 0 as entry UNION SELECT 18 as hour, 0 as entry UNION SELECT 19 as hour, 0 as entry UNION SELECT 20 as hour, 0 as entry UNION SELECT 21 as hour, 0 as entry ) as a LEFT JOIN ( SELECT HOUR(ts) as hour, COUNT(*) as entry FROM entry WHERE type = 'M' AND ts BETWEEN '". $date ." 00:00:01' AND '".$date." 23:59:59' GROUP BY hour ) as b ON a.hour = b.hour";

$sql_woman = "SELECT a.hour, COALESCE(b.entry, 0) as woman_entry FROM ( SELECT 8 as hour, 0 as entry UNION SELECT 9 as hour, 0 as entry UNION SELECT 10 as hour, 0 as entry UNION SELECT 11 as hour, 0 as entry UNION SELECT 12 as hour, 0 as entry UNION SELECT 13 as hour, 0 as entry UNION SELECT 14 as hour, 0 as entry UNION SELECT 15 as hour, 0 as entry UNION SELECT 16 as hour, 0 as entry UNION SELECT 17 as hour, 0 as entry UNION SELECT 18 as hour, 0 as entry UNION SELECT 19 as hour, 0 as entry UNION SELECT 20 as hour, 0 as entry UNION SELECT 21 as hour, 0 as entry ) as a LEFT JOIN ( SELECT HOUR(ts) as hour, COUNT(*) as entry FROM entry WHERE type = 'W' AND ts BETWEEN '". $date ." 00:00:01' AND '".$date." 23:59:59' GROUP BY hour ) as b ON a.hour = b.hour";

$sql_boy = "SELECT a.hour, COALESCE(b.entry, 0) as boy_entry FROM ( SELECT 8 as hour, 0 as entry UNION SELECT 9 as hour, 0 as entry UNION SELECT 10 as hour, 0 as entry UNION SELECT 11 as hour, 0 as entry UNION SELECT 12 as hour, 0 as entry UNION SELECT 13 as hour, 0 as entry UNION SELECT 14 as hour, 0 as entry UNION SELECT 15 as hour, 0 as entry UNION SELECT 16 as hour, 0 as entry UNION SELECT 17 as hour, 0 as entry UNION SELECT 18 as hour, 0 as entry UNION SELECT 19 as hour, 0 as entry UNION SELECT 20 as hour, 0 as entry UNION SELECT 21 as hour, 0 as entry ) as a LEFT JOIN ( SELECT HOUR(ts) as hour, COUNT(*) as entry FROM entry WHERE type = 'B' AND ts BETWEEN '". $date ." 00:00:01' AND '".$date." 23:59:59' GROUP BY hour ) as b ON a.hour = b.hour";

$sql_girl = "SELECT a.hour, COALESCE(b.entry, 0) as girl_entry FROM ( SELECT 8 as hour, 0 as entry UNION SELECT 9 as hour, 0 as entry UNION SELECT 10 as hour, 0 as entry UNION SELECT 11 as hour, 0 as entry UNION SELECT 12 as hour, 0 as entry UNION SELECT 13 as hour, 0 as entry UNION SELECT 14 as hour, 0 as entry UNION SELECT 15 as hour, 0 as entry UNION SELECT 16 as hour, 0 as entry UNION SELECT 17 as hour, 0 as entry UNION SELECT 18 as hour, 0 as entry UNION SELECT 19 as hour, 0 as entry UNION SELECT 20 as hour, 0 as entry UNION SELECT 21 as hour, 0 as entry ) as a LEFT JOIN ( SELECT HOUR(ts) as hour, COUNT(*) as entry FROM entry WHERE type = 'G' AND ts BETWEEN '". $date ." 00:00:01' AND '".$date." 23:59:59' GROUP BY hour ) as b ON a.hour = b.hour";

$result = $conn->query($sql_man) or trigger_error($conn->error);
$man_entry = array();
while ($row = $result->fetch_array()){
  $man_entry[] = $row['man_entry'];
}
$result = $conn->query($sql_woman) or trigger_error($conn->error);
$woman_entry = array();
while ($row = $result->fetch_array()){
  $woman_entry[] = $row['woman_entry'];
}
$result = $conn->query($sql_boy) or trigger_error($conn->error);
$boy_entry = array();
while ($row = $result->fetch_array()){
  $boy_entry[] = $row['boy_entry'];
}
$result = $conn->query($sql_girl) or trigger_error($conn->error);
$girl_entry = array();
while ($row = $result->fetch_array()){
  $girl_entry[] = $row['girl_entry'];
}
mysqli_close($conn);

echo "$man_entry[0],$man_entry[1],$man_entry[2],$man_entry[3],$man_entry[4],$man_entry[5],$man_entry[6],$man_entry[7],$man_entry[8],$man_entry[9],$man_entry[10],$man_entry[11],$man_entry[12],$man_entry[13]*";
echo "$woman_entry[0],$woman_entry[1],$woman_entry[2],$woman_entry[3],$woman_entry[4],$woman_entry[5],$woman_entry[6],$woman_entry[7],$woman_entry[8],$woman_entry[9],$woman_entry[10],$woman_entry[11],$woman_entry[12],$woman_entry[13]*";
echo "$boy_entry[0],$boy_entry[1],$boy_entry[2],$boy_entry[3],$boy_entry[4],$boy_entry[5],$boy_entry[6],$boy_entry[7],$boy_entry[8],$boy_entry[9],$boy_entry[10],$boy_entry[11],$boy_entry[12],$boy_entry[13]*";
echo "$girl_entry[0],$girl_entry[1],$girl_entry[2],$girl_entry[3],$girl_entry[4],$girl_entry[5],$girl_entry[6],$girl_entry[7],$girl_entry[8],$girl_entry[9],$girl_entry[10],$girl_entry[11],$girl_entry[12],$girl_entry[13]";
?>
