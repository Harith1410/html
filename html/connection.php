<?php
$conn= new mysqli('localhost','root','','register');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Database connected successfully";

// insert data

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName  = $_POST['firstName'];
    $secondName = $_POST['secondName'];
    $lastName   = $_POST['lastName'];
    $email      = $_POST['email'];
    $password   = $_POST['password']; 

    // SQL query
    $sql = "INSERT INTO customer 
            (firstName, secondName, lastName, email, password)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $firstName, $secondName, $lastName, $email, $password);

    if ($stmt->execute()) {
        echo "Data inserted successfully";
    } else {
        echo "Error inserting data";
    }

    $stmt->close();
}

$conn->close();
?>



