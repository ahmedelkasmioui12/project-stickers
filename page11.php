<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F5F5F5;
        }

        .container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            padding: 20px;
        }

        .product {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 250px;
            height: 350px;
            padding: 20px;
            border: 1px solid #CCC;
            border-radius: 5px;
            background-color: #FFF;
            margin: 10px;
        }

        .product img {
            width: 100%;
            height: auto;
        }

        button {
            margin-top: 10px;
            cursor: pointer;
        }

        #product-details {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
        }

        #product-details > div {
            background-color: #FFF;
            padding: 50px;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="product">
            <h2>Product 1</h2>
            <img src="https://via.placeholder.com/150" alt="Product 1" onclick="zoomImage(this)">
            <button onclick="showProductDetails(1)">Product Details</button>
        </div>

        <div class="product">
            <h2>Product 2</h2>
            <img src="https://via.placeholder.com/150" alt="Product 2" onclick="zoomImage(this)">
            <button onclick="showProductDetails(2)">Product Details</button>
        </div>

        <div class="product">
            <h2>Product 3</h2>
            <img src="https://via.placeholder.com/150" alt="Product 3" onclick="zoomImage(this)">
            <button onclick="showProductDetails(3)">Product Details</button>
        </div>

        <div class="product">
            <h2>Product 4</h2>
            <img src="https://via.placeholder.com/150" alt="Product 4" onclick="zoomImage(this)">
            <button onclick="showProductDetails(4)">Product Details</button>
        </div>
    </div>

    <div id="product-details">
        <div>
            <h2 id="product-name"></h2>
            <p id="product-description"></p>
            <p id="product-price"></p>
            <button onclick="document.getElementById('product-details').style.display = 'none'">Close</button>
        </div>
    </div>

    <script>
        function zoomImage(img) {
            // magnify(img);
            alert("Image zoom functionality not implemented.");
        }

        function getProductDetails(productId) {
            var productDetails = {};

            if (productId === 1) {
                productDetails = {
                    name: "Product 1",
                    description: "This is the description for Product 1.",
                    price: "$19.99"
                };
            } else if (productId === 2) {
                productDetails = {
                    name: "Product 2",
                    description: "This is the description for Product 2.",
                    price: "$29.99"
                };
            } else if (productId === 3) {
                productDetails = {
                    name: "Product 3",
                    description: "This is the description for Product 3.",
                    price: "$39.99"
                };
            } else if (productId === 4) {
                productDetails = {
                    name: "Product 4",
                    description: "This is the description for Product 4.",
                    price: "$49.99"
                };
            }

            return productDetails;
        }

        function showProductDetails(productId) {
            var productDetails = getProductDetails(productId);

            document.getElementById('product-name').textContent = productDetails.name;
            document.getElementById('product-description').textContent = productDetails.description;
            document.getElementById('product-price').textContent = productDetails.price;

            document.getElementById('product-details').style.display = 'flex';
        }
    </script>
</body>
</html>

<?php
$host = 'localhost';
$db = 'dbname';
$user = 'username';
$pass = 'password';
$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
$sql = "SELECT * FROM products";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
?>
<div class="container">
    <?php foreach ($result as $product): ?>
        <div class="product">
            <h2><?php echo $product['name']; ?></h2>
            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" onclick="zoomImage(this)">
            <button onclick="showProductDetails(<?php echo $product['id']; ?>)">Product Details</button>
        </div>
    <?php endforeach; ?>
</div>

<div id="product-details">
    <div>
        <h2 id="product-name"></h2>
        <p id="product-description"></p>
        <p id="product-price"></p>
        <button onclick="document.getElementById('product-details').style.display = 'none'">Close</button>
    </div>
</div>

<script>
    function zoomImage(img) {
        // magnify(img);
        alert("Image zoom functionality not implemented.");
    }

    function getProductDetails(productId) {
        var productDetails = {};

        <?php foreach ($result as $product): ?>
            if (productId === <?php echo $product['id']; ?>) {
                productDetails = {
                    name: "<?php echo $product['name']; ?>",
                    description: "<?php echo $product['description']; ?>",
                    price: "<?php echo $product['price']; ?>"
                };
            }
        <?php endforeach; ?>

        return productDetails;
    }

    function showProductDetails(productId) {
        var productDetails = getProductDetails(productId);

        document.getElementById('product-name').textContent = productDetails.name;
        document.getElementById('product-description').textContent = productDetails.description;
        document.getElementById('product-price').textContent = productDetails.price;

        document.getElementById('product-details').style.display = 'flex';
    }
</script>
</body>
</html>