<?php include 'connectdb.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Add Promotion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <style type="text/css">
        p{
            color:gray;
        }
    </style>
    <!-- Loading Flat UI -->
    <link href="flatui/css/flat-ui.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    
    <script type="text/javascript">
        String.prototype.replaceAt=function(index, char){
            var a = this.split("");
            a[index] = char;
            return a.join("");
        }

        function addPromotion(){
            var typeValueBinary  = "0000";
            if (document.getElementById('m-check').checked){
                typeValueBinary = typeValueBinary.replaceAt(0, "1");
            }
            if (document.getElementById('w-check').checked){
                typeValueBinary = typeValueBinary.replaceAt(1, "1");
            }
            if (document.getElementById('b-check').checked){
                typeValueBinary = typeValueBinary.replaceAt(2, "1");
            }
            if (document.getElementById('g-check').checked){
                typeValueBinary = typeValueBinary.replaceAt(3, "1");
            }

            var typeValue = parseInt(typeValueBinary.split('').reverse().join(''), 2);
            var title = document.getElementById("title").value;
            var description = document.getElementById("description").value;
            var dataString = 'title=' + title + '&description=' + description + '&typevalue=' + typeValue;
            if (title == '' || description == '' || typeValue == 0) {
                alert("Please Fill All Fields");
            }else{
                $.ajax({
                    type: "POST",
                    url: "ajaxaddpromotion.php",
                    data: dataString,
                    cache: false,
                    success: function(html) {
                        if(html == 'added'){
                            loadPromotion();
                        }else{
                            alert(html);
                        }
                    }
                });
            }
            return false;
        }

        function loadPromotion(){
            document.getElementById('title').value = "";
            document.getElementById('description').value = "";
            document.getElementById('m-check').checked = false;
            document.getElementById('w-check').checked = false;
            document.getElementById('b-check').checked = false;
            document.getElementById('g-check').checked = false;
            
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
                  var ajaxDisplay = document.getElementById('promotion');
                  ajaxDisplay.innerHTML = ajaxRequest.responseText;
               }
             }


             ajaxRequest.open("GET", "ajaxloadpromotion.php", true);
             ajaxRequest.send(null); 
        }

        function removePromotion(id){
            $.ajax({
                    type: "POST",
                    url: "ajaxremovepromotion.php",
                    data: "id="+id,
                    cache: false,
                    success: function(html) {
                        if(html == 'deleted'){
                            loadPromotion();
                        }else{
                            alert(html);
                        }
                    }
            });
            
            return false;
        }
    </script>
</head>
<body style="padding: 10px 20px;">
<div class="container">
    <div class="row">
        <div class="col-xs-1">
            <a href="index.php"><</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h1>Promotion</h1>
            <p>You may now add your promotion here</p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-5">
            <form id="form" name="form">
                <fieldset>
                    <input type="text" id="title" name="title" class="input-block-level" placeholder="Title of your promotion"/>
                    
                    <textarea rows="3" id="description" name="description" class="input-block-level" placeholder="Description of your promotion"></textarea>

                    <p>Choose your target</p>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="" id="m-check"/>
                            Man
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="" id="w-check"/>
                            Woman
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="" id="b-check"/>
                            Boy
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="" id="g-check"/>
                            Girl
                        </label>
                    </div>
                    <input 
                        id="submit" 
                        onclick="addPromotion()" 
                        type="button" 
                        value="Add"
                        class="btn btn-danger pull-right"/>
                </fieldset>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        loadPromotion();
    </script>
    <div class="row" align="center">
        <div class="col-xs-12" id="promotion"></div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>
</body>
</html>