<?php
include 'db.php';
header('Content-Type: text/html; charset=utf-8');

// Get customer details safely
$username    = $conn->real_escape_string($_POST['username']);
$phone       = $conn->real_escape_string($_POST['phone']);
$address     = $conn->real_escape_string($_POST['address']);
$card_number = $conn->real_escape_string($_POST['card_number']);
$expiry_month= $conn->real_escape_string($_POST['expiry_month']);
$expiry_year = $conn->real_escape_string($_POST['expiry_year']);
$cvv         = $conn->real_escape_string($_POST['cvv']);

// Step 1: Insert order into purchasehistory
$sql_order = "
    INSERT INTO purchasehistory (username, phone, address, card_number, expiry_month, expiry_year, cvv)
    VALUES ('$username', '$phone', '$address', '$card_number', '$expiry_month', '$expiry_year', '$cvv')
";

if ($conn->query($sql_order) === TRUE) {
    $order_id = $conn->insert_id;  // Get the generated order ID

    // Step 2: Insert order items
    $cart_json = $_POST['cart'] ?? '[]';
    $cart_items = json_decode($cart_json, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "Error decoding cart JSON: " . json_last_error_msg();
        exit;
    }

    if (is_array($cart_items)) {
        foreach ($cart_items as $item) {
            $product_name = $conn->real_escape_string($item['name']);
            $quantity     = (int)$item['qty'];
            $price        = (float)$item['price'];

            $sql_item = "
                INSERT INTO order_items (order_id, product_name, quantity, price)
                VALUES ('$order_id', '$product_name', '$quantity', '$price')
            ";

            if (!$conn->query($sql_item)) {
                echo "Error inserting order item: " . $conn->error;
            }
        }
    }

    // Success message and redirect
    echo "<script>alert('Thank you, $username! Your order has been received.');</script>";
    echo "<script>window.setTimeout(function(){ window.location.href = 'alrlogin.html'; }, 1000);</script>";

} else {
    echo "Error inserting order: " . $conn->error;
}
?>
