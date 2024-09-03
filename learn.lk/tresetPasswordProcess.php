<?php
require "connection.php";

$temail =$_POST["te"];
$tnp =$_POST["tn"];
$trnp =$_POST["tr"];
$tvcode =$_POST["tv"];

if(empty($temail)){
    echo("Missing Email address");
}else if(empty($tnp)){
    echo("Please type a new Password");
}else if(strlen($tnp) < 5 || strlen($tnp) > 20){
    echo("Invalid New Password");
}else if(empty($trnp)){
    echo("Please Retype your password");
}else if($tnp!=$trnp){
    echo("Password dose not matched");
}else if(empty($tvcode)){
    echo("Please enter your Varification Code");
}else{

    $rs =  Database :: search("SELECT *FROM `teachers` WHERE `email` = '".$temail."' AND `verification_code` = '".$tvcode."'");

    $n = $rs -> num_rows;

    if($n == 1){
        Database :: iud("UPDATE `teachers` SET `password` = '".$tnp."' WHERE `email` = '".$temail."'");
        echo("success");
    }else{
        echo("Invalid Email or Verification Code");
    }

}
?>