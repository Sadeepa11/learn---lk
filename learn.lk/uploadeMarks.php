<?php

require "connection.php";

$an=$_POST["an"];
$as=$_POST["as"];
$te=$_POST["te"];
$se=$_POST["se"];
$m=$_POST["m"];



Database::iud("INSERT INTO `marks` (`name`,`subject`,`temail`,`email`,`marks`) VALUES ('".$an."','".$as."','".$te."','".$se."','".$m."')");



echo("Success");

?>
