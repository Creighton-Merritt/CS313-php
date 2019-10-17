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

                    foreach ($db->query('SELECT item_name, person_name_id, activity_name_id FROM items') as $row)
                    {
                        echo '<strong>' . $row['item_name'] . ' ' . $row['person_name_id'] . ':' . $row['activity_name_id'] . '</strong>' . '<br>'; 
                    }
                    ?> 
                </div>
               
            </div>
        </div>

</body>
</html>

<!-- SELECT 
    item_name, person_name_id, activity_name_id
FROM 
    items
WHERE ((person_name_id = 2) OR (person_name_id = 5) or (person_name_id = 8))
AND  ((activity_name_id = 3) OR (activity_name_id = 4))
ORDER BY item_name; -->