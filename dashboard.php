// dashboard.php
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}

$conn = new mysqli('localhost', 'username', 'password', 'database');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['add_student'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $grade = $_POST['grade'];
    $conn->query("INSERT INTO students (name, age, grade) VALUES ('$name', '$age', '$grade')");
}

$students = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['user']; ?></h1>
    <form method="POST" action="">
        <input type="text" name="name" placeholder="Student Name" required>
        <input type="number" name="age" placeholder="Age" required>
        <input type="text" name="grade" placeholder="Grade" required>
        <button type="submit" name="add_student">Add Student</button>
    </form>
    
    <h2>Student List</h2>
    <ul>
        <?php while ($row = $students->fetch_assoc()): ?>
            <li><?php echo $row['name'] . ' - Age: ' . $row['age'] . ' - Grade: ' . $row['grade']; ?></li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
