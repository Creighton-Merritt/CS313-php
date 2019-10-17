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
    <!-- <script src="javascript/home.js"></script> -->


    <div class="container-fluid">
        <h1>Camping List Database</h1>
    </div>
</head>
<body>
        <div class="container-fluid">
                <a id="assignments" href="../assignments.php">CS-313 Assignments &#9658;</a>
                <br>
        </div>
        <div id="hrline" class="container-fluid">
                <hr>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-between, justify-content-around">
                <div class="col-sm-4"> 
                <?php
                    try
                    {
                        $dbUrl = getenv('DATABASE_URL');
                    
                        $dbOpts = parse_url($dbUrl);
                    
                        $dbHost = $dbOpts["host"];
                        $dbPort = $dbOpts["port"];
                        $dbUser = $dbOpts["user"];
                        $dbPassword = $dbOpts["pass"];
                        $dbName = ltrim($dbOpts["path"],'/');
                    
                        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
                    
                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    }
                    catch (PDOException $ex)
                    {
                        echo 'Error!: ' . $ex->getMessage();
                        die();
                    }

                    foreach ($db->query('SELECT book, chapter, verse, content FROM Scriptures') as $row)
                    {
                        echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . ' - ' . '</strong>' . '"' . $row['content'] . '"' . '<br>'; 
                    }
                    ?> 
                </div>
               
            </div>
        </div>

</body>
</html>