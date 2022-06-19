<?php

    session_start();
    $url = "";
    if($_SESSION["authority"]==0){
        $url = "2_clerk.html";
    }
    if($_SESSION["authority"]==1){
        $url = "3_administrator.html";
    }
    else{
        $url = "1_login.php";
    }
    header("Location:$url" )
?>