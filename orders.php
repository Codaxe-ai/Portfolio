<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: admin.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kyle";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lumber Admin - Orders</title>
  <link rel="stylesheet" href="admin.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
</head>
<body>
  <div class="admin-container">
    <aside class="sidebar">
      <div class="sidebar-header">
        <h2>Lumber Admin</h2>
      </div>
      <nav class="sidebar-nav">
        <ul>
          <li><a href="dashboard.php">📊 Dashboard</a></li>
          <li><a href="products.php">🪵 Products</a></li>
          <li class="active"><a href="orders.php">📦 Orders</a></li>
          <li><a href="customer.php">👥 Customers</a></li>
           <li><a href="logout.php"><span class="icon">🚪</span> Logout</a></li>
        </ul>
      </nav>
      <div class="sidebar-footer">
        <a href="logout.php"><button class="btn btn-outline">Logout</button></a>
      </div>
    </aside>

    <main class="main-content">
      <header class="content-header">
        <div class="header-left">
          <button id="sidebarToggle" class="sidebar-toggle">☰</button>
          <h1>Orders</h1>
        </div>
      </header>

      <div class="products-content">
        <div class="table-responsive">
          <table class="data-table">
            <thead>
              <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Date</th>
                <th>Total</th>
                <th>Payment Method</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Fetch orders from the customer_orders table
              $sql = "SELECT * FROM customer_orders ORDER BY order_date DESC";
              $result = $conn->query($sql);
              
              if ($result && $result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>#" . $row['id'] . "</td>";
                      echo "<td>" . htmlspecialchars($row['customer_name']) . "</td>";
                      echo "<td>" . date('M d, Y', strtotime($row['order_date'])) . "</td>";
                      echo "<td>$" . number_format($row['total_amount'], 2) . "</td>";
                      echo "<td>" . htmlspecialchars($row['payment_method']) . "</td>";
                      echo "</tr>";
                  }
              } else {
                  echo "<tr><td colspan='5' class='text-center'>No orders found</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>
</body>
</html>