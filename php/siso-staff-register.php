<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <div class="wrapper" id="signUp">
        <h1 id="sisoheader">SIGN UP</h1>
        <form id="sisoform" method="post" action="staff-register.php">
            <input type="number" placeholder="IC number" name="icnum" required>
            <input type="text" placeholder="Name" name="name" required>
            <input type="email" placeholder="Email" name="email" required>
            <input type="number" placeholder="Phone Number" name="pnumber" required>
            <input type="password" placeholder="Password" name="password" required>
            <input type="password" placeholder="Re-enter Password" required>
            <select class="form-select" aria-label="Default select example" name="select-role">
                <option selected>Select a Role</option>
                <option value="Manager">Manager</option>
                <option value="Admin">Admin</option>
                <option value="Regular_staff">Regular Staff</option>
              </select>
            <input type="submit" id="sisobtn" value="Sign Up" name="staff-signup">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>