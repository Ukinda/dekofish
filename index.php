<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jual/Beli Ikan Hias</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <header>
      <div class="logo">
        <img src="img/logo.png" alt="Logo" />
        <span class="text">dekofish.com</span>
      </div>
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="index.php#new-products">Store</a></li>
          <li><a href="add_product_form.html" id="addProductBtn">Add Product</a></li>
          <li><a href="form.html" id="loginBtn">Login</a></li>
        </ul>
      </nav>
    </header>

    <section class="hero">
      <h1>PUSAT JUAL/BELI IKAN HIAS</h1>
      <p>Temukan ikan hias kesukaanmu disini</p>
      <button onclick="location.href='#new-products'">Click Here</button>
    </section>

    <section class="products">
      <h2>Produk Unggulan</h2>
      <div class="product-list">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ikan_hias"; // Pastikan nama database benar

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to get featured products
        $sql = "SELECT name, description, price, image FROM products WHERE featured = 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='product'>";
                echo "<img src='images/" . $row["image"] . "' alt='" . $row["name"] . "'>";
                echo "<h2>" . $row["name"] . "</h2>";
                echo "<p>" . $row["description"] . "</p>";
                echo "<p>Rp " . number_format($row["price"], 0, ',', '.') . "/ekor</p>";
                echo "</div>";
            }
        } else {
            echo "No featured products found.";
        }

        $conn->close();
        ?>
      </div>
    </section>

    <section id="new-products" class="new-products">
      <h2>Produk Baru</h2>
      <div class="product-list">
        <!-- Add new products here -->
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ikan_hias"; // Pastikan nama database benar
    
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        $sql = "SELECT id, name, description, price, image FROM products";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='product'>";
                echo "<img src='images/" . $row["image"] . "' alt='" . $row["name"] . "'>";
                echo "<h2>" . $row["name"] . "</h2>";
                echo "<p>" . $row["description"] . "</p>";
                echo "<p>Rp " . number_format($row["price"], 0, ',', '.') . "/ekor</p>";
                echo '<a href="product_detail.php?id=' . $row['id'] . '">View Details</a>'; 
                echo "</div>";
            }
        } else {
            echo "No products found.";
        }
    
        $conn->close();
        ?>
      </div>
    </section>

    <footer>
      <div class="footer-logo">
        <img src="img/logo.png" alt="Logo" />
      </div>
      <div class="footer-nav">
        <ul>
        <li><a href="index.php">Home</a></li>
          <li><a href="index.php#new-products">Store</a></li>
          <li><a href="add_product_form.html" id="addProductBtn">Add Product</a></li>
          <li><a href="form.html" id="loginBtn">Login</a></li>
        </ul>
      </div>
    </footer>

    <script src="script.js"></script>
  </body>
</html>
