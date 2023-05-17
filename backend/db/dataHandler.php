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
            if ($val->name == $name) {
                array_push($result, $val);
            }
        }
        return $result;
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
}