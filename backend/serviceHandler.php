<?php
include("businesslogic/simpleLogic.php");

$param = "";
$method = "";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    isset($_GET["method"]) ? $method = $_GET["method"] : false;
    isset($_GET["param"]) ? $param = $_GET["param"] : false;
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    isset($_POST["method"]) ? $method = $_POST["method"] : false;
    isset($_POST["param"]) ? $param = $_POST["param"] : false;
} else {
    // 不支持的请求方法
    response("UNKNOWN", 405, "Method not supported yet!");
    exit();
}

$logic = new SimpleLogic();
$result = $logic->handleRequest($method, $param);
if ($result === null) {
    $result = []; // 返回空数组作为结果
}
response($_SERVER['REQUEST_METHOD'], 200, $result);

function response($method, $httpStatus, $data)
{
    header('Content-Type: application/json');
    switch ($method) {
        case "GET":
        case "POST":
            http_response_code($httpStatus);
            echo (json_encode($data));
            break;
        default:
            http_response_code(405);
            echo ("Method not supported yet!");
    }
}
