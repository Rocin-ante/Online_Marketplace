$(document).ready(function() {
    loadProducts();
    loaddata();
});

function loadProducts() {
    $.ajax({
        type: "GET",
        url: "../../../Online_Marketplace/backend/serviceHandler.php",
        cache: false,
        data: { method: "queryProduct", param: 0 },
        dataType: "json",
        success: function(response) {
        // Clear the existing product list
        $("#product-list").empty();

            // Generate the product cards dynamically
            for (var i = 0; i < 3; i++) {
                var product = response[i];
                var productHtml = `
                    <div class="col-12 col-md-4">
                        <div class="card mb-4 shadow rounded">
                            <img src="${product.product_image}" class="card-img-top img-fluid" alt="${product.product_name}">
                            <div class="card-body">
                                <h5 class="card-title text-center"><b>${product.product_name}</b></h5>
                            </div>
                        </div>
                    </div>
                `;
                $("#product-list").append(productHtml);
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

function loaddata() {
    $.ajax({
        type: "GET",
        url: "../../../Online_Marketplace/backend/serviceHandler.php?method=queryStore",
        cache: false,
        dataType: "json",
        success: function (response) {
            console.log(response);
            var storeDescription = response[0].store_description;
            console.log(storeDescription);
            var storeContact = response[0].store_contact;
            var storeInfoBox = $('#storeInfoBox');
            storeInfoBox.html('<p>' + storeDescription + '</p><p style="color: orange;">Contact: ' + storeContact + '</p>');
        },
        error: function(xhr, status, error) {
            console.log("AJAX error: " + status + " - " + error);
        }
    })
}

