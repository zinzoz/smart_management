<?php

$date = $_POST['date'];

include 'connectdb.php';

$sql_temp = "SELECT a.hour, TRUNCATE(COALESCE(b.avg_temp_in, 0), 2) as avg_temp_in, TRUNCATE(COALESCE(b.avg_temp_out, 0), 2) as avg_temp_out 
FROM 
(
SELECT 8 as hour, 0 as avg_temp_in, 0 as avg_temp_out
UNION
SELECT 9 as hour, 0 as avg_temp, 0 as avg_temp_out
UNION
SELECT 10 as hour, 0 as avg_temp, 0 as avg_temp_out
UNION
SELECT 11 as hour, 0 as avg_temp, 0 as avg_temp_out
UNION
SELECT 12 as hour, 0 as avg_temp, 0 as avg_temp_out
UNION
SELECT 13 as hour, 0 as avg_temp, 0 as avg_temp_out
UNION
SELECT 14 as hour, 0 as avg_temp, 0 as avg_temp_out
UNION
SELECT 15 as hour, 0 as avg_temp, 0 as avg_temp_out
UNION
SELECT 16 as hour, 0 as avg_temp, 0 as avg_temp_out
UNION
SELECT 17 as hour, 0 as avg_temp, 0 as avg_temp_out
UNION
SELECT 18 as hour, 0 as avg_temp, 0 as avg_temp_out
UNION
SELECT 19 as hour, 0 as avg_temp, 0 as avg_temp_out
UNION
SELECT 20 as hour, 0 as avg_temp, 0 as avg_temp_out
UNION
SELECT 21 as hour, 0 as avg_temp, 0 as avg_temp_out
) as a
LEFT JOIN
(
SELECT HOUR(ts) as hour, AVG(temp_in) as avg_temp_in , AVG(temp_out) as avg_temp_out
FROM temperature 
WHERE ts BETWEEN '". $date ." 00:00:00' AND '". $date ." 23:59:59'
GROUP BY hour
) as b
ON a.hour = b.hour";

$sql_man = "SELECT a.hour, COALESCE(b.entry, 0) as man_entry FROM ( SELECT 8 as hour, 0 as entry UNION SELECT 9 as hour, 0 as entry UNION SELECT 10 as hour, 0 as entry UNION SELECT 11 as hour, 0 as entry UNION SELECT 12 as hour, 0 as entry UNION SELECT 13 as hour, 0 as entry UNION SELECT 14 as hour, 0 as entry UNION SELECT 15 as hour, 0 as entry UNION SELECT 16 as hour, 0 as entry UNION SELECT 17 as hour, 0 as entry UNION SELECT 18 as hour, 0 as entry UNION SELECT 19 as hour, 0 as entry UNION SELECT 20 as hour, 0 as entry UNION SELECT 21 as hour, 0 as entry ) as a LEFT JOIN ( SELECT HOUR(ts) as hour, COUNT(*) as entry FROM entry WHERE type = 'M' AND ts BETWEEN '". $date ." 00:00:01' AND '".$date." 23:59:59' GROUP BY hour ) as b ON a.hour = b.hour";

$sql_woman = "SELECT a.hour, COALESCE(b.entry, 0) as avg_temp_out FROM ( SELECT 8 as hour, 0 as entry UNION SELECT 9 as hour, 0 as entry UNION SELECT 10 as hour, 0 as entry UNION SELECT 11 as hour, 0 as entry UNION SELECT 12 as hour, 0 as entry UNION SELECT 13 as hour, 0 as entry UNION SELECT 14 as hour, 0 as entry UNION SELECT 15 as hour, 0 as entry UNION SELECT 16 as hour, 0 as entry UNION SELECT 17 as hour, 0 as entry UNION SELECT 18 as hour, 0 as entry UNION SELECT 19 as hour, 0 as entry UNION SELECT 20 as hour, 0 as entry UNION SELECT 21 as hour, 0 as entry ) as a LEFT JOIN ( SELECT HOUR(ts) as hour, COUNT(*) as entry FROM entry WHERE type = 'W' AND ts BETWEEN '". $date ." 00:00:01' AND '".$date." 23:59:59' GROUP BY hour ) as b ON a.hour = b.hour";

