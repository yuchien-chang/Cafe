<?php
include 'db.php';
$username = $_POST['username'];
$product = $_POST['product'];

$stmt = $conn->prepare("INSERT INTO purchases (username, product_name, purchase_time) VALUES (?, ?, NOW())");
$stmt->bind_param("ss", $username, $product);
$stmt->execute();

echo "<h1>Thank you, $username!</h1><p>Your order for $product has been received.</p>";
?>
<?php
// Simple script to handle payment form POST

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize inputs
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $phone = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $address = htmlspecialchars(trim($_POST['address'] ?? ''));
    $card_number = htmlspecialchars(trim($_POST['card_number'] ?? ''));
    $expiry_month = htmlspecialchars(trim($_POST['expiry_month'] ?? ''));
    $expiry_year = htmlspecialchars(trim($_POST['expiry_year'] ?? ''));
    $cvv = htmlspecialchars(trim($_POST['cvv'] ?? ''));

    // Basic validation
    if (!$name || !$phone || !$address || !$card_number || !$expiry_month || !$expiry_year || !$cvv) {
        echo "Please fill in all required fields.";
        exit;
    }

    // Here you could add further validation for phone, card number format, etc.

    // For simulation, save data to a file
    $data = [
        'name' => $name,
        'phone' => $phone,
        'address' => $address,
        'card_number' => $card_number,
        'expiry_month' => $expiry_month,
        'expiry_year' => $expiry_year,
        'cvv' => $cvv,
        'timestamp' => date('Y-m-d H:i:s')
    ];

    // Append to a file (simulate database)
    $file = 'payments.txt';
    file_put_contents($file, json_encode($data) . PHP_EOL, FILE_APPEND);

    // Return confirmation page or message
    echo "<h2>Thank you, $name!</h2>";
    echo "<p>Your payment has been received and is being processed.</p>";
    echo "<a href='index.html'>Back to Menu</a>";
} else {
    // If not POST request, reject
    echo "Invalid request.";
}
?>
