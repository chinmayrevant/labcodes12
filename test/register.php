<?php
    session_start();
    include "dbcon.php";
    $mysql = opencon();

    $fname= $_POST['fname'];
    $lname= $_POST['lname'];
    $user=$_POST['user'];
    $age=$_POST['age'];
    $pwd=$_POST['pwd'];

    $qry = "INSERT INTO LOGIN values ('$fname','$lname','$user','$age','$pwd')";

    if(mysqli_query($mysql, $qry)){
        $_SESSION['user'] = $user;
        header('Location:login.html');
    }
    else{
        echo "ERROR";
    }

?>