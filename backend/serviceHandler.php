<?php
include("businesslogic/simpleLogic.php");

$param = "";
$method = "";

isset($_GET["method"]) ? $method = $_GET["method"] : false;
isset($_GET["param"]) ? $param = $_GET["param"] : false;

$logic = new SimpleLogic();
$result = $logic->handleRequest($method, $param);
if ($result === null) {
    $result = []; // 返回空数组作为结果
}
response("GET", 200, $result);

function response($method, $httpStatus, $data)
{
    header('Content-Type: application/json');
    switch ($method) {
        case "GET":
            http_response_code($httpStatus);
            echo (json_encode($data));
            break;
        default:
            http_response_code(405);
            echo ("Method not supported yet!");
    }
}

