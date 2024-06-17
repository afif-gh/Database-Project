<?php

    include("database.php");

    if(isset($_POST['signUp']))
    {

        $firstName = $_POST['Fname'];
        $lastName = $_POST['Lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (firstname, lastname, password, email)
                VALUES (:firstname, :lastname, :password, :email)";

        $stid = oci_parse($conn, $sql);

        oci_bind_by_name($stid, ":firstname", $firstName);
        oci_bind_by_name($stid, ":lastname", $lastName);
        oci_bind_by_name($stid, ":password", $hash);
        oci_bind_by_name($stid, ":email", $email);

        if(oci_execute($stid))
        {
            header("location: index.php");
            exit;
        }
        else
        {
            $err = oci_error($stid);
            echo "Error: Unable to register user. " . $err['message'];
        }

    }

    oci_close($conn);

?>