<?php
    session_start();
    require 'vendor/autoload.php';
    $con = new MongoDB\Client("mongodb://localhost:27017");
    $collection = $con->login->web;
    
    $query = array("username"=>$_SESSION['username']);
    
    $cursor = $collection->find($query);
    foreach($cursor as $doc)
    {
        $_SESSION['name'] = $doc['name'];
        $_SESSION['age'] = $doc['age'];
        $_SESSION['photo'] = $doc['photo'];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Signup</title>
        
        <link href="https://fonts.googleapis.com/css?family=Oswald:400,500" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    
    <body>
        <section class="cont s">
            <h1>Willkommen <?php echo $_SESSION['username']?>!</h1>
            
        </section>
        <section class="cont s">
            <h3>Your name is: <?php echo $_SESSION['name']?></h3>
            <h3>And you are <?php echo $_SESSION['age']?> years old!</h3>
        </section>
        
        <section class="cont s">
            <img src="<?php echo $_SESSION['photo']?>" class="photo" />
        </section>
    </body>
</html>