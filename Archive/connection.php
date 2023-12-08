<?php

    $dsn = 'mysql:host=localhost; dbname=expenseman';
    $user = 'root';
    $pass = 'Admin1234';

    try {
        $pdo = new PDO($dsn, $user, $pass);
    }
    catch(PDOException $e){
        echo "Connection Error! ". $e->getMessage();
    }
?>

