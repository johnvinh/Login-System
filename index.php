<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login System</title>
</head>
<body>
<header>
    <h1>Website Name</h1>
</header>
<main>
    <h2>Login</h2>
    <form action="login.php" method="post">
        <div>
            <label for="username-login">Username</label>
            <input type="text" id="username-login" name="username">
        </div>
        <div>
            <label for="password-login">Password</label>
            <input type="password" id="password-login" name="password">
        </div>
        <input type="submit" name="submit" value="Login">
    </form>
    <h2>Sign-up</h2>
    <form action="signup.php" method="post">
        <div>
            <label for="username-signup">Username</label>
            <input type="text" id="username-signup" name="username">
        </div>
        <div>
            <label for="password-signup">Password</label>
            <input type="password" id="password-signup" name="password">
        </div>
        <div>
            <label for="password-signup-repeat">Repeat Password</label>
            <input type="password" id="password-signup-repeat" name="password-repeat">
        </div>
        <input type="submit" name="submit" value="Sign Up">
    </form>
</main>
</body>
</html>