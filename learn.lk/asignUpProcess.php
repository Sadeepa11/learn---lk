<?php

require "connection.php";

$afname = $_POST["af"];
$alname = $_POST["al"];
$aemail = $_POST["ae"];
$apassword = $_POST["ap"];




if(empty($afname)){
    echo ("Please enter your First Name !!!");
}else if(strlen($afname) > 50){
    echo ("First Name must have less than 50 characters");
}else if(empty($alname)){
    echo ("Please enter your Last Name !!!");
}else if(strlen($alname) > 50){
    echo ("Last Name must have less than 50 characters");
}else if (empty($aemail)){
    echo ("Please enter your Email !!!");
}else if(strlen($aemail) >= 100){
    echo ("Email must have less than 100 characters");
}else if(!filter_var($aemail,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email !!!");
}else if (empty($apassword)){
    echo ("Please enter your Password !!!");
}else if(strlen($apassword) < 5 || strlen($apassword) > 20){
    echo ("Password must be between 5 - 20 charcters");

}else{

$rs = Database::search("SELECT * FROM `academic_officers` WHERE `email`='".$aemail."'");
$n = $rs->num_rows;

if($n > 0){
    echo ("User with the same Email or already exists.");
}else{
    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $adate = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `academic_officers` 
    (`fname`,`lname`,`email`,`password`,`joined_date`) VALUES 
    ('".$afname."','".$alname."','".$aemail."','".$apassword."','".$adate."')");

    echo "success";

}
    
}

?>