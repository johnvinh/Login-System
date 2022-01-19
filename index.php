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
    <form>
        
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
        <input type="submit" name="submit" value="Log-in">
    </form>
</main>
</body>
</html>