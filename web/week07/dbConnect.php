<?php

//Connect to database
    function get_db() {
        $db = NULL;
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

            return $db;
        }

        function successMessage(){
            $message = "Item added!";
            return "<div class='message'>$message</div>";
        }
    ?> 