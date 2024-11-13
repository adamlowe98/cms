<?php
session_start();
$conn = new mysqli('localhost', 'username', 'password', 'database');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
    
    if ($result->num_rows > 0) {
        $_SESSION['user'] = $username;
        header("Location: dashboard.php");
    } else {
        echo "Invalid credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>
