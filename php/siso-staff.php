<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <div class="wrapper">
        <h1 id="sisoheader">STAFF SIGN IN</h1>
        <form id="sisoform" method="post" action="login-process.php">
            <input type="number" placeholder="IC Number" name="icnum">
            <input type="password" placeholder="Password" name="password">
            <input type="submit" id="sisobtn" value="Login" name="staff-login">
        </form>
    </div>
</body>
</html>