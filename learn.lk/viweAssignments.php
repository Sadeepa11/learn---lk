<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viwe Assignmnts</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="uikit.css" />

    <link rel="icon" href="resources/icon.png" />
</head>

<body>
    <div class=" container-fluid ">
        <div class=" row">
            <?php include "header.php"; 
            
            session_start();
            require "connection.php";
            
            ?>


            <div class="col-11 mt-3 mb-3 mx-5" >
                <div class="row">
                    <div class="col-1  bg-dark  text-start">
                        <span class="fs-4 fw-bold text-white">ID</span>
                    </div>
                    <div class="col-2  bg-dark text-start ">
                        <span class="fs-4 fw-bold text-white">Assignment Name</span>
                    </div>
                    <div class="col-3  bg-dark d-flex justify-content-center ">
                        <span class="fs-4 fw-bold text-white ">Email</span>
                    </div>
                    <div class="col-1  bg-dark d-flex justify-content-center ">
                        <span class="fs-4 fw-bold text-white ">Viwe</span>
                    </div>
                    <div class="col-5  bg-dark d-flex justify-content-center ">
                        <span class="fs-4 fw-bold text-white ">Uploade Marks</span>
                    </div>


                </div>
            </div>

            <?php
            $query = "SELECT * FROM `assignment`";

            $as_rs = Database::search($query);
            $as_num = $as_rs->num_rows;
            $as_data = $as_rs->fetch_assoc();

            $selected_rs =  Database::search($query . " LIMIT " . $as_num . "");

            $selected_num = $selected_rs->num_rows;

            for ($x = 0; $x < $selected_num; $x++) {
                $selected_data = $selected_rs->fetch_assoc();

            ?>

                <div class="col-11 mt-5 mb-3  mx-5" >
                    <div class="row">
                        <div class="col-1    text-start">
                            <span class="fs-4  text-dark"><?php echo $x + 1; ?></span>
                        </div>
                        <div class="col-2  text-start " >
                            <?php echo $selected_data["name"];  ?>
                        </div>
                        <div class="col-3 justify-content-end d-flex">
                            <span class="fs-4 text-start "><?php echo $selected_data["email"]; ?></span>
                        </div>
                        <div class="col-1 justify-content-end d-flex">
                            <span class="fs-4 text-start "><a class="uk-button btn btn-primary" href="<?php echo $selected_data["code"]; ?>" type="button"><i class="bi bi-eye"></i></a></span>
                        </div>
                        <div class="col-5 justify-content-center d-flex">
                            <button class=" btn btn-danger col-12" onclick="uploade_Marks();"><i class="bi bi-arrow-bar-up"></i></button>

                    </div>
                </div>
        </div>




    <?php

            }

    ?>

    
<div class="modal" tabindex="-1" id="mUploade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Uploade Marks</h5>
        <button type="button"  class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Assignment No</p>
        <input type="text" placeholder="Ex: Assignment 1" class=" form-control" id="an">

        <p>Subject Name</p>
        <input type="text"  class=" form-control" id="as">

        <p>Your Email</p>
        <input type="text"  class=" form-control" id="te"value="<?php echo $_SESSION["tu"]["email"]; ?>">
        
        <p>Student Email</p>
        <input type="text"  class=" form-control" id="se" value="<?php echo $selected_data["email"]; ?>" readonly>
        
        <p>Marks</p>
        <input type="text"  class=" form-control" id="m">
        
        
        
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" onclick="upMarks();">Uploade</button>
      </div>
    </div>
  </div>
</div>


    <?php include "footer.php"; ?>


    </div>
    </div>




    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="uikit.js"></script>
</body>

</html>