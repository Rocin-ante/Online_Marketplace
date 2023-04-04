<link rel="stylesheet" href="../ONLINE_MARKETPLACE/res/css/order_product.css">

<h1>My Order</h1>
<table>
<tr>
    <th>ID</th>
    <th>Username</th>
    <th>Product</th>
    <th>Quantity</th>
    <th>Unit_Price</th>
    <th>Total_Price</th>
    <th>Order Time</th>
</tr>
</table>

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