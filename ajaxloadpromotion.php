<?php
include 'connectdb.php';
$result = $conn->query("SELECT * FROM promotion order by promotion_id desc") or trigger_error($conn->error);
echo "<table style='width:100%; border: 1px solid black;'>";
echo "<tr>";

echo "<th align='center' style='border: 1px solid black;'>";
echo "Title";
echo "</th>";

echo "<th align='center' style='border: 1px solid black;'>";
echo "Display Text";
echo "</th>";

echo "<th align='center' style='border: 1px solid black;'>";
echo "For";
echo "</th>";

echo "<th align='center' style='border: 1px solid black;'>";
echo "Manage";
echo "</th>";

echo "</tr>";

while ($row = $result->fetch_array(MYSQL_BOTH)){
$forTemp = decbin($row['for_type']);
$forTemp = str_pad($forTemp, 4, "0", STR_PAD_LEFT);
$for = "";
if($forTemp[3]==1){
	$for = $for . "Man ";
}
if($forTemp[2]==1){
	$for = $for . "Woman ";
}
if($forTemp[1]==1){
	$for = $for . "Boy ";
}
if($forTemp[0]==1){
	$for = $for . "Girl";
}
echo "<tr style='border: 1px solid gray;'>";

echo "<td align='center'>" . $row['title'] . "</td>";
echo "<td align='center'>" . $row['display_text'] . "</td>";
echo "<td align='center'>" . $for . "</td>";
echo "<td align='center'>";
echo "<span class='fui-trash' onclick='removePromotion(". $row['promotion_id'] .")'></span>";
echo "</td>";
echo "</tr>";

}
echo "</table>";
mysqli_close($conn);
?>