<?php
// Do nothing if the file isn't being accessed by form submission
if (empty($_POST))
    die();

// Check for missing data
if (!isset($_POST['username'])) {
    echo 'Missing username!';
    die();
}
else if (!isset($_POST['password'])) {
    echo 'Missing password!';
    die();
}

$dsn = "mysql:host=localhost;dbname=authenticationtest;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];

// Set up the database connection
$pdo = null;

try {
    $pdo = new PDO($dsn, 'root', '', $options);
} catch (PDOException $e) {
    echo $e->getMessage();
}

// Query for the user's password
$stmt = $pdo->prepare("SELECT password FROM users WHERE username = ?");
$stmt->execute([$_POST['username']]);
// Check if user exists
$hashed_password = $stmt->fetch();
if (!$hashed_password) {
    echo 'No such user!';
    die();
}
$hashed_password = $hashed_password['password'];

// Password matches
if (password_verify($_POST['password'], $hashed_password)) {
    echo 'Login successful!';
}
// Password does not match
else {
    echo 'Incorrect password!';
    die();
}

session_start();
$_SESSION['username'] = $_POST['username'];
header("refresh:2;url=index.php");