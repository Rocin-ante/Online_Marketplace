<link rel="stylesheet" href="../ONLINE_MARKETPLACE/res/css/checkout.css">

<div class="container">
    <h1 class="mb-4">Shopping Cart</h1>
    
    <ul id="cart-items"></ul>
    
    <div class="mb-4" id="cart-total"></div>
    
    <div class="checkout-form-container" style="display: none;">
        <h2 class="mb-4">Checkout</h2>
        <form>
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
            <button onclick="confirmOrder()" class="btn btn-primary">Confirm Order</button>
        </form>
    </div>
    
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
    
    <a href="#" onclick="checkout()" class="checkout-button btn btn-primary">Checkout</a>
</div>

<script src="res/bootstrap/js/jquery-3.6.4.min.js"></script>
<script src="res/js/checkout.js" type="text/javascript"></script>

