<?php
    if(isset($_GET['username'])&&isset($_GET['password']))
    {
        $usern = $_GET['username'];
        $pass = $_GET['password'];
        $hash_pass = md5($pass);
        
        if(empty($usern) || empty($pass)) {
            echo "
            <html>
                <head>
                    <meta charset=\"utf-8\">
                    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                    <title>Signup</title>

                    <link href=\"https://fonts.googleapis.com/css?family=Oswald:400,500\" rel=\"stylesheet\">
                    <link href=\"css/style.css\" rel=\"stylesheet\">
                </head>

                <body>
                    <section class=\"cont s\">
                        <h1>Oops! Something went wrong</h1>
                        <p>Please try again: <a href=\"login.html\">login</a></p>
                    </section>
                </body>
            </html>";
            die();
        }
        
        require 'vendor/autoload.php';
        $con = new MongoDB\Client("mongodb://localhost:27017");
        $collection = $con->login->web;
        $query = array("username"=>$usern, "password"=>$hash_pass);
        
        $cursor = $collection->find($query);
        if(!empty($cursor)) 
        {
            session_start();
            $_SESSION['username'] = $usern;
            header("location: loginUser.php");
        }
        else 
        {
            echo "
            <html>
                <head>
                    <meta charset=\"utf-8\">
                    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                    <title>Signup</title>

                    <link href=\"https://fonts.googleapis.com/css?family=Oswald:400,500\" rel=\"stylesheet\">
                    <link href=\"css/style.css\" rel=\"stylesheet\">
                </head>

                <body>
                    <section class=\"cont s\">
                        <h1>Oops! Something went wrong</h1>
                        <p>Please try again: <a href=\"login.html\">login</a></p>
                    </section>
                </body>
            </html>";
            die();
        }
        
    }
?>