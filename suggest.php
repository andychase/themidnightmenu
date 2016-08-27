<?php
require_once "content.php";
require_once "header.php";
require_once "email.php";

include_once "libs/markdown.php";
include_once "libs/smartypants.php";
echo Smartypants(Markdown($suggestpage));


$name     = $_POST['name'];
$suggestion = $_POST['suggestion'];
$date = new DateTime();
$date = $date->format("D g:ia");

if(trim($name) != "" && trim($suggestion) != "") {
    echo "FEED BACK SUBMITTED";

    $body = "Name: " . $name . "\n" .
    "Date: " . $date . "\n" .
    "Suggestion: " . $suggestion;
    
    $subject = 'Website suggestion form';
    sendemail($body, $subject);
    
}

require_once "footer.php";
?>
