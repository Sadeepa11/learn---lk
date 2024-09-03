<?php

require "connection.php";

$tfname = $_POST["tf"];
$tlname = $_POST["tl"];
$temail = $_POST["te"];
$tpassword = $_POST["tp"];
$tsubject = $_POST["ts"];




if(empty($tfname)){
    echo ("Please enter your First Name !!!");
}else if(strlen($tfname) > 50){
    echo ("First Name must have less than 50 characters");
}else if(empty($tlname)){
    echo ("Please enter your Last Name !!!");
}else if(strlen($tlname) > 50){
    echo ("Last Name must have less than 50 characters");
}else if (empty($temail)){
    echo ("Please enter your Email !!!");
}else if(strlen($temail) >= 100){
    echo ("Email must have less than 100 characters");
}else if(!filter_var($temail,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email !!!");
}else if (empty($tpassword)){
    echo ("Please enter your Password !!!");
}else if(strlen($tpassword) < 5 || strlen($tpassword) > 20){
    echo ("Password must be between 5 - 20 charcters");

}else{

$rs = Database::search("SELECT * FROM `teachers` WHERE `email`='".$temail."'");
$n = $rs->num_rows;

if($n > 0){
    echo ("User with the same Email or already exists.");
}else{
    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $tdate = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `teachers` 
    (`fname`,`lname`,`email`,`subject`,`password`,`joined_date`) VALUES 
    ('".$tfname."','".$tlname."','".$temail."','".$tsubject."','".$tpassword."','".$tdate."')");

    echo "success";

}
    
}

?>

