
</<!DOCTYPE html>
<html>
<head>
	<title>ku</title>
</head>
<body>


boo




</body>

<script> type="text/javascript">

    $(document).ready(function() {
        $('#btReload').click(function () {
            location.reload(true); 
        });    // RELOAD PAGE ON BUTTON CLICK EVENT.

        // SET AUTOMATIC PAGE RELOAD TIME TO 5000 MILISECONDS (5 SECONDS).
        setInterval('refreshPage()', 5000);
    });

    function refreshPage() { location.reload(); }

</script>
</html>