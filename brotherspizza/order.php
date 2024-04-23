<?php
session_start();
require('dbConnection.php');

$connresult = db_connect();
$cart = json_decode($_POST['cart']);
$query = "";

foreach($cart as $item) {
    $orderId = uniqid();
    $query = "insert into orders values('".$orderId."', '".$_SESSION['uid']."', '".$item->id."', '".$item->type."', '".$item->qty."', 'not delivered')";
    $connresult->query($query);
}
?>