<?php
class store {
    public $id;
    public $name;
    public $logo;
    public $description;
    public $contact;

    function __construct($store_id, $store_name, $store_logo, $store_description, $store_contact)
    {
        $this->id = $store_id;
        $this->name = $store_name;
        $this->logo = $store_logo;
        $this->description = $store_description;
        $this->contact = $store_contact;
    }
}