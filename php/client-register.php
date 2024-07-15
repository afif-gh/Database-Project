<?php

    include("connect.php");

    if(isset($_POST['siso-signup']))
    {

        $username = $_POST['Username'];
        $name = $_POST['Name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        //$hash = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (username, name, email, password)
                VALUES (:username, :name, :email, :password)";

        $stid = oci_parse($dbconn, $sql);

        oci_bind_by_name($stid, ":username", $username);
        oci_bind_by_name($stid, ":name", $name);
        oci_bind_by_name($stid, ":email", $email);
        oci_bind_by_name($stid, ":password", $password);

        if(oci_execute($stid))
        {
            header("location: siso.php");
            exit;
        }
        else
        {
            $err = oci_error($stid); 
            echo "Error: Unable to register user." .$err['message'];
        }

    }

    oci_close($dbconn);

?>