 <?php
  
session_start();

require "connection.php";

if (isset($_FILES["assignment"])) {
    $assignment = $_FILES["assignment"];
    $name=$_POST["san"];
    $subject=$_POST["sas"];
    


 

        $file_name = "resources/assignments/" . $_SESSION["u"]["fname"] . "_" . uniqid() .".pdf";

        move_uploaded_file($assignment["tmp_name"], $file_name);

        

        Database::iud("INSERT INTO `assignment` (`code`,`email`,`name`,`subject`) VALUES 
        ('" . $file_name . "','" . $_SESSION["u"]["email"] . "','".$name."','".$subject."')");

            
        
    
    echo ("success");
}

?> 