<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
</head>
<style>
    *{
        margin: 0;
        padding: 5px;
        box-sizing: border-box;
        font-family: monospace, sans-serif;
        font-size: 15px;
    }

    .container button{
        margin-top: 10px;
        margin-left: 5px;
    }

    .container form{
        width: 500px;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
        margin-left: 30%;
    }
</style>
<body>
    <div class="container">
    <h1 class="display-4 text-center">Add Book</h1>
        <form action="add-book.php" method="post">
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control" id="name" placeholder="Enter ISBN" name="isbn">
            </div>
            <div class="form-group">
                <label for="isbn">Book Name</label>
                <input type="text" class="form-control" id="bk-title" placeholder="Enter book name" name="bk-title">
            </div>
            <div class="form-group">
                <label for="isbn">Genre</label>
                <input type="text" class="form-control" id="genre" placeholder="Enter genre" name="genre">
            </div>
            <div class="form-group">
                <label for="isbn">Author</label>
                <input type="text" class="form-control" id="author" placeholder="Enter author name" name="author">
            </div>
            <div class="form-group">
                <label for="isbn">Publisher</label> 
                <input type="text" class="form-control" id="publisher" placeholder="Enter publisher name" name="publisher">
            </div>
            <div class="form-group">
                <label for="isbn">Price</label>
                <input type="text" class="form-control" id="price" placeholder="Set the price" name="price">
            </div>
            <div class="form-group">
                <label for="avail">Availability</label>
                    <select class="form-select" name="select-avail">
                        <option Selected value="PS">Choose Availability</option>
                        <option value="IN STOCK">In Stock</option>
                        <option value="OUT-OF-STOCK">Out of Stock</option> 
                    </select>
            </div>
            <button type="submit" class="btn btn-primary" name="save-btn">Save</button>
        </form>
    </div>
</body>
</html>