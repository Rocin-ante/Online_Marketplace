<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="nav-link <?= ($site == "home") ? "active" : "" ?>" aria-current="page" href=".">
        <img src="../Online_Marketplace/res/img/logo.png" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link fw-bold <?= ($site == "home") ? "active" : "" ?>" href="?site=home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bold <?= ($site == "product") ? "active" : "" ?>" href="?site=product">Product</a>
            </li>
            <li class="nav-item">
                <?php
                    if (isset($_SESSION['username']) && $_SESSION['username'] <> '') {
                    //通过判断用户是否登录来显示不同的选项 
                    //Anzeige verschiedener Optionen, je nachdem, ob der Benutzer angemeldet ist oder nicht
                ?>
                    <a class="nav-link fw-bold <?= ($site == "usermodify") ? "active" : "" ?>" href="?site=usermodify">|<?php echo $_SESSION['username'];?>|</a>
                <?php
                    }
                ?>
                <?php
                    if (!isset($_SESSION['username'])) {
                ?>
                    <a class="nav-link fw-bold <?= ($site == "account") ? "active" : "" ?>" href="?site=account">Register</a>
                <?php
                    }
                ?>
            </li>
            <li>
                <?php
                    if (isset($_SESSION['username']) && $_SESSION['username'] <> '') {
                ?>
                    <a class="nav-link fw-bold" href="ins/logout.php">Logout</a>
                <?php
                    }
                ?>
                <?php
                    if (!isset($_SESSION['username'])) {
                ?>
                    <a class="nav-link fw-bold <?= ($site == "login") ? "active" : "" ?>" href="?site=login">Login</a>
                <?php
                    }
                ?>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    More
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item <?= ($site == "order_product") ? "active" : "" ?>" href="?site=order_product">Order Product</a></li>
                    <li><a class="dropdown-item <?= ($site == "checkout") ? "active" : "" ?>" href="?site=checkout">Checkout</a></li>
                    <li><a class="dropdown-item <?= ($site == "product_upload") ? "active" : "" ?>" href="?site=product_upload">Product Upload</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bold <?= ($site == "Impressum") ? "active" : "" ?>" href="?site=Impressum">Impressum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bold <?= ($site == "Anzeige") ? "active" : "" ?>" href="?site=Anzeige">Help</a>
            </li>
        </ul>
        <form id="search-form" class="d-flex" role="search">
            <input id="search-input" class="form-control me-2" type="search" placeholder="Search Product" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
  </div>
</nav>

<script src="res/bootstrap/js/jquery-3.6.4.min.js"></script>
<script>
    $("#search-form").submit(function(event) {
        event.preventDefault();

        var keyword = $("#search-input").val();

        // 构建目标页面URL
        var targetUrl = "index.php?site=search&keyword=" + encodeURIComponent(keyword);

        // 页面跳转
        window.location.href = targetUrl;
    });

    $("#search-form button").click(function() {
        $("#search-form").submit();
    });
</script>