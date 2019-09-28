
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <script src="javascript/home.js"></script>


    <div class="container-fluid">
        <h1>Welcome to Merritt's Web Engineering II Page</h1>
    </div>
</head>
<body>
        <div class="container-fluid">
                <a id="assignments" href="assignments.php">CS-313 Assignments &#9658;</a>
                <p id="php">     
                    <?php
                    echo "Today is " . date("F d, Y");  
                    ?> 
                </p>
                <br>
        </div>

        <div id="hrline" class="container-fluid">
                <hr>
        </div>

        <div class="container-fluid">
            <div class="row justify-content-between, justify-content-around">
                <div class="col-sm-4"> 
                    <p>Hello from Utah! I am interested in sailing and using wax seal stamps to make cool letters and notes. 
                        Click below to see a few pictures of my favorite things</p><br>
                        <span id="clickme1" onClick="waxSeal()";>Wax seal stamps</span><br>
                        <span id="clickme2" onClick="sailing()";>Sailing</span> <br>
                        <span id="clickme3" onClick="tipping()";>Nearly capsizing</span><br>
                        <span id="clickme4" onClick="profile()">Back to me</span><br>
                </div>
                <div class="col-sm-4">
                    <img id="imageToChange" src="images/profile_pic.jpg" class="img-fluid" alt="Responsive image">
                </div>
            </div>
        </div>

</body>
</html>