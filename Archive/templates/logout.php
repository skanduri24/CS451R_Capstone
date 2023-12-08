<?php
    include_once "../init.php";
    $getFromU->logout();

    // Redirect to the index page
    header("Location: ". BASE_URL .'index.php');
    exit(); // Make sure to exit after the header redirect
?>