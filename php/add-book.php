<?php 
    include("connect.php");

    if(isset($_POST['save-btn']))
    {
        $isbn = $_POST['isbn'];
        $bk_title = $_POST['bk-title'];
        $genre = $_POST['genre'];
        $author = $_POST['author'];
        $publisher = $_POST['publisher'];
        $price = $_POST['price'];
        $status = $_POST['select-avail'];

        $sql = "INSERT INTO book_reps (ISBN, BOOK_NAME, GENRE, AUTHOR, PUBLISHER, PRICE, STATUS)
                VALUES (:ISBN, :BOOK_NAME, :GENRE, :AUTHOR, :PUBLISHER, :PRICE, :STATUS)";

        $stid = oci_parse($conn, $sql);

        oci_bind_by_name($stid, ":ISBN", $isbn);
        oci_bind_by_name($stid, ":BOOK_NAME", $bk_title);
        oci_bind_by_name($stid, ":GENRE", $genre);
        oci_bind_by_name($stid, ":AUTHOR", $author);
        oci_bind_by_name($stid, ":PUBLISHER", $publisher);
        oci_bind_by_name($stid, ":PRICE", $price);
        oci_bind_by_name($stid, ":STATUS", $status);

        if(oci_execute($stid))
        {
            header("location: inventory.php");
            exit;
        }
        else
        {
            $err = oci_error($stid); 
            echo "Error: Unable add book." .$err['message'];
        }
    }

    oci_close($conn);
?>