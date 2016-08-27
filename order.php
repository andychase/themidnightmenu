<?php
require_once "content.php";
require_once "header.php";
require_once "email.php";


include_once "libs/markdown.php";
include_once "libs/smartypants.php";
echo Smartypants(Markdown($orderpage));

require_once "footer.php";



$name     = $_POST['name'];
$location = $_POST['location'];
$order    = $_POST['order'];
$total    = $_POST['total'];
$id       = $_POST['orderid'];

$date = new DateTime();
$date = $date->format("D g:ia");

if(trim($name) != "" && trim($order) != "") {
    $body = "Name: " . $name . "\n" .
    "Location: " . $location . "\n" .
    "Date: " . $date . "\n" .
    "Order: " . $order .
    "Total: " . $total;
    
    $subject = 'Website submission data: ' . $id;
    
    sendemail($body, $subject);
}
?>
