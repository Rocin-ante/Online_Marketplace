$("#category-select").change(function() {
    // 获取选中的分类
    var category = $(this).val();

    // 发起Ajax请求
    $.ajax({
        url: "/api/products", // 替换为实际的后端API地址
        method: "GET",
        data: { category: category }, // 将选中的分类作为请求参数传递给后端
        success: function(response) {
            // 处理成功响应

            // 清空之前的商品列表
            $("#product-list").empty();

            // 循环遍历商品列表，并将其添加到页面中
            for (var i = 0; i < response.length; i++) {
                var product = response[i];
                var productHtml = "<div>" +
                    "<h3>" + product.name + "</h3>" +
                    "<p>Category: " + product.category + "</p>" +
                    "<p>Price: $" + product.price + "</p>" +
                    "</div>";
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