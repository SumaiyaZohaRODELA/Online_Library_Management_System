<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['password'];
$number = $_POST['number'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn->connect_error) {
    die("Connection Failed : " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO registration(firstName, lastName, gender, email, password, number) 
                            VALUES(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);

    if ($stmt->execute()) {
        // ✅ Redirect to success page
        header("Location: success.php");
        exit();
    } else {
        // If insert fails
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>