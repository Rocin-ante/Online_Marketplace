<link rel="stylesheet" href="../ONLINE_MARKETPLACE/res/css/order_product.css">
<!-- 订单详情视图 -->
<div id="order-details" class="hidden">
  <h2>Order details</h2>
  <div class="order-details-header">
    <div class="order-details-header-item">
      <p>Order Number:</p>
      <p id="order-details-id"></p>
    </div>
    <div class="order-details-header-item">
      <p>Order Status:</p>
      <p id="order-details-status"></p>
    </div>
    <div class="order-details-header-item">
      <p>Order Details:</p>
      <p id="order-details-date"></p>
    </div>
  </div>
  <table>
    <thead>
      <tr>
        <th>Trade name</th>
        <th>Number</th>
        <th>Unit price</th>
        <th>Total price</th>
      </tr>
    </thead>
    <tbody id="order-details-items"></tbody>
  </table>
</div>