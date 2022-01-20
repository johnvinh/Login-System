<?php
function close_db_connection()
{
    $GLOBALS['pdo'] = null;
}

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
else if (!isset($_POST['password-repeat'])) {
    echo 'Missing repeated password!';
    die();
}

// Ensure passwords are the same
if ($_POST['password'] !== $_POST['password-repeat']) {
    echo 'Passwords do not match!';
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

// Prevent a user from creating an account with a duplicate username
$stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
$stmt->execute([$_POST['username']]);
if ($stmt->rowCount() > 0) {
    echo 'Username taken!';
    close_db_connection();
    die();
}

// Finally, create the new user
$stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->execute([$_POST['username'], password_hash($_POST['password'], PASSWORD_DEFAULT)]);

close_db_connection();