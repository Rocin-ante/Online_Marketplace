var cartItems = [];
var cartTotal = 0;

function addToCart(productName, price) {
    var existingItem = cartItems.find(function (item) {
        return item.name === productName;
    });

    if (existingItem) {
        existingItem.quantity++;
        existingItem.subtotal = existingItem.quantity * existingItem.price;
    } else {
        var item = {
            name: productName,
            price: price,
            quantity: 1,
            subtotal: price
        };
        cartItems.push(item);
    }

    cartTotal += price;

    updateCart();
}

function removeFromCart(index) {
    if (cartItems[index]) {
        cartItems[index].quantity--;


        if (cartItems[index].quantity === 0) {
            cartItems.splice(index, 1);
        }
    }

    updateCart();
}

function addCart(index) {
    if (cartItems[index]) {
        cartItems[index].quantity++;


        if (cartItems[index].quantity === 0) {
            cartItems.splice(index, 1);
        }
    }

    updateCart();
}

function updateCart() {
    var cartItemsElement = document.getElementById("cart-items");
    var cartTotalElement = document.getElementById("cart-total");

    cartItemsElement.innerHTML = "";

    var total = 0;

    for (var i = 0; i < cartItems.length; i++) {
        var item = cartItems[i];

        var listItem = document.createElement("li");
        listItem.innerHTML = `
      <span class="cart-item-name">${item.name}</span>
      <span class="cart-item-price">$${item.price.toFixed(2)}</span>
      <button onclick="removeFromCart(${i})" class="remove-button">-</button>
      <span class="cart-item-quantity">${item.quantity}</span>
      <button onclick="addCart(${i})" class="remove-button">+</button>
    `;

        cartItemsElement.appendChild(listItem);

        total += item.price * item.quantity;
    }

    cartTotalElement.textContent = "Total: $" + total.toFixed(2);
}

function checkout() {
    console.log('Checkout button clicked');

    var container = document.getElementById("container");
    container.style.display = 'none';

    var checkoutForm = document.getElementById("cf");
    checkoutForm.style.display = 'block';
}

function reviewOrder() {
    // Get the form values
    var name = document.getElementById("name").value;
    var lastname = document.getElementById("lastname").value;
    var address = document.getElementById("address").value;
    var addaddress = document.getElementById("addaddress").value;
    var phone = document.getElementById("phone").value;

    // Display the review information
    document.getElementById("review-name").textContent = name;
    document.getElementById("review-lastname").textContent = lastname;
    document.getElementById("review-address").textContent = address;
    document.getElementById("review-addaddress").textContent = addaddress;
    document.getElementById("review-phone").textContent = phone;

    // Hide the checkout form and display the review section
    document.getElementById("cf").style.display = "none";
    document.getElementById("review").style.display = "block";
}

// Function to edit the address
function editAddress() {
    // Hide the review section and display the checkout form
    document.getElementById("review").style.display = "none";
    document.getElementById("cf").style.display = "block";
}

// Function to confirm the order
function confirmOrder() {
    // You can add your code to submit the order or perform further actions here
    alert("Order confirmed! Thank you for your purchase.");
}

var addToCartButtons = document.getElementsByClassName('add-to-cart-btn');

for (var i = 0; i < addToCartButtons.length; i++) {
    addToCartButtons[i].addEventListener('click', addToCartHandler);
}

function addToCartHandler(event) {
    var productName = event.target.parentNode.children[0].textContent;
    var price = parseFloat(event.target.parentNode.children[1].textContent.slice(1));

    addToCart(productName, price);
}

function confirmOrder() {
    var name = document.getElementById('name').value;
    var lastname = document.getElementById('lastname').value;
    var address = document.getElementById('address').value;
    var addaddress = document.getElementById('addaddress').value;
    var phone = document.getElementById('phone').value;

    console.log('Name:', name);
    console.log('Address:', address);
    console.log('Phone:', phone);


    cartItems = [];
    cartTotal = 0;
    updateCart();

    alert('Order');
}
