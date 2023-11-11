<?php
    session_start();
    include "dbcon.php";

    $mysql = opencon();

    if(isset($_POST['username'])){
        if(isset($_POST['password'])){
            $u = $_POST['username'];
            $pass = $_POST['password'];

            $qry = "SELECT * FROM LOGIN WHERE USERNAME='$u' AND PASSWORD='$pass'";

            $result = mysqli_query($mysql,$qry);
            if(mysqli_num_rows($result)>0){
                $row = mysqli_fetch_array($result);
                $_SESSION['user'] = $row['username'];
                header('Location: home.php');
            }else{
                header('Location: login.html');
            }
        }
    }
?>