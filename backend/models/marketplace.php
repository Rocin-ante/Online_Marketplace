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