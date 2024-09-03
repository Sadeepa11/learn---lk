<?php
  
  session_start();
  
  require "connection.php";
  
  if (isset($_FILES["ass"])) {
      $assignment = $_FILES["ass"];
      $assignment_name = $_POST["an"];
      $as=$_POST["as"];
  
      
          $file_name = "resources/tassignments/" . $_SESSION["tu"]["fname"] . "_" . uniqid() .".pdf";
  
          move_uploaded_file($assignment["tmp_name"], $file_name);
  
          
  
          Database::iud("INSERT INTO `tassignments` (`name`,`code`,`email`,`subject`) VALUES 
          ('" . $assignment_name  . "','" . $file_name . "','" . $_SESSION["tu"]["email"] . "','".$as."')");
  
              
          
      
      echo ("success");
  }
  
  ?> 