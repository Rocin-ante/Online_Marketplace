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
                <a class="nav-link fw-bold text-primary <?= ($site == "home") ? "active" : "" ?>" href="?site=home">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link fw-bold <?= ($site == "product") ? "active" : "" ?>" href="?site=product">Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bold" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bold <?= ($site == "login") ? "active" : "" ?>" href="?site=login">Login</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    More
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item <?= ($site == "order_product") ? "active" : "" ?>" href="?site=order_product">Order Product</a></li>
                    <li><a class="dropdown-item <?= ($site == "checkout") ? "active" : "" ?>" href="?site=checkout">Checkout</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled fw-bold">Disabled</a>
            </li>
        </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search Product" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
  </div>
</nav>

<script src="res/js/search_script.js" type="text/javascript"></script>  