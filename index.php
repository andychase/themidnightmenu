<?php
require_once "content.php";
require_once "header.php";
?>

<form action="./order.php" method="post">
<?php
$orderid = uniqid();
include_once "libs/markdown.php";
include_once "libs/smartypants.php";
echo Smartypants(Markdown($homepage));

?>
</form>
<?php
require "footer.php";
?>
