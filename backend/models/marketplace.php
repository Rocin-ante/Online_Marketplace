<?php
class store {
    public $store_id;
    public $store_name;
    public $store_logo;
    public $store_description;
    public $store_contact;

    function __construct($store_id, $store_name, $store_logo, $store_description, $store_contact)
    {
        $this->store_id = $store_id;
        $this->store_name = $store_name;
        $this->store_logo = $store_logo;
        $this->store_description = $store_description;
        $this->store_contact = $store_contact;
    }
}

class product {
    public $product_id;
    public $product_name;
    public $product_description;
    public $product_image;
    public $product_price;
    public $category_id;

    function __construct($product_id, $product_name, $product_description, $product_image, $product_price, $category_id)
    {
        $this->product_id = $product_id;
        $this->product_name = $product_name;
        $this->product_description = $product_description;
        $this->product_image = $product_image;
        $this->product_price = $product_price;
        $this->category_id = $category_id;
    }
}