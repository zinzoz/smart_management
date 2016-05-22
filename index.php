<?php include 'connectdb.php';?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <title>Smart Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="flatui/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="flatui/css/flat-ui.min.css" rel="stylesheet">

    <link rel="shortcut icon" href="flatui/img/favicon.ico">

     <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        .hide-bullets {
            list-style:none;
            margin-left: -40px;
            margin-top:20px;
        }
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="flatui/js/vendor/html5shiv.js"></script>
      <script src="flatui/js/vendor/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        var show_type;
        var new_type;
        function checkEntry(){
            $.ajax({
                    type: "POST",
                    url: "ajaxgetlastentrytype.php",
                    cache: false,
                    success: function(html) {
                        if(html == 'M'){
                            console.log('m');
                        }else if(html == 'W'){
                            console.log('w');
                        }else if(html == 'B'){
                            console.log('b');
                        }else if(html == 'G'){
                            console.log('g');
                        }
                        new_type = html;
                        if(new_type != show_type){
                            show_type = new_type;
                            showPromotion(show_type);
                        }
                    }
            });
        }

        function showPromotion(type){
            var typeValue = 0;
            if(type.toUpperCase() === 'm'.toUpperCase()) {
                typeValue = 1;
            }
            if(type.toUpperCase() === 'w'.toUpperCase()) {
                typeValue = 2;
            }
            if(type.toUpperCase() === 'b'.toUpperCase()) {
                typeValue = 4;
            }
            if(type.toUpperCase() === 'g'.toUpperCase()) {
                typeValue = 8;
            }
            var ajaxRequest;
            try{
                ajaxRequest = new XMLHttpRequest();
            }catch (e){
                try{
                    ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                }catch (e) {
                    try{
                        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                  }catch (e){
                        console.log("error: broken browser");
                        return false;
                  }
                }
            }

             ajaxRequest.onreadystatechange = function(){
               if(ajaxRequest.readyState == 4){
                  var ajaxDisplay = document.getElementById('show-promotion');
                  ajaxDisplay.innerHTML = ajaxRequest.responseText;
               }
            }

            var parameters="type_show="+typeValue;
            ajaxRequest.open("POST", "ajaxshowpromotion.php", true);
            ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajaxRequest.send(parameters);

        }
    </script>
    </head>
    <body>
    <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="flatui/js/vendor/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="flatui/js/vendor/video.js"></script>
    <script src="flatui/js/flat-ui.min.js"></script>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1>Welcome..</h1>
                <p>Promotion by Smart Management</p>
            </div>
        </div>
        <div class="row">
            <hr/>
        </div>

        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <script>
            checkEntry();
            setInterval(checkEntry, 2000);
        </script>
        <div class="row" align="center">
            <div id="main_area">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 " id="show-promotion">
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>

        <div class="row">
            <hr/>
        </div>
        <div class="row" align="center">
            <div class="col-xs-12">
                <h3>For Management</h3>
            </div>
        </div>
        <div class="row" align="center">
            <div class="col-xs-6" id="add-pro-col">
                <span class="fui-new" style="font-size:180px;"></span>
                <p>Add promotion</p>
            </div>
            <div class="col-xs-6" id="view-stat-col">
                <span class="fui-window" style="font-size:180px;"></span>
                <p>View statistics</p>
            </div>
        </div>
        <br/>
        <br/>
        <br/>
        <div class="row">
            <hr/>
        </div>
        <div class="row" align="center">
            <p style="font-size:16px">Powered by Smart Management Team</p>
        </div>
    </div>
    <!-- /.container -->
    <script>
        $('#add-pro-col').css('cursor', 'pointer');
        $('#view-stat-col').css('cursor', 'pointer');

        $( "#add-pro-col").hover(
          function() {
            $( this).css(
                { opacity: 0.5 }
            );
          }, function() {
            $( this).css(
                { opacity: 1 }
            );
          }
        );

        $( "#view-stat-col").hover(
          function() {
            $( this).css(
                { opacity: 0.5 }
            );
          }, function() {
            $( this).css(
                { opacity: 1 }
            );
          }
        );

        $( "#add-pro-col" ).click(function() {
            window.location.href = "promotion.php";
        });

        $( "#view-stat-col" ).click(function() {
            window.location.href = "statistics.php";
        });







    </script>
  </body>
</html>
