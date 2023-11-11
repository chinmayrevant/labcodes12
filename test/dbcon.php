<?php
    function opencon(){
        $user="root";
        $host="localhost";
        $db = "first";
        $pwd = "";

        $mysql = new mysqli($host,$user,$pwd,$db);

        if($mysql->connect_error){
            die("FAILED TO CONNECT");
        }
        return $mysql;
    }

    function closecon($conn){
        $conn->close();
    }
?>