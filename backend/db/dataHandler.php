<?php
include("./models/marketplace.php");
class DataHandler {
    public function queryStore() {
        $res = $this->getStore();
        return $res;
    }

    public function queryProductbyName($name) {
        $result = array();
        $res = $this->getProductbyName();
        foreach ($res as $val) {
            if ($val->product_name == $name) {
                $result[] = $val;
            }
        }
        if (empty($result)) {
            // 返回空数组作为结果
            return null; // 或者返回其他自定义的标识，比如 "NoData" 等
        } else {
            return $result;
        }
    }  

    public function queryProduct($category) {
        $result = array();
        $res = $this->getProduct();
        foreach ($res as $val) {
            if ($category == 0) {
                array_push($result, $val);
            }
            else {
                if ($val->category_id == $category) {
                    array_push($result, $val);
                }
            }
        }
        return $result;
    }

    public function orderProduct($orderData) {
        include_once "../../Online_Marketplace/config/dbaccess.php";
    
        $userId = $orderData['user_id'];
        $productId = $orderData['productId'];
        $quantity = $orderData['quantity'];
        $unitPrice = $orderData['unitPrice'];
        $date = $orderData['date'];
        $address = $orderData['address'];
        $paymentMethod = $orderData['paymentMethod'];
    
        $query = "INSERT INTO `order` (`user_id`, `product_id`, `quantity`, `unit_price`, `order_date`, `shipping_address`, `payment_method`)
                  VALUES ('$userId', '$productId', '$quantity', '$unitPrice', '$date', '$address', '$paymentMethod')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $response = array('status' => 'success', 'message' => 'Order creation successful');
        } else {
            $response = array('status' => 'error', 'message' => 'Order creation failed: ' . mysqli_error($conn));
        }
    
        mysqli_close($conn);
        return json_encode($response);
    }    

    public static function getStore() {
        include_once "../../Online_Marketplace/config/dbaccess.php";
        $query = "SELECT * FROM store";
        $result = mysqli_query($conn, $query);
        $store = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $res = new Store($row['store_id'], $row['store_name'], $row['store_logo'], 
                            $row['store_description'], $row['store_contact']);
            array_push($store, $res);
        }
        mysqli_close($conn);
        $storeDate = $store; //json_encode($store);
        return $storeDate;
    }

    public static function getProductbyName() {
        include_once "../../Online_Marketplace/config/dbaccess.php";
        $query = "SELECT * FROM product";
        $result = mysqli_query($conn, $query);
        $products = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $product = new product($row['product_id'], $row['product_name'], $row['product_description'], 
                                $row['product_image'], $row['product_price'], $row['category_id']);
            array_push($products, $product);
        }
        mysqli_close($conn);
        return $products;
    }

    public static function getProduct() {
        include_once "../../Online_Marketplace/config/dbaccess.php";
        $query = "SELECT * FROM product";
        $result = mysqli_query($conn, $query);
        $products = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $product = new product($row['product_id'], $row['product_name'], $row['product_description'], 
                                $row['product_image'], $row['product_price'], $row['category_id']);
            array_push($products, $product);
        }
        mysqli_close($conn);
        return $products;
    }
}