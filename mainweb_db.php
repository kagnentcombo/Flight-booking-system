<?php 
    session_start();
    include('server.php');

    $errors = array();

    if(isset($_POST['main_search'])) {
        $start = mysqli_real_escape_string($conn, $_POST['start']);
        $to = mysqli_real_escape_string($conn, $_POST['to']);
        if ($start === $to){
            array_push($errors, "คุณกำลังเลือกจุดหมายและปลายทางเดียวกันอยู่");
        }

        if (count($errors)==0){
            header('location: nextflight.php');
        } else {
            header("location: mainweb.php");
        }

    }

?>