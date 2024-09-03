<?php

require "connection.php";

$san=$_POST["san"];
$ase=$_POST["ase"];
$sm=$_POST["sm"];



 Database::iud("UPDATE `assignment` SET `marks`='".$sm."' WHERE `email`='" . $ase. "' AND `name`='" . $san . "'" );

// Database::iud("INSERT INTO `assignment` (`marks`) VALUES ('".$sm."') WHERE `email`='" . $ase. "' AND `name`='" . $san . "' ");

echo("success");

?>