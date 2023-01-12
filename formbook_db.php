<?php 
    session_start();
    include('server.php');

    $errors = array();

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $sname = mysqli_real_escape_string($conn, $_POST['sname']);
    $ID = mysqli_real_escape_string($conn, $_POST['ID']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $flightId = mysqli_real_escape_string($conn, $_POST['flightId']);

    header("location: insure.php?title=$title&fname=$fname&sname=$sname&ID=$ID&age=$age&flightId=$flightId");

?>