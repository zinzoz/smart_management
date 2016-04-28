<php?
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "iot";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname );

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Full width contact form - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <style type="text/css">
        
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
</head>
<body style="padding: 10px 20px;">
<div class="container">

     <p> ADD  Promotion <p>
    <div class="row" style="">
        <div class="col-xs-5">
        <form action="/" method="post" >
            <fieldset>
                <input type="text" id="name" name="title" class="input-block-level" placeholder="Title"/>
                
                <textarea rows="3" id="description" name="display_text" class="input-block-level" placeholder="Description"></textarea>
                <button type="submit" class="btn btn-warning pull-right">Submit</button>
            </fieldset>
        </form>
        </div>
    </div>




</div>
<script type="text/javascript">

</script>
</body>
</html>

<php?

if($_POST["title"]||$_POST["display_text"])
{
 $sql = "INSERT INTO promotion (title,display_text)

VALUES ('".$_POST["title"]."','".$_POST["display_text"]."')";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);


?>