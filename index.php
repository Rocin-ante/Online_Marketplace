<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.cn/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.cn/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="res/bootstrap/css/bootstrap.min.css">
    <title>Online Marketplace</title>
</head>
<body>
    <?php
        // fetch current "site" (or set to "home" if not defined)        
        $site = $_GET["site"] ?? "home";

        // for security reasone:  check if $site is in a list of available sites
        $sites = [ "home", "link", "impressum", "login", "order_product", "product", "Anzeige", "account", "Impressum", "order_details", "checkout","product_upload"];
        if (!in_array($site, $sites)) {
            $error = "Seite nicht gefunden - " . $site;
            $site = "error";     
        }
    ?>
    
    <?php
        // render nav bar
        include_once "inc/navigation.php";
    ?>

    <div class="container-fluid">
    <?php

        // render site here ...
        include_once "inc/" . $site . ".php";
    ?>
    </div>

    <?php
        include_once "inc/footer.php";
    ?>

    <script src="res/bootstrap/js/jquery-3.6.4.min.js"></script>
    <script src="res/bootstrap/js/bootstrap.bundle.min.js"></script>  
</body>
</html>