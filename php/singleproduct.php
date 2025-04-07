<?php
include 'db_config.php';
$product_id = isset($_GET['id']) ? $_GET['id'] : 0;

if ($product_id != 0) {
    $sql = "SELECT * FROM perfumes WHERE id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Product not found.";
        exit;
    }
} else {
    echo "Invalid product ID.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfume Product Page</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
 body {
            font-family: 'Arial', sans-serif;
            background-image: url('../assets/images/background.jpg');
            background-size: cover;
            background-position: center;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 100px auto;
            padding: 20px;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 40px;
            height: 75vh;
        }

        .product-image {
            flex: 1;
            max-width: 500px;
            text-align: center;
        }

        .product-image img {
            width: 100%;
            max-width: 500px;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .product-details {
            flex: 2;
            max-width: 600px;
        }

        .product-details h1 {
            font-size: 36px;
            font-weight: bold;
            color: #fff;
            margin-bottom: 20px;
        }

        .product-details .price {
            font-size: 28px;
            font-weight: bold;
            color: #e74c3c;
            margin-bottom: 20px;
        }

        .product-details .old-price {
            text-decoration: line-through;
            font-size: 20px;
            color: #7f8c8d;
        }

        .product-details .description {
            font-size: 16px;
            color: #fff;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .product-details .add-to-cart-btn {
            padding: 15px 30px;
            background-color:rgb(0, 0, 0);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
            margin-top: 20px;
        }

        .product-details .add-to-cart-btn:hover {
            background-color: #c0392b;
        }

        .product-details .ratings {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }

        .product-details .ratings span {
            font-size: 18px;
            color: #f39c12;
            margin-right: 10px;
        }

        .product-details .ratings span:last-child {
            color:rgb(255, 255, 255);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }

            .product-image {
                margin-bottom: 20px;
            }
        }
  /* Purchase Form Styling */
.purchase-form {
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    margin-top: 40px;
    max-width: 600px;
    width: 100%;
    margin: 30px auto;
}

.purchase-form h2 {
    font-size: 28px;
    font-weight: bold;
    margin-bottom: 20px;
    color: #333;
    text-align: center;
}

/* Form Input Styles */
.purchase-form input,
.purchase-form textarea,
.purchase-form select {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

.purchase-form input:focus,
.purchase-form textarea:focus,
.purchase-form select:focus {
    border-color: #e74c3c;
    outline: none;
}

.purchase-form textarea {
    resize: vertical;
    min-height: 100px;
}

/* Submit Button Styles */
.purchase-form button {
    background-color:rgb(0, 0, 0);
    color: white;
    padding: 15px 30px;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    width: 100%;
    margin-top: 20px;
}

.purchase-form button:hover {
    background-color:rgb(32, 32, 32);
}
    </style>
</head>
<body>
<?php include 'header.php'; ?>

<div class="container">
    <!-- Product Image Section -->
    <div class="product-image">
        <img src="../assets/images/<?php echo $row['photo'];?>" alt="Perfume Bottle">
    </div>

    <!-- Product Details Section -->
    <div class="product-details">
        <h1><?php echo $row['name'];?></h1>
        <p class="price"> <span id="total_price" style="color:red; font-size:2.5rem">$<?php echo $row['current_price'];?></span> <span class="old-price"><?php echo $row['offer_price'];?></span></p>

        <div class="purchase-form">
    <h2>Complete Your Purchase</h2>
    <form action="process_purchase.php" method="POST">
        <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
        <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
        <input type="hidden" name="product_price" id="product_price" value="<?php echo $row['current_price']; ?>">

        <!-- Customer Name -->
        <input type="text" name="customer_name" placeholder="Your Name" required>

        <!-- Customer Email -->
        <input type="email" name="customer_email" placeholder="Your Email" required>

        <!-- Customer Address -->
        <textarea name="customer_address" placeholder="Your Address" rows="4" required></textarea>

        <!-- Quantity -->
        <select name="quantity" id="quantity" onchange="updateTotal()" required>
            <option value="1">1 Bottle</option>
            <option value="2">2 Bottles</option>
            <option value="3">3 Bottles</option>
            <option value="4">4 Bottles</option>
        </select>

        <!-- Payment Option -->
        <select name="payment_method" required>
            <option value="cod">Cash on Delivery</option>
        </select>


        <!-- Submit Button -->
        <button type="submit">Complete Purchase</button>
    </form>
</div>
</div>
</div>

<script>
    function updateTotal() {
        // Get product price from hidden input
        let productPrice = parseFloat(document.getElementById('product_price').value);
        
        // Get quantity selected by the user
        let quantity = parseInt(document.getElementById('quantity').value);
        
        // Calculate the total price
        let totalPrice = productPrice * quantity;
        
        // Update the total price display
        document.getElementById('total_price').innerText ="$" + totalPrice.toFixed(2);
        
        let totalInput = document.createElement('input');
        totalInput.type = 'hidden';
        totalInput.name = 'total_price';
        totalInput.value = totalPrice.toFixed(2);
        document.querySelector('form').appendChild(totalInput);
    }
</script>

<?php include 'footer.php'; ?>
</body>
</html>
