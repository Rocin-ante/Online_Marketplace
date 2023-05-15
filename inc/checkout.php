<!DOCTYPE html>
<html>
<head>
  <title>Shopping Cart</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;
    }
    
    .container {
      max-width: 960px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
    }
    
    h1 {
      text-align: center;
      margin-top: 0;
      padding-bottom: 20px;
      border-bottom: 1px solid #ccc;
    }
    
    #product-list {
      list-style-type: none;
      padding: 0;
    }
    
    li {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
      padding: 10px;
      background-color: #f9f9f9;
      border-radius: 5px;
    }
    
    li span {
      flex-grow: 1;
    }
    
    .add-to-cart-btn {
      padding: 5px 10px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
    
    .add-to-cart-btn:hover {
      background-color: #45a049;
    }
    
    #cart-items {
      margin-top: 20px;
      list-style-type: none;
      padding: 0;
    }
    
    .cart-item {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
      padding: 10px;
      background-color: #f9f9f9;
      border-radius: 5px;
    }
    
    .cart-item img {
      width: 80px;
      margin-right: 10px;
    }
    
    .cart-item-name {
      font-weight: bold;
    }
    
    .cart-item-price {
      margin-left: auto;
    }
    
    #cart-total {
      margin-top: 20px;
      font-weight: bold;
      text-align: right;
    }
    
    .checkout-button {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: #fff;
      text-align: center;
      text-decoration: none;
      font-weight: bold;
      border-radius: 3px;
      transition: background-color 0.3s;
    }
    
    .checkout-button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
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

  <script src="checkout.js"></script>
</body>
</html>

<div id="checkout-form" style="display: none;">
  <h2>Checkout</h2>

</div>

</html>

