<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ikan_hias";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 1) {
        $product = $result->fetch_assoc();
    } else {
        echo "Product not found!";
        exit();
    }
} else {
    echo "Invalid product ID!";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?></title>
    <link rel="stylesheet" type="text/css" href="detail.css">
</head>
<body>
    <div class="product-detail">
        <h1><?php echo $product['name']; ?></h1>
        <img src="images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
        <p><?php echo $product['description']; ?></p>
        <p>Price: Rp <?php echo number_format($product['price'], 2); ?></p>
    </div>
</body>
</html>