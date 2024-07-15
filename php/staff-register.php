<?php

    include("connect.php");

    if(isset($_POST['staff-signup']))
    {

        $icnum = $_POST['icnum'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pnumber = $_POST['pnumber'];
        $password = $_POST['password'];
        $role = $_POST['select-role'];
        //$hash = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO staff (staffid, name, email, phone_num, password, role)
                VALUES (:staffid, :name, :email, :phone_num, :password, :role)";

        $stid = oci_parse($conn, $sql);

        oci_bind_by_name($stid, ":staffid", $icnum);
        oci_bind_by_name($stid, ":name", $name);
        oci_bind_by_name($stid, ":email", $email);
        oci_bind_by_name($stid, ":phone_num", $pnumber);
        oci_bind_by_name($stid, ":password", $password);
        oci_bind_by_name($stid, ":role", $role);

        if(oci_execute($stid))
        {
            header("location: siso-staff.php");
            exit;
        }
        else
        {
            $err = oci_error($stid); 
            echo "Error: Unable to register staff." .$err['message'];
        }

    }

    oci_close($conn);

?>