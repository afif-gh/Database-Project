<?php

    include("connect.php");

    if(isset($_POST['staff-login']))
    {
        $icnumber = isset($_POST['icnum']) ? trim($_POST['icnum']) : '';
        $password = isset($_POST['password']) ? trim($_POST['password']) : '';

        $sql = "SELECT password FROM staff WHERE staffid = :icnumber AND password = :password";
        $stid = oci_parse($conn, $sql);

        oci_bind_by_name($stid, ':icnumber', $icnumber);
        oci_bind_by_name($stid, ':password', $password);

        oci_execute($stid);

        $row = oci_fetch_array($stid, OCI_ASSOC); 

        if($row)
        {
                header("location: ../html/staff-homepage.html");
        }
        else
        {
            echo nl2br("\nIncorrect password or IC number");
        }
    }

    if(isset($_POST['siso-login']))
    {
        $username = isset($_POST['uname']) ? trim($_POST['uname']) : '';
        $password = isset($_POST['password']) ? trim($_POST['password']) : '';

        $sql = "SELECT password FROM users WHERE username = :username AND password = :password";
        $stid = oci_parse($conn, $sql);

        oci_bind_by_name($stid, ':username', $username);
        oci_bind_by_name($stid, ':password', $password);

        oci_execute($stid);

        $row = oci_fetch_array($stid, OCI_ASSOC); 

        if($row)
        {
                header("location: ../html/client-homepage.html");
        }
        else
        {
            echo nl2br("\nIncorrect password or username");
        }
    }
    
    oci_close($conn);

?>