$("#category-select").change(function() {
    // 获取选中的分类
    var category = $(this).val();
    console.log(category);

    // 发起Ajax请求
    $.ajax({
        type: "GET",
        url: "../../../Online_Marketplace/backend/serviceHandler.php",
        cache: false,
        data: { method: "queryProduct", param: category }, // 将选中的分类作为请求参数传递给后端
        dataType: "json",
        success: function(response) {
            // 处理成功响应
            console.log(response);

            // 清空之前的商品列表
            $("#product-list").empty();

            // 循环遍历商品列表，并将其添加到页面中
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
                                
        },
        error: function(xhr, status, error) {
            // 处理请求错误
            console.error(error);
        }
    });
});

// 初始化页面时触发一次请求，显示所有商品
$("#category-select").trigger("change");
