<?php
require "connection.php";

$aemail =$_POST["ae"];
$anp =$_POST["an"];
$arnp =$_POST["ar"];
$avcode =$_POST["av"];

if(empty($aemail)){
    echo("Missing Email address");
}else if(empty($anp)){
    echo("Please type a new Password");
}else if(strlen($anp) < 5 || strlen($anp) > 20){
    echo("Invalid New Password");
}else if(empty($arnp)){
    echo("Please Retype your password");
}else if($anp!=$arnp){
    echo("Password dose not matched");
}else if(empty($avcode)){
    echo("Please enter your Varification Code");
}else{

    $rs =  Database :: search("SELECT *FROM `academic_officers` WHERE `email` = '".$aemail."' AND `verification_code` = '".$avcode."'");

    $n = $rs -> num_rows;

    if($n == 1){
        Database :: iud("UPDATE `academic_officers` SET `password` = '".$anp."' WHERE `email` = '".$aemail."'");
        echo("success");
    }else{
        echo("Invalid Email or Verification Code");
    }

}
?>