<?php
    session_start();

    include "dbcon.php";

    if (isset($_SESSION["user"])){
        $user = $_SESSION["user"];
    }
    else{
        $user = "current session variable 'USER' in error";
    }

    if (isset($_COOKIE['lastlog'])){
        $lastlog = $_COOKIE['lastlog'];
        setcookie('lastlog',$user,time()+3600,'/');
    }
    else{
        $lastlog = "THIS IS THE FIRST USER TO LOGIN";
        setcookie('lastlog',$user,time()+3600,'/');
    }
    $mysql = opencon();
    $qry = "SELECT * FROM login WHERE username='$user'";

    if(mysqli_query($mysql, $qry)){
        $result = mysqli_query($mysql,$qry);
        $row = mysqli_fetch_assoc($result);
        $fname= $row['fname'];
        $lname= $row['lname'];
        $user=$row['username'];
        $age=$row['age'];
        $pwd=$row['password'];

    }
    else{
        echo "no details";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hell this is the home page</h1>
    <h2>The cookie and session details are given in the below table</h2>
    <table border=1>
        <tr><td>CURRENT USER SESSION VARIABLE VALUE:</td><td><?php echo $_SESSION['user'];?></td></tr>
        <tr><td>LAST LOGGED-IN INFO STORED IN COOKIE:</td><td><?php echo $lastlog;?></td></tr>
    </table>
    <br>
    <table border=1>
        <tr><td>FIRST NAME</td><td><?php echo $fname;?></td></tr>
        <tr><td>LAST NAME</td><td><?php echo $lname;?></td></tr>
        <tr><td>AGE</td><td><?php echo $age;?></td></tr>
        <tr><td>USERNAME</td><td><?php echo $user;?></td></tr>
    </table>
</body>
</html>