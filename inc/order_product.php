<link rel="stylesheet" href="../ONLINE_MARKETPLACE/res/css/order_product.css">

<html>
  <head>
    <meta charset="UTF-8">
    <title>Order Management</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="orders">
      <h2>My Orders</h2>
      <table>
        <thead>
          <tr>
            <th>Order Number</th>
            <th>Order Status</th>
            <th>Order Details</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>#12345</td>
            <td class="status shipped">Shipped</td>
            <td><a class="dropdown-item <?= ($site == "order_details") ? "active" : "" ?>" href="?site=order_details">『View Details』</a></td>
          </tr>
          <tr>
            <td>#67890</td>
            <td class="status pending">Pending</td>
            <td><a class="dropdown-item <?= ($site == "order_details") ? "active" : "" ?>" href="?site=order_details">『View Details』</a></td>
          </tr>
          <tr>
            <td>#24680</td>
            <td class="status cancelled">Cancelled</td>
            <td><a class="dropdown-item <?= ($site == "order_details") ? "active" : "" ?>" href="?site=order_details">『View Details』</a></td>
          </tr>
        </tbody>
        </tbody>
      </table>
    </div>
   </body> 
    <?php
      // 连接到数据库  mit Datenbank verbinden
      include_once 'config/dbaccess.php';
      $sql = "SELECT * FROM `order_product` ORDER BY `order_id` DESC";
      $result = mysqli_query($conn, $sql);

      while ($row = mysqli_fetch_array($result)) 
      {
          $total_price = $row["quantity"] * $row["unit_price"];
    ?>
    <tr>
      <td><?php echo $row['order_id'];?></td>
      <td><?php echo $row['username'];?></td>
      <td><?php echo $row['product_id'];?></td>
      <td><?php echo $row['quantity'];?></td>
      <td><?php echo $row['unit_price'];?></td>
      <td><?php echo $total_price;?></td>
      <td><?php echo date("Y-m-d H:i", $row['createtime']);?></td>
    </tr> 
    <?php           
      }   
    ?>   