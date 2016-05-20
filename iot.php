<?php
include 'connectdb.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>


<html>
<body>
hi   <br><br><br><br>

tempoutvalue: <?php echo $_GET["tempoutvalue"]; ?><br>
tempinvalue: <?php echo $_GET["tempinvalue"]; ?><br>
maninterrupt: <?php echo $_GET["maninterrupt"]; ?><br>
womaninterrupt: <?php echo $_GET["womaninterrupt"]; ?><br>
boyinterrupt: <?php echo $_GET["boyinterrupt"]; ?><br>
girlinterrupt: <?php echo $_GET["girlinterrupt"]; ?><br>


</body>
</html>

<?php

if($_GET["maninterrupt"]||$_GET["womaninterrupt"]||$_GET["boyinterrupt"]||$_GET["girlinterrupt"])
{
        if ($_GET["maninterrupt"])
        	{$type="M";}
         if ($_GET["womaninterrupt"])
        	{$type="W";}
         if ($_GET["boyinterrupt"])
        	{$type="B";}
         if ($_GET["girlinterrupt"])
        	{$type="G";}


 $sql = "INSERT INTO entry (type)

VALUES ('".$type."')";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
?>

<?php

if($_GET["tempoutvalue"]||$_GET["tempinvalue"])
{
 $sql = "INSERT INTO temperature (temp_in,temp_out)

VALUES ('".$_GET["tempinvalue"]."','".$_GET["tempoutvalue"]."')";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
?>