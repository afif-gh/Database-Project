<?php
    include("connect.php");

    $sql = "SELECT * FROM book";
    $stid = oci_parse($dbconn, $sql);

    if (!$stid) {
        $e = oci_error($dbconn);
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    $execute_success = oci_execute($stid);

    if (!$execute_success) {
        $e = oci_error($stid);
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    $rows = array();
    while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
        $rows[] = $row;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: monospace, sans-serif;
            font-size: 15px;
        }
    </style>
</head>
<body style="margin: 50px;">
    <div class="container">
        <h1>Book List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ISBN</th>
                    <th>BOOK TITLE</th>
                    <th>GENRE</th>
                    <th>AUTHOR</th>
                    <th>PUBLISHER</th>
                    <th>PRICE</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($rows)): ?>
                    <?php foreach ($rows as $row): ?>
                        <tr>
                            <td><?php echo isset($row['ISBN']) ? htmlentities($row['ISBN']) : ''; ?></td>
                            <td><?php echo isset($row['TITLE']) ? htmlentities($row['TITLE']) : ''; ?></td>
                            <td><?php echo isset($row['GENRE_ID']) ? htmlentities($row['GENRE_ID']) : ''; ?></td>
                            <td><?php echo isset($row['AUTHOR_ID']) ? htmlentities($row['AUTHOR_ID']) : ''; ?></td>
                            <td><?php echo isset($row['PUBLISHER_ID']) ? htmlentities($row['PUBLISHER_ID']) : ''; ?></td>
                            <td><?php echo isset($row['PRICE']) ? '$' . htmlentities($row['PRICE']) : ''; ?></td>
                            <td><?php echo isset($row['STATUS']) ? htmlentities($row['STATUS']) : ''; ?></td>
                            <td>
                                <form method="post" action="staff-edit.php">
                                    <input type="hidden" name="isbn" value="<?php echo isset($row['ISBN']) ? htmlentities($row['ISBN']) : ''; ?>">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </form>
                                <form method="post" action="delete-book.php">
                                    <input type="hidden" name="isbn" value="<?php echo isset($row['ISBN']) ? htmlentities($row['ISBN']) : ''; ?>">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="8">No books found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
    oci_free_statement($stid);
    oci_close($dbconn);
?>
