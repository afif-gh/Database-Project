<?php
include("connect.php");

$errorMessage = "";
$successMessage = "";

// Initialize variables
$id = $isbn = $book_title = $genre = $author = $publisher = $price = "";

// Handle GET request to fetch book details for editing
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = isset($_GET['id']) ? $_GET['id'] : "";

    if (empty($id)) {
        header("location: inventory.php");
        exit;
    }

    // Fetch book details from database
    $sql = "SELECT * FROM book WHERE book_id = :id";
    $stmt = oci_parse($dbconn, $sql);
    oci_bind_by_name($stmt, ':id', $id);
    oci_execute($stmt);

    $row = oci_fetch_assoc($stmt);

    if (!$row) {
        header("location: inventory.php");
        exit;
    }

    // Assign fetched values to variables
    $isbn = isset($row["ISBN"]) ? $row["ISBN"] : "";
    $book_title = isset($row["TITLE"]) ? $row["TITLE"] : "";
    $genre = isset($row["GENRE_ID"]) ? $row["GENRE_ID"] : "";
    $author = isset($row["AUTHOR_ID"]) ? $row["AUTHOR_ID"] : "";
    $publisher = isset($row["PUBLISHER_ID"]) ? $row["PUBLISHER_ID"] : "";
    $price = isset($row["PRICE"]) ? $row["PRICE"] : "";
}

// Handle POST request to update book details
elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isbn = $_POST["isbn"];
    $book_title = isset($_POST["title"]) ? $_POST["title"] : "";
    $genre = isset($_POST["genre_id"]) ? $_POST["genre_id"] : "";
    $author = isset($_POST["author_id"]) ? $_POST["author_id"] : "";
    $publisher = isset($_POST["publisher_id"]) ? $_POST["publisher_id"] : "";
    $price = isset($_POST["price"]) ? $_POST["price"] : "";

    // Validate inputs (you can add more validation as per your requirements)

    // Update query
    $sql = "UPDATE book 
            SET isbn = :isbn, 
                title = :title, 
                genre_id = :genre_id, 
                author_id = :author_id, 
                publisher_id = :publisher_id, 
                price = :price 
            WHERE book_id = :id";
    $stmt = oci_parse($dbconn, $sql);

    // Bind parameters
    oci_bind_by_name($stmt, ':isbn', $isbn);
    oci_bind_by_name($stmt, ':title', $book_title);
    oci_bind_by_name($stmt, ':genre_id', $genre);
    oci_bind_by_name($stmt, ':author_id', $author);
    oci_bind_by_name($stmt, ':publisher_id', $publisher);
    oci_bind_by_name($stmt, ':price', $price);
    oci_bind_by_name($stmt, ':id', $id);

    // Execute query
    $result = oci_execute($stmt);

    /*if ($result) {
        $successMessage = "Book updated successfully";
        // Redirect after successful update
        header("location: inventory.php");
        exit;
    } else {
        $errorMessage = "Update failed: " . oci_error($stmt)['message'];
    }*/
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
</head>
<body>
    <div class="container">
        <h1 class="display-4 text-center">Update Book</h1>
        <form action="staff-edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" value="<?php echo htmlspecialchars($isbn); ?>"> 
            </div>
            <div class="form-group">
                <label for="title">Book Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($book_title); ?>">
            </div>
            <div class="form-group">
                <label for="genre_id">Genre ID</label>
                <input type="text" class="form-control" id="genre_id" name="genre_id" value="<?php echo htmlspecialchars($genre); ?>">
            </div>
            <div class="form-group">
                <label for="author_id">Author ID</label>
                <input type="text" class="form-control" id="author_id" name="author_id" value="<?php echo htmlspecialchars($author); ?>">
            </div>
            <div class="form-group">
                <label for="publisher_id">Publisher ID</label> 
                <input type="text" class="form-control" id="publisher_id" name="publisher_id" value="<?php echo htmlspecialchars($publisher); ?>">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($price); ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="update-btn">Update</button>
        </form>

        <?php if ($errorMessage): ?>
            <div class="alert alert-danger" role="alert"><?php echo htmlspecialchars($errorMessage); ?></div>
        <?php endif; ?>
        <?php if ($successMessage): ?>
            <div class="alert alert-success" role="alert"><?php echo htmlspecialchars($successMessage); ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
