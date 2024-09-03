<?php

session_start();

require "connection.php";

if (isset($_SESSION["acu"])) {

    $fname = $_POST["acfn"];
    $lname = $_POST["acln"];
    

    $image_rs = Database::search("SELECT * FROM `a_pro_pics` WHERE 
   `email`='" . $_SESSION["acu"]["email"] . "'");
    $image_data = $image_rs->fetch_assoc();

    if (isset($_FILES["acimage"])) {
        $image = $_FILES["acimage"];

        $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
        $file_ex = $image["type"];

        if (!in_array($file_ex, $allowed_image_extentions)) {
            echo ("Please select a valid image.");
        } else {

            $new_file_extention;

            if ($file_ex == "image/jpg") {
                $new_file_extention = ".jpg";
            } else if ($file_ex == "image/jpeg") {
                $new_file_extention = ".jpeg";
            } else if ($file_ex == "image/png") {
                $new_file_extention = ".png";
            } else if ($file_ex == "image/svg+xml") {
                $new_file_extention = ".svg";
            }

            $file_name = "resources/profile_imgs/" . $_SESSION["acu"]["fname"] . "_" . uniqid() . $new_file_extention;

            move_uploaded_file($image["tmp_name"], $file_name);

            $profile_rs = Database::search("SELECT * FROM `academic_officers` WHERE 
                                `email`='" . $_SESSION["acu"]["email"] . "'");
            $profile_data = $profile_rs->fetch_assoc();

            if (empty($profile_data["path"])) {


                Database::iud("INSERT INTO `a_pro_pics` (`path`,`email`) VALUES 
                ('" . $file_name . "','".$_SESSION["acu"]["email"]."')");
            } else {
                Database::iud("UPDATE `a_pro_pics` SET `path`='" . $file_name . "' ' WHERE 
                `email`='" . $_SESSION["acu"]["email"] . "'");
            }
        }
    }

    Database::iud("UPDATE `academic_officers` SET `fname`='" . $fname . "',`lname`='" . $lname . "'
            WHERE `email`='" . $_SESSION["acu"]["email"] . "'");



    echo ("success");
} else {
    echo ("Please login first");
}
