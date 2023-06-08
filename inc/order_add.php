<?
session_start();
	include_once 'config/dbaccess.php';

	$user_id = 1;//传session里的ID
	$order_date = date('Y-m-d H:i:s',time());//订单时间
	$address = $_POST['address'];//地址
	$pay = $_POST['pay'];
	$status = $_POST['status'];

    $sql = "INSERT INTO `order` (user_id, order_date, shipping_address,payment_method,order_status)
		VALUES ($user_id,'$order_date', $address,$pay,$status)";
		// var_dump($sql);
	$result = mysqli_query($conn, $sql);
	$newID = mysqli_insert_id($conn);

	$arr = $_POST['data'];//获取商品数据
	// $arr = [
	// 	['quantity'=>1,'product_id'=>3,'unit_price'=>2],
	// 	['quantity'=>3,'product_id'=>6,'unit_price'=>4]
	// ];


	$sql = sprintf("INSERT INTO `order_product` (order_id,product_id,quantity,unit_price) VALUES ");

 

	foreach($arr as $item) {

	$itemStr = '( ';

	$itemStr .= ($newID.','. $item['product_id'].','. $item['quantity'].','. $item['unit_price']);

	$itemStr .= '),';

	$sql .= $itemStr;

	}

	 

	// 去除最后一个逗号，并且加上结束分号

	$sql = rtrim($sql, ',');

	$sql .= ';';
	 if ($conn->query($sql) === TRUE) {
	 	//添加成功，写逻辑
	 	
	} else {

	echo "Error: " . $sql . "<br>" . $conn->error;

	}

