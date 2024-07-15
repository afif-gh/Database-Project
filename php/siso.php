<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <div class="wrapper" id="signUp" style="display: none;">
        <h1 id="sisoheader">SIGN UP</h1>
        <form id="sisoform" method="post" action="client-register.php">
            <input type="text" id="Username" placeholder="Username" name="Username" required>
            <input type="text" id="Name" placeholder="Name" name="Name" required>
            <input type="email" id="email" placeholder="Email" name="email" required>
            <input type="password" id="password" placeholder="Password" name="password" required>
            <input type="password" placeholder="Re-enter Password" required>
            <input type="submit" id="sisobtn" value="Sign Up" name="siso-signup">
        </form>
        <div class="members">
            Already a member? <button id="loginlink">Login here!</button>   
        </div>
    </div>

    <div class="wrapper" id="signIn">
        <h1 id="sisoheader">SIGN IN</h1>
        <form id="sisoform" method="post" action="login-process.php">
            <input type="text" placeholder="Username" name="uname">
            <input type="password" placeholder="Password" name="password">
            <input type="submit" id="sisobtn" value="Login" name="siso-login">
        </form>
        <div class="members">
            don't have an account <button id="signUplink">Sign Up here!</button>
        </div>
    </div>
    <script src="../script/script.js"></script>
</body>
</html>