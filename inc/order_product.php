<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<link rel="stylesheet" href="../ONLINE_MARKETPLACE/res/css/order_product.css">

<html>
  <head>
    <meta charset="UTF-8">
    <title>My Orders</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="jumbotron">
      <h1 class="display-4">My Orders</h1>
      <p class="lead">This is your order list.</p>
      <hr class="my-4">
      
      <table class="table  table-hover">
        <thead class="thead-dark">
          <tr>
            <!-- <th scope="col">#</th> -->
            <th scope="col">order</th>
            <th scope="col">order_date</th>
            <th scope="col">address</th>
            <th scope="col">pay_method</th>
            <th scope="col">operate</th>
          </tr>
        </thead>
        <tbody>
           <?php
              // 连接到数据库  mit Datenbank verbinden
              include_once 'config/dbaccess.php';
              $sql = "SELECT * FROM `order` where `user_id` = 1 ORDER BY `order_id` DESC";
              $result = mysqli_query($conn, $sql);

              while ($row = mysqli_fetch_array($result)) 
              {
                  $total_price = $row["quantity"] * $row["unit_price"];
            ?>
            <tr>
                <!-- <th scope="row">1</th> -->
                <td><?php echo $row['order_id'];?></td>
                <td><?php echo $row['order_date'];?></td>
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
                  <a href="?site=order_details&id=<?echo $row['order_id'];?>" class="btn btn-success">show</a>
                </td>
            </tr>
                <?php           
            }   
          ?>   
        </tbody>
      </table>
    </div>
    
   </body> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-7ymO4nGrkm372HoSbq1OY2DP4pEZnMiA+E0F3zPr+JQQtQ82gQ1HPY3QIVtztVua" crossorigin="anonymous"></script>
