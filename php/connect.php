<?php
    $user = "ICT502PROJEK";
    $pass = "system";
    $host = "localhost/XE";
    $dbconn = oci_connect($user, $pass, $host);
    if (!$dbconn) {
        $e = oci_error(); trigger_error(htmlentities($e["message"], ENT_QUOTES), E_USER_ERROR);
    }

    else {
        echo "Oracle Database Connected!";
    }
?>