$sql_boy = "SELECT a.hour, COALESCE(b.entry, 0) as boy_entry FROM ( SELECT 8 as hour, 0 as entry UNION SELECT 9 as hour, 0 as entry UNION SELECT 10 as hour, 0 as entry UNION SELECT 11 as hour, 0 as entry UNION SELECT 12 as hour, 0 as entry UNION SELECT 13 as hour, 0 as entry UNION SELECT 14 as hour, 0 as entry UNION SELECT 15 as hour, 0 as entry UNION SELECT 16 as hour, 0 as entry UNION SELECT 17 as hour, 0 as entry UNION SELECT 18 as hour, 0 as entry UNION SELECT 19 as hour, 0 as entry UNION SELECT 20 as hour, 0 as entry UNION SELECT 21 as hour, 0 as entry ) as a LEFT JOIN ( SELECT HOUR(ts) as hour, COUNT(*) as entry FROM entry WHERE type = 'B' AND ts BETWEEN '". $date ." 00:00:01' AND '".$date." 23:59:59' GROUP BY hour ) as b ON a.hour = b.hour";

$sql_girl = "SELECT a.hour, COALESCE(b.entry, 0) as girl_entry FROM ( SELECT 8 as hour, 0 as entry UNION SELECT 9 as hour, 0 as entry UNION SELECT 10 as hour, 0 as entry UNION SELECT 11 as hour, 0 as entry UNION SELECT 12 as hour, 0 as entry UNION SELECT 13 as hour, 0 as entry UNION SELECT 14 as hour, 0 as entry UNION SELECT 15 as hour, 0 as entry UNION SELECT 16 as hour, 0 as entry UNION SELECT 17 as hour, 0 as entry UNION SELECT 18 as hour, 0 as entry UNION SELECT 19 as hour, 0 as entry UNION SELECT 20 as hour, 0 as entry UNION SELECT 21 as hour, 0 as entry ) as a LEFT JOIN ( SELECT HOUR(ts) as hour, COUNT(*) as entry FROM entry WHERE type = 'G' AND ts BETWEEN '". $date ." 00:00:01' AND '".$date." 23:59:59' GROUP BY hour ) as b ON a.hour = b.hour";

$result = $conn->query($sql_temp) or trigger_error($conn->error);
$temp_entry = array();
while ($row = $result->fetch_array()){
  $avg_temp_in[] = $row['avg_temp_in'];
  $avg_temp_out[] = $row['avg_temp_out'];
}

mysqli_close($conn);

echo "$avg_temp_in[0],$avg_temp_in[1],$avg_temp_in[2],$avg_temp_in[3],$avg_temp_in[4],$avg_temp_in[5],$avg_temp_in[6],$avg_temp_in[7],$avg_temp_in[8],$avg_temp_in[9],$avg_temp_in[10],$avg_temp_in[11],$avg_temp_in[12],$avg_temp_in[13]*";
echo "$avg_temp_out[0],$avg_temp_out[1],$avg_temp_out[2],$avg_temp_out[3],$avg_temp_out[4],$avg_temp_out[5],$avg_temp_out[6],$avg_temp_out[7],$avg_temp_out[8],$avg_temp_out[9],$avg_temp_out[10],$avg_temp_out[11],$avg_temp_out[12],$avg_temp_out[13]*";
echo "$avg_temp_out[0],$avg_temp_out[1],$avg_temp_out[2],$avg_temp_out[3],$avg_temp_out[4],$avg_temp_out[5],$avg_temp_out[6],$avg_temp_out[7],$avg_temp_out[8],$avg_temp_out[9],$avg_temp_out[10],$avg_temp_out[11],$avg_temp_out[12],$avg_temp_out[13]*";

?>
