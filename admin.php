<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard - Brew Bliss</title>
  <link rel="stylesheet" href="style.css" />

  <style>
        .font_1 { font-size: 24px; }
        .font_2 { font-size: 20px; }
        .font_3 { font-size: 16px; }
    </style>
    <script>
        function ChangeFont(fontClass) {
          document.body.className = fontClass;
        }
    </script>

</head>
<body>

  <nav id="nav">
    <div class="navTop">
      <div class="navItem">
        <img src="images/Contact/logo.png" alt="logo" class="logo">
      </div>

      <div class="navItem">
          <a class="btn" href="alrlogin.html">Home</a>
      </div>



      <div class="navItem">
        <div>
          <p>Text Size</p>
              <div>
                <a class="font_1" onclick="javascript:ChangeFont('font_1');" href="javascript:void(0);">Aa</a>
                <a class="font_2" onclick="javascript:ChangeFont('font_2');" href="javascript:void(0);">Aa</a>
                <a class="font_3" onclick="javascript:ChangeFont('font_3');" href="javascript:void(0);">Aa</a>
              </div>
        </div>
      </div>
    </nav>

<br>
<main class="dashboard_main">
  <header>
    <h1>Admin Dashboard</h1>
  </header>

  <br>

  <section class="order_table">
    <h2>Orders</h2>
    <table>
      <thead>
        <tr>
        <th>Order Id</th>
        <th>Username</th>
        <th>Products</th>
        <th>Price</th>
        <th>Quantity</th>
      </tr>
      </thead>
      <tbody id="order_items">
        <!-- Filled by fetch -->
      </tbody>

<?php
include 'db.php';

$sql= "SELECT username, product_name, price, quantity FROM order_items";
$result= $conn->query($sql);

if(!$result){
    die("Query failed: ". $conn->error);
}

$serialNumber = 1;

if($result->num_rows > 0){
    while($row=$result->fetch_assoc()){
        echo "<tr>";
        echo "<td>",$serialNumber."</td>";
        echo "<td>",$row["username"]."</td>";
        echo "<td>",$row["product_name"]."</td>";
        echo "<td>",$row["price"]."</td>";
        echo "<td>",$row["quantity"]."</td>";
        echo "</tr>";
        $serialNumber++;
    }
}else{
    echo "<tr><td colspan= '8'>No order found</td></tr>";
}
$conn->close();
?>
</table>
  </section>

  <br>

  <section class="purchase_table">
        <h2>Purchase History</h2>
    <table>
      <thead>
        <tr>
        <th>  </th>
        <th>Username</th>
        <th>Phone Number</th>
        <th>Address</th>
        <th>Card Number</th>
        <th>Expiry Month</th>
        <th>Expiry Year</th>
        <th>CVV</th>
        <th>Purchase Time</th></tr>
      </thead>
      <tbody id="purchasehistory">
        <!-- Filled by fetch -->
      </tbody>

<?php
include 'db.php';

$sql= "SELECT username, phone, address, card_number, expiry_month, expiry_year, cvv,purchase_time FROM purchasehistory";
$result= $conn->query($sql);

if(!$result){
    die("Query failed: ". $conn->error);
}

$serialNumber = 1;

if($result->num_rows > 0){
    while($row=$result->fetch_assoc()){
        echo "<tr>";
        echo "<td>",$serialNumber."</td>";
        echo "<td>",$row["username"]."</td>";
        echo "<td>",$row["phone"]."</td>";
        echo "<td>",$row["address"]."</td>";
        echo "<td>",$row["card_number"]."</td>";
        echo "<td>",$row["expiry_month"]."</td>";
        echo "<td>",$row["expiry_year"]."</td>";
        echo "<td>",$row["cvv"]."</td>";
        echo "<td>",$row["purchase_time"]."</td>";
        echo "</tr>";
        $serialNumber++;
        
    }
}else{
    echo "<tr><td colspan= '8'>No payment found</td></tr>";
}
$conn->close();
?>
</table>
  </section>
</main>

<br>

  <footer>
  <div class="footerLeft">
      <div class="footerMenu">
          <h1 class="fMenuTitle">About Us</h1>
          <ul class="fList">
              <li class="fListItem"><strong>Opening hour</strong><br>
              every day from 8:00 AM to 9:00 PM</li>
              <li class="fListItem"><strong>Location</strong><br>
              10 Downing Street, London SW1A 1AA</li>
              <li class="fListItem"><strong>Contact number</strong><br>
              +60123456789</li>
              <li class="fListItem"><strong>Email</strong><br>
              brewbliss@gmail.com</li>
          </ul>
      </div>
 
      </div>
  </div>
  <div class="footerRight">
      <div class="footerRightMenu">
          <h1 class="fMenuTitle">Subscribe to our channel</h1>
      </div>
      <div class="footerRightMenu">
          <h1 class="fMenuTitle">Follow Us</h1>
          <div class="fIcons">
              <img src="./images/Contact/facebook.png"  alt="facebook" class="fIcon">
              <img src="./images/Contact/instagram.png" alt="instagram" class="fIcon">
              <img src="./images/Contact/whatsapp.png" alt="whatsapp" class="fIcon">
          </div>
      </div>
      <div class="footerRightMenu">
          <span class="copyright">© 2025 Brew Bliss. All rights reserved.</span>
      </div>
  </div>
</footer>

</body>
</html>
