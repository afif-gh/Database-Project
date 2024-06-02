<?php

    $conn = oci_connect("username", "password", "localhost/XE");

    if(!$conn){
        echo "Failed to connect to Oracle";
    }
    else{
        echo "Sucessfully connected to Oracle";
    }
    

?>