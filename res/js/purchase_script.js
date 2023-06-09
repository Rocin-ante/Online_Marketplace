
$(document).ready(function() {
    // 给购买按钮添加点击事件
    $(document).on("click", ".btn-buy", function() {
      // 获取商品ID
      var productId = $(this).data("product-id");
  
      // 获取商品单价
      var unitPrice = $(this).data("product-price");
  
      // 获取用户email和id
      var username = $("#user-data").data("user-username");
      var userId = $("#user-data").data("user-id");
  
      // 判断用户名是否为空
      if (typeof userId === "undefined") {
        alert("You need to log in to make a purchase.");
        // 关闭购买模态框
        $("#purchaseModal").modal("hide");
      } else {
        console.log(username);
        console.log(userId);
        console.log(productId);
        console.log(unitPrice);
  
        // 显示购买模态框
        showModal(productId, unitPrice, username, userId);
      }
    });
}); 
  
function showModal(productId, unitPrice, username, userId) {
    // 创建购买模态框的 HTML 结构
    var modalHtml = `
        <div class="modal fade" id="purchaseModal" tabindex="-1" aria-labelledby="purchaseModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="purchaseModalLabel">Buy Products</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="quantityInput" class="form-label">Number of purchases: </label>
                            <input type="number" class="form-control" id="quantityInput" min="1" value="1">
                        </div>
                        <div class="mb-3">
                            <label for="addressInput" class="form-label">Address: </label>
                            <input type="text" class="form-control" id="addressInput">
                        </div>
                        <div class="mb-3">
                            <label for="paymentMethodSelect" class="form-label">Payment method: </label>
                            <select class="form-select" id="paymentMethodSelect">
                                <option value="1">PayPal</option>
                                <option value="2">Apple Pay</option>
                                <option value="3">UnionPay</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="buyProduct(${productId}, ${unitPrice}, ${userId})" id="purchaseBtn">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    `;
  
    // 将购买模态框添加到页面中
    $("body").append(modalHtml);
  
    // 设置模态框中的用户名
    $("#purchaseModalLabel").text("Purchase of goods - Users: " + username);
  
    // 显示购买模态框
    $("#purchaseModal").modal("show");
}
  
function buyProduct(productId, unitPrice, userId) {
    // 获取购买数量
    var quantity = parseInt($("#quantityInput").val());
  
    // 获取用户输入的地址
    var address = $("#addressInput").val().trim();
  
    // 获取选中的支付方式
    var paymentMethod = parseInt($("#paymentMethodSelect").val());
  
    var orderData = {
        user_id: userId,
        productId: productId,
        quantity: quantity,
        unitPrice: unitPrice,
        address: address,
        paymentMethod: paymentMethod
    };
    console.log(orderData);

    // 发起购买请求
    $.ajax({
        type: "POST",
        url: "../../../Online_Marketplace/backend/serviceHandler.php",
        data: { method: "orderProduct", param: orderData },
        dataType: "json",
        success: function(response) {
            // 处理购买成功的响应
            console.log(response);
            alert("Purchase Success !!!");
  
            // 关闭购买模态框
            $("#purchaseModal").modal("hide");
        },
        error: function(xhr, status, error) {
            // 处理购买请求错误
            console.log("AJAX error: " + status + " - " + error);
            console.error(error);
            alert("Purchase Failure !!!");
  
            // 关闭购买模态框
            $("#purchaseModal").modal("hide");
        }
    });
}
  