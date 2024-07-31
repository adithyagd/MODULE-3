<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];

    if (isset($_POST['display'])) {
        $sql = "SELECT * FROM students WHERE username='$username'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "Username: " . $row["username"]. " - Email: " . $row["email"]. "<br>";
            }
        } else {
            echo "0 results";
        }
    }

    if (isset($_POST['update'])) {
        $sql = "UPDATE students SET email='$email' WHERE username='$username'";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    if (isset($_POST['insert'])) {
        $sql = "INSERT INTO students (username, email) VALUES ('$username', '$email')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    if (isset($_POST['delete'])) {
        $sql = "DELETE FROM students WHERE username='$username'";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
}

$conn->close();
?>
