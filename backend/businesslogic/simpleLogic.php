<?php
include("./db/dataHandler.php");
class SimpleLogic {
    private $dh;
    function __construct()
    {
        $this->dh = new DataHandler();
    }
    function handleRequest($method, $param)
    {
        switch ($method) {
            case "queryStore":
                $res = $this->dh->queryStore();
                break;
            default:
                $res = null;
                break;
        }
        return $res;
    }
}