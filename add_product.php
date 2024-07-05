<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ikan_hias";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $target = "C:/xampp/htdocs/decoooo/images/" . basename($image);
    $featured = isset($_POST['featured']) ? 1 : 0;

    $sql = "INSERT INTO products (name, description, price, image, featured) VALUES ('$name', '$description', '$price', '$image', '$featured')";

    if ($conn->query($sql) === TRUE) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo "Product added successfully";
        } else {
            echo "Failed to upload image";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>