<?php

include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_address = $_POST['customer_address'];
    $quantity = $_POST['quantity'];
    $payment_method = $_POST['payment_method'];
    $total_price = $_POST['total_price'];


    $sql = "INSERT INTO orders (product_id, product_name, product_price, customer_name, customer_email, customer_address, quantity, payment_method, total_price) 
            VALUES ('$product_id', '$product_name', '$product_price', '$customer_name', '$customer_email', '$customer_address', '$quantity', '$payment_method', '$total_price')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Order placed successfully!');
                window.location.href = 'index.php'; // Redirect to the homepage
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
