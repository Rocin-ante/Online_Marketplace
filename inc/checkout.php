<link rel="stylesheet" href="../ONLINE_MARKETPLACE/res/css/checkout.css">

<div class="container" id="container">
    <h1 class="mb-4">Shopping Cart</h1>
    
    <ul id="cart-items"></ul>
    
    <div class="mb-4" id="cart-total"></div>
    
    
    <h2 class="mb-4">You may also like</h2>
    <ul id="product-list" class="mb-4">
        <li>
            <span>Dinosaurier-Spielzeug</span>
            <span>$6</span>
            <button class="add-to-cart-btn btn btn-primary">Add to Cart</button>
        </li>
        <li>
            <span>Bagger Spielzeug</span>
            <span>$7</span>
            <button class="add-to-cart-btn btn btn-primary">Add to Cart</button>
        </li>
        <li>
            <span>kleines Zugspielzeug</span>
            <span>$6</span>
            <button class="add-to-cart-btn btn btn-primary">Add to Cart</button>
        </li>
    </ul>
    <button class="checkout-button btn btn-primary" onclick="checkout()">Checkout</button>
</div>

 <div id="cf" style="display: none;">
        <h2 class="mb-4">Checkout</h2>
        <form action="checkout.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last name:</label>
                <input type="text" id="lastname" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" id="address" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="addaddress" class="form-label">Additional address:</label>
                <input type="text" id="addaddress" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone:</label>
                <input type="tel" id="phone" class="form-control" required>
            </div>
            <button onclick="reviewOrder()" class="btn btn-primary">Review Order</button>
        </form>
</div>


<div id="review" style="display: none;">
    <h2 class="mb-4">Order Review</h2>
    <p><strong>Name:</strong> <span id="review-name"></span></p>
    <p><strong>Last Name:</strong> <span id="review-lastname"></span></p>
    <p><strong>Address:</strong> <span id="review-address"></span></p>
    <p><strong>Additional Address:</strong> <span id="review-addaddress"></span></p>
    <p><strong>Phone:</strong> <span id="review-phone"></span></p>
    <h3>Order:</h3>
    <ul id="review-order-items"></ul>
    <p id="review-order-total"></p>
    <form action="checkout.php" method="POST">
        <button onclick="confirmOrder()" class="btn btn-primary">Confirm Order</button>
        <button onclick="editAddress()" class="btn btn-primary">Edit Address</button>
    </form>
</div>

<script src="res/bootstrap/js/jquery-3.6.4.min.js"></script>
<script src="res/js/checkout.js" type="text/javascript"></script>

