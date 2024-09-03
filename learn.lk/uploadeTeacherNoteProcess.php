<?php
  
  session_start();
  
  require "connection.php";
  
  if (isset($_FILES["no"])) {
      $note = $_FILES["no"];
      $note_name = $_POST["n"];
  
      
          $file_name = "resources/tnotes/" . $_SESSION["tu"]["fname"] . "_" . uniqid() .".pdf";
  
          move_uploaded_file($note["tmp_name"], $file_name);
  
          
  
          Database::iud("INSERT INTO `tnotes` (`name`,`code`,`email`) VALUES 
          ('" . $note_name  . "','" . $file_name . "','" . $_SESSION["tu"]["email"] . "')");
  
              
          
      
      echo ("success");
  }
  
  ?> 