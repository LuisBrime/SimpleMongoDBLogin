<?php
    if(isset($_GET['username'])&&isset($_GET['password']))
    {
        $usern = $_GET['username'];
        $pass = $_GET['password'];
        $name = $_GET['name'];
        $age = $_GET['age'];
        $photo = $_GET['img'];
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
                        <p>Please try again: <a href=\"index.html\">signup</a></p>
                    </section>
                </body>
            </html>";
            die();
        }
        
        require 'vendor/autoload.php';
        $con = new MongoDB\Client("mongodb://localhost:27017");
        $collection = $con->login->web;
        $doc = array(
            "username"=>$usern,
            "password"=>$hash_pass,
            "name"=>$name,
            "age"=>$age,
            "photo"=>$photo
        );
        $result = $collection->insertOne($doc);
        
        if(!empty($result)) 
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
                        <h1>Signup Successful</h1>
                        <p>Now you can <a href=\"login.html\">login</a></p>
                    </section>
                </body>
            </html>";
            die();
        }
        else {
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
                        <p>Please try again: <a href=\"index.html\">signup</a></p>
                    </section>
                </body>
            </html>";
            die();
        }
    }
?>