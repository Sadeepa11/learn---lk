<?php

session_start();

require "connection.php";

if (isset($_SESSION["tu"])) {

    $fname = $_POST["tfn"];
    $lname = $_POST["tln"];
    

    $image_rs = Database::search("SELECT * FROM `t_pro_pics` WHERE 
   `email`='" . $_SESSION["tu"]["email"] . "'");
    $image_data = $image_rs->fetch_assoc();

    if (isset($_FILES["timage"])) {
        $image = $_FILES["timage"];

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

            $file_name = "resources/profile_imgs/" . $_SESSION["tu"]["fname"] . "_" . uniqid() . $new_file_extention;

            move_uploaded_file($image["tmp_name"], $file_name);

            $profile_rs = Database::search("SELECT * FROM `teachers` WHERE 
                                `email`='" . $_SESSION["tu"]["email"] . "'");
            $profile_data = $profile_rs->fetch_assoc();

            if (empty($profile_data["path"])) {


                Database::iud("INSERT INTO `t_pro_pics` (`path`,`email`) VALUES 
                ('" . $file_name . "','".$_SESSION["tu"]["email"]."')");
            } else {
                Database::iud("UPDATE `t_pro_pics` SET `path`='" . $file_name . "' ' WHERE 
                `email`='" . $_SESSION["tu"]["email"] . "'");
            }
        }
    }

    Database::iud("UPDATE `teachers` SET `fname`='" . $fname . "',`lname`='" . $lname . "'
            WHERE `email`='" . $_SESSION["tu"]["email"] . "'");



    echo ("success");
} else {
    echo ("Please login first");
}
