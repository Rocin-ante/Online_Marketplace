<link rel="stylesheet" href="../ONLINE_MARKETPLACE/res/css/order_product.css">
<!DOCTYPE html>
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
            <td><a class="dropdown-item <?= ($site == "order_details") ? "active" : "" ?>" href="?site=order_details">View Details</a></td>
          </tr>
          <tr>
            <td>#67890</td>
            <td class="status pending">Pending</td>
            <td><a class="dropdown-item <?= ($site == "order_details") ? "active" : "" ?>" href="?site=order_details">View Details</a></td>
          </tr>
          <tr>
            <td>#24680</td>
            <td class="status cancelled">Cancelled</td>
            <td><a class="dropdown-item <?= ($site == "order_details") ? "active" : "" ?>" href="?site=order_details">View Details</a></td>
          </tr>
        </tbody>
        </tbody>
      </table>
    </div>
   </body> 