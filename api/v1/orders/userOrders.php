<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
//getting the database connection
include_once '../config/config.php';
include_once '../Functions/Order.php';

$database = new Database();
$db = $database->getConnString();

 
$order = new Order($db);


// $order->order_id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';



$result = $order->readUserOrders();



if($result){    
    http_response_code(200);     
    echo json_encode($result);
}else{     
    http_response_code(404);     
    echo json_encode(
        array("message" => "No item found.")
    );
} 
?>

