<?php

?>
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
    <link rel="stylesheet" type="text/css" href="css/main.css">
 <body>   
    <div class="col-md-auto">
        <form action="main.php?page=list" method="post">
        <h3>Create list for:</h3>
            Name: 
            <select name="Name">
                <option hidden disabled selected value></option>
                <option value="Coty">Coty</option>
                <option value="Merritt">Merritt</option>
                <option value="Ethne">Ethne</option>
                <option value="Indie">Indie</option>
            </select> <br>
            Camping location:
            <select name="Location">
                <option hidden disabled selected value></option>
                <option value="Bear Lake">Bear Lake</option>
                <option value="Uinta Mountains">Uinta Mountains</option>
                <option value="San Rafael Swell">San Rafael Swell</option>
            </select>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>