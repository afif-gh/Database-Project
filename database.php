<?php

    $user = "KEKW";
    $pass = "system";
    $host = "localhost/XE";
    $conn = oci_connect($user, $pass, $host);

    if($conn){
        echo "Connected to Oracle database";
    }
    else{
        echo "Something went wrong";
    }

?>