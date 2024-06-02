<?php

    $conn = oci_connect("username", "password", "localhost/servicename");

    if(!$conn){
        echo "Failed to connect to Oracle";
    }
    else{
        echo "Sucessfully connected to Oracle";
    }
    

?>