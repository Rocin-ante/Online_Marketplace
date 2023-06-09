<link rel="stylesheet" href="../ONLINE_MARKETPLACE/res/css/order_product.css">

<style>
  .jumbotron {
    background-color: #f8f9fa; /* Set the desired background color */
    margin-top: 20px; /* Add margin to the top */
    margin-bottom: 20px; /* Add margin to the bottom */
  }
</style>

<div class="jumbotron bg-light rounded">
  <h1 class="display-4">My Orders</h1>
  <p class="lead">This is your order list.</p>
  <hr class="my-4">
  
  <table class="table table-hover table-striped">
    <thead class="thead-dark">
      <tr>
        <!-- <th scope="col">#</th> -->
        <th scope="col">order</th>
        <th scope="col">order date</th>
        <th scope="col">address</th>
        <th scope="col">pay method</th>
        <th scope="col">order details</th>
      </tr>
    </thead>
    <tbody>
       <?php
          // Connect to the database
          include_once 'config/dbaccess.php';
          $sql = "SELECT * FROM `order` where `user_id` = '".$_SESSION["userID"]."' ORDER BY `order_id` DESC";
          $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_array($result)) 
          {
              $total_price = $row["quantity"] * $row["unit_price"];
        ?>
        <tr>
            <!-- <th scope="row">1</th> -->
            <td><?php echo $row['order_id'];?></td>
            <td><?php echo date('Y-m-d H:i:s', $row['order_date']);?></td>
            <td><?php echo $row['shipping_address'];?></td>
            <td><?php
                    switch ($row['payment_method'])
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
            </td>
            <td>
              <a href="?site=order_details&id=<?php echo $row['order_id'];?>" class="btn btn-success">show</a>
            </td>
        </tr>
            <?php           
        }   
      ?>   
    </tbody>
  </table>
</div>

<script src="res/bootstrap/js/jquery-3.6.4.min.js"></script>
