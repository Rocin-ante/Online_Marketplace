<link rel="stylesheet" href="../ONLINE_MARKETPLACE/res/css/order_product.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<?
    $id = $_GET['id'];
    include_once 'config/dbaccess.php';
    $sql = "SELECT * FROM `order` where `order_id` = $id ORDER BY `order_id` DESC";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
?>
<!-- 订单详情视图 -->
<table class="table  table-hover">
    <thead class="thead-dark">
        <tr>
            <!-- <th scope="col">#</th> -->
            <th scope="col">product_id</th>
            <th scope="col">name</th>
            <th scope="col">product_image</th>
            <th scope="col">quantity</th>
            <th scope="col">unit_price</th>
            <th scope="col">total_price</th>
        </tr>
    </thead>
    <tbody>
        <?php
                // 连接到数据库  mit Datenbank verbinden
                include_once 'config/dbaccess.php';
                $sql = "SELECT * FROM `order_product` op
                    join `product` p on p.product_id = op.product_id
                    where `order_id` = $id ORDER BY `order_id` DESC";
                $result = mysqli_query($conn, $sql);
                $arr = mysqli_fetch_all($result,MYSQLI_ASSOC);
                foreach ($arr as $key => $row) {
            ?>
            <tr>
                <!-- <th scope="row">1</th> -->
                <td><?php echo $row['product_id'];?></td>
                <td><?php echo $row['product_name'];?></td>
                <td><img style="width:100px;height:100px;" src="<?php echo $row['product_image'];?>" alt=""></td>
                <td><?php echo $row['quantity'];?></td>
                <td><?php echo $row['unit_price'];?></td>
                <td><?php echo $row['unit_price'] * $row['quantity'];?></td>
            </tr>
                <?php           
            }   
          ?>   
    </tbody>
</table>
    <p class="text-lowercase">order_date:<?echo $data[0]['order_date'];?></p>
    <p class="text-lowercase">address:<?echo $data[0]['shipping_address'];?></p>
    <p class="text-lowercase">pay:<?php
        switch ($data[0]['payment_method'])
        {
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
            ;?>
    </p>
    <a class="btn btn-primary" href="?site=order_product">return</a>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-7ymO4nGrkm372HoSbq1OY2DP4pEZnMiA+E0F3zPr+JQQtQ82gQ1HPY3QIVtztVua" crossorigin="anonymous"></script>