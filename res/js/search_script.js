$(document).ready(function() {
    // 获取URL参数中的keyword
    var urlParams = new URLSearchParams(window.location.search);
    var keyword = urlParams.get('keyword');

    // 发起Ajax请求
    $.ajax({
        type: "GET",
        url: "../../../Online_Marketplace/backend/serviceHandler.php",
        cache: false,
        data: { method: "queryProductbyName", param: keyword },
        dataType: "json",
        success: function(response) {
            // 清空搜索结果容器
            $("#product-list").empty();

            console.log(response);

            // 判断搜索结果是否为空
            if (response.length === 0) {
                var noResultsHtml = `
                  <div class="d-flex flex-column justify-content-center align-items-center vh-100">
                    <div class="alert alert-warning text-center" role="alert">
                      <h2>OOPS</h2>
                      <p>Sorry, no results were found for the keyword: <strong>${keyword}</strong></p>
                      <p>Please try searching with a different keyword.</p>
                    </div>
                  </div>
                `;
                $("#product-list").append(noResultsHtml);
            } else {
                // 循环遍历搜索结果，并将其添加到页面中
                for (var i = 0; i < response.length; i++) {
                    var product = response[i];
                    var productHtml = `
                        <div class="card mb-3 product-card">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="${product.product_image}" alt="${product.product_name}" class="img-fluid product-image">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h3 class="card-title">${product.product_name}</h3>
                                        <p class="card-text">${product.product_description}</p>
                                        <p class="card-text">
                                            Price: <span class="product-price">$${product.product_price}</span>
                                        </p>
                                        <button class="btn btn-primary btn-buy" data-product-id="${product.product_id}" data-product-price="${product.product_price}">Buy Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    $("#product-list").append(productHtml);
                }
            }
        },
        error: function(xhr, status, error) {
            console.log("AJAX error: " + status + " - " + error);
        }
    });
});
