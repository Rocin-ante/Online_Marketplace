<?php
include("./models/marketplace.php");
class DataHandler {
    public function queryStore() {
        $res = $this->getStore();
        return $res;
    }
    public static function getStore() {
        include_once "../../Online_Marketplace/config/dbaccess.php";
        $query = "SELECT * FROM store";
        $result = mysqli_query($conn, $query);
        $store = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $res = new Store($row['store_id'], $row['store_name'], $row['store_logo'], $row['store_description'], $row['store_contact']);
            array_push($store, $res);
        }
        mysqli_close($conn);
        $storeDate = $store; //json_encode($store);
        return $storeDate;
    }
}