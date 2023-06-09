<link rel="stylesheet" href="../ONLINE_MARKETPLACE/res/css/order_product.css">

<div class="container mt-4">
    <div class="card p-4 rounded">
        <?php
            $id = $_GET['id'];
            include_once 'config/dbaccess.php';
            $sql = "SELECT * FROM `order` WHERE `order_id` = $id ORDER BY `order_id` DESC";
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        ?>

        <!-- 订单详情视图 -->
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">product id</th>
                    <th scope="col">name</th>
                    <th scope="col">product image</th>
                    <th scope="col">quantity</th>
                    <th scope="col">unit price</th>
                    <th scope="col">total price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $id = $_GET['id'];
                    include_once 'config/dbaccess.php';
                    $sql = "SELECT * FROM `order` o
                            JOIN `product` p ON o.product_id = p.product_id
                            WHERE o.`order_id` = $id";
                    $result = mysqli_query($conn, $sql);
                    $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    foreach ($arr as $key => $row) {
                ?>
                <tr>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><img style="width:100px;height:100px;" src="<?php echo $row['product_image']; ?>" alt=""></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['unit_price']; ?></td>
                    <td><?php echo $row['unit_price'] * $row['quantity']; ?></td>
                </tr>
                <?php           
                    }   
                ?>   
            </tbody>
        </table>

        <p class="text-lowercase">order date: <?php echo date('Y-m-d H:i:s', $row['order_date']);?></p>
        <p class="text-lowercase">address: <?php echo $arr[0]['shipping_address']; ?></p>
        <p class="text-lowercase">pay: <?php
            switch ($arr[0]['payment_method']) {
                case 1:
                    echo 'Paypal';
                    break;
                case 2:
                    echo 'Apple Pay';
                    break;
                case 3:
                    echo 'UnionPay';
                    break;
                default:
                    echo '';
            }
        ?>
        </p>
        <a class="btn btn-primary" href="?site=order_product">return</a>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
