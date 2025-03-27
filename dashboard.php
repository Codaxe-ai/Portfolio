<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: admin.php");
    exit();
}

require_once 'db_connect.php'; // Connect to Database

// Fetch Total Inventory
$inventoryQuery = "SELECT SUM(stock) AS total_inventory FROM products";
$inventoryResult = mysqli_query($conn, $inventoryQuery);
$totalInventory = ($inventoryResult) ? mysqli_fetch_assoc($inventoryResult)['total_inventory'] ?? 0 : 0;

// Fetch Total Sales
$salesQuery = "SELECT SUM(total_amount) AS total_sales FROM customer_orders";
$salesResult = mysqli_query($conn, $salesQuery);
$totalSales = ($salesResult) ? mysqli_fetch_assoc($salesResult)['total_sales'] ?? 0 : 0;

// Fetch Total Orders
$totalOrdersQuery = "SELECT COUNT(*) AS total_orders FROM customer_orders";
$totalOrdersResult = mysqli_query($conn, $totalOrdersQuery);
$totalOrders = ($totalOrdersResult) ? mysqli_fetch_assoc($totalOrdersResult)['total_orders'] ?? 0 : 0;

// Fetch New Customers (Orders placed today)
$newCustomersQuery = "SELECT COUNT(DISTINCT email) AS new_customers FROM customer_orders WHERE DATE(order_date) = CURDATE()";
$newCustomersResult = mysqli_query($conn, $newCustomersQuery);
$newCustomers = ($newCustomersResult) ? mysqli_fetch_assoc($newCustomersResult)['new_customers'] ?? 0 : 0;

// Fetch Low Stock Products
$lowStockQuery = "SELECT id, name AS product_name, category, stock, reorder_level FROM products WHERE stock < reorder_level";
$lowStockResult = mysqli_query($conn, $lowStockQuery);
$lowStockProducts = ($lowStockResult) ? mysqli_fetch_all($lowStockResult, MYSQLI_ASSOC) : [];

// Fetch Recent Orders
$recentOrdersQuery = "SELECT id, customer_name, total_amount, payment_method, order_date FROM customer_orders ORDER BY order_date DESC LIMIT 5";
$recentOrdersResult = mysqli_query($conn, $recentOrdersQuery);
$recentOrders = ($recentOrdersResult) ? mysqli_fetch_all($recentOrdersResult, MYSQLI_ASSOC) : [];

// Fetch Order Items with Product Details
$orderItemsQuery = "SELECT oi.order_id, oi.product_name, oi.price 
                    FROM order_items oi 
                    ORDER BY oi.order_id DESC LIMIT 10";
$orderItemsResult = mysqli_query($conn, $orderItemsQuery);
$orderItems = ($orderItemsResult) ? mysqli_fetch_all($orderItemsResult, MYSQLI_ASSOC) : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lumber Admin - Dashboard</title>
  <link rel="stylesheet" href="admin.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <div class="admin-container">
    <aside class="sidebar">
      <div class="sidebar-header">
        <h2>Lumber Admin</h2>
      </div>
      <nav class="sidebar-nav">
        <ul>
          <li class="active"><a href="dashboard.php"><span class="icon">📊</span> Dashboard</a></li>
          <li ><a href="products.php"><span class="icon">🪵</span> Products</a></li>
          <li><a href="orders.php"><span class="icon">📦</span> Orders</a></li>
          <li><a href="customer.php"><span class="icon">👥</span> Customers</a></li>
           <li><a href="logout.php"><span class="icon">🚪</span> Logout</a></li>
        </ul>
      </nav>
    </aside>

    <main class="main-content">
      <header class="content-header">
        <h1>Dashboard</h1>
         <div class="user-info">
            <span class="user-name">Admin User</span>
             <i class="fas fa-tree"></i>
          </div>
      </header>


      <!-- Stats Cards -->
      <div class="stats-container">
        <div class="stat-card"><h3>Total Inventory</h3><p><?php echo $totalInventory; ?></p></div>
        <div class="stat-card"><h3>Monthly Sales</h3><p>$<?php echo number_format($totalSales, 2); ?></p></div>
        <div class="stat-card"><h3>Total Orders</h3><p><?php echo $totalOrders; ?></p></div>
        <div class="stat-card"><h3>New Customers</h3><p><?php echo $newCustomers; ?></p></div>
      </div>

      <!-- Recent Orders -->
      <div class="dashboard-section">
        <h2>Recent Orders</h2>
        <div class="table-responsive">
          <table class="data-table">
            <tr><th>Order ID</th><th>Customer</th><th>Total</th><th>Payment</th><th>Date</th></tr>
            <?php foreach ($recentOrders as $order): ?>
              <tr>
                <td><?php echo htmlspecialchars($order['id']); ?></td>
                <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
                <td>$<?php echo number_format($order['total_amount'], 2); ?></td>
                <td><?php echo htmlspecialchars($order['payment_method']); ?></td>
                <td><?php echo htmlspecialchars($order['order_date']); ?></td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
      </div>

      <!-- Low Stock Alert -->
      <div class="dashboard-section">
        <h2>Low Stock Alert</h2>
        <div class="table-responsive">
          <table class="data-table">
            <tr><th>Product</th><th>Category</th><th>Stock</th><th>Reorder Level</th></tr>
            <?php foreach ($lowStockProducts as $product): ?>
              <tr>
                <td><?php echo htmlspecialchars($product['product_name']); ?></td>
                <td><?php echo htmlspecialchars($product['category']); ?></td>
                <td><?php echo htmlspecialchars($product['stock']); ?></td>
                <td><?php echo htmlspecialchars($product['reorder_level']); ?></td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
      </div>

      <!-- Recent Order Items -->
      <div class="dashboard-section">
        <h2>Recent Order Items</h2>
        <div class="table-responsive">
          <table class="data-table">
            <tr><th>Order ID</th><th>Product</th><th>Price</th></tr>
            <?php foreach ($orderItems as $item): ?>
              <tr>
                <td><?php echo htmlspecialchars($item['order_id']); ?></td>
                <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                <td>$<?php echo number_format($item['price'], 2); ?></td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
      </div>

    </main>
  </div>
</body>
</html>
