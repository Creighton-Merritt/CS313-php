<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <h1>Scripture Resources"</h1>
</head>
<body>

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
         echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '-' . '</strong>' . '"' . $row['content'] . '"' . '<br>'; 
       }
    ?>

</body>
</html>