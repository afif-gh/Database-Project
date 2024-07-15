<?php 
    if(isset($_GET['id']))
    {
        include("connect.php"); // Assuming this file contains database connection settings

        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $isbn = validate($_GET['id']);

        $sql = "SELECT * FROM book_reps WHERE ISBN=:ISBN";
        $stid = oci_parse($conn, $sql);

        oci_bind_by_name($stid, ":ISBN", $isbn); // Corrected binding function

        oci_execute($stid);

        // Fetch the result
        if($row = oci_fetch_array($stid, OCI_ASSOC)) 
        {
            // Process your data here
            // Example:
            $isbn = $row['ISBN'];
            $book_title = $row['BOOK_TITLE'];
            $genre = $row['GENRE'];
            // Fetch other fields as needed

            // Example of using the fetched data in HTML:
            ?>
            <div>
                <p>ISBN: <?php echo $isbn; ?></p>
                <p>Title: <?php echo $book_title; ?></p>
                <p>Genre: <?php echo $genre; ?></p>
                <!-- Add other fields as needed -->
            </div>
            <?php
        } 
        else 
        {
            // No rows found, redirect to inventory
            header("Location: inventory.php");
            exit;
        }
    }
?>
