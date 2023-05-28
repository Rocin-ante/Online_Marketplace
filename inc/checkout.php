<link rel="stylesheet" href="../ONLINE_MARKETPLACE/res/css/checkout.css">

<div class="container">
    <h1>Shopping Cart</h1>
    
    <ul id="cart-items"></ul>
    
    <div id="cart-total"></div>
    
    <div id="checkout-form" style="display: none;">
      <h2>Checkout</h2>
      <form>
          <label for="name">Name:</label>
  <input type="text" id="name" required><br>
  <label for="lastname">Last name:</label>
  <input type="text" id="lastname" required><br>
  <label for="address">Address:</label>
  <input type="text" id="address" required><br>
  <label for="addaddress">Additional adress:</label>
  <input type="text" id="addaddress" required><br>
  <label for="phone">Phone:</label>
  <input type="tel" id="phone" required><br>
  <button onclick="confirmOrder()">Confirm Order</button>
      </form>
    </div>
       <h2>You may also like</h2>
    <ul id="product-list">
      <li>
        <span>Dinosaurier-Spielzeug</span>
        <span>$6</span>
        <button class="add-to-cart-btn">Add to Cart</button>
      </li>
      <li>
        <span>Bagger Spielzeug</span>
        <span>$7</span>
        <button class="add-to-cart-btn">Add to Cart</button>
      </li>
      <li>
        <span>kleines Zugspielzeug</span>
        <span>$6</span>
        <button class="add-to-cart-btn">Add to Cart</button>
      </li>
    </ul>
    <a href="#" onclick="checkout()" class="checkout-button">Checkout</a>
</div>

<div id="checkout-form" style="display: none;">
  <h2>Checkout</h2>
</div>

<script src="res/bootstrap/js/jquery-3.6.4.min.js"></script>
<script src="res/js/checkout.js" type="text/javascript"></script>  
