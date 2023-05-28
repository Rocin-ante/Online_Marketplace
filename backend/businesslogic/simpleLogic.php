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
            case "queryProductbyName":
                $res = $this->dh->queryProductbyName($param);
                break;
            case "queryProduct":
                $res = $this->dh->queryProduct($param);
                break;
            default:
                $res = null;
                break;
        }
        return $res;
    }
}