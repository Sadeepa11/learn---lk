<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose a Subject</title>
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


            <div class="col-6 mt-3 mb-3" style=" margin-left:35%;">
                <div class="row">
                    <div class="col-1  bg-dark  text-start">
                        <span class="fs-4 fw-bold text-white">ID</span>
                    </div>
                    <div class="col-2  bg-dark text-start ">
                        <span class="fs-4 fw-bold text-white">Subject</span>
                    </div>
                    <div class="col-3  bg-dark d-flex justify-content-center ">
                        <span class="fs-4 fw-bold text-white "></span>
                    </div>


                </div>
            </div>

            <?php
            $query = "SELECT * FROM `subjects`";

            $subject_rs = Database::search($query);
            $subject_num = $subject_rs->num_rows;
            $subject_data = $subject_rs->fetch_assoc();

            $selected_rs =  Database::search($query . " LIMIT " . $subject_num . "");

            $selected_num = $selected_rs->num_rows;

            for ($x = 0; $x < $selected_num; $x++) {
                $selected_data = $selected_rs->fetch_assoc();

            ?>

                <div class="col-6 mt-5 mb-3" style=" margin-left:35%;">
                    <div class="row">
                        <div class="col-1    text-start">
                            <span class="fs-4  text-dark"><?php echo $x + 1; ?></span>
                        </div>
                        <div class="col-2  text-start ">
                            <?php echo $selected_data["name"]; ?>
                        </div>
                        <div class="col-3 justify-content-end d-flex">
                            <span class="fs-4 text-start "><a class="uk-button btn btn-primary" type="button" href='<?php echo "notes.php?name=" . ($selected_data["name"]); ?>'><i class="bi bi-arrow-bar-right"></i></a></span>
                        </div>


                    </div>
                </div>
        </div>




    <?php

            }

    ?>


    <?php include "footer.php"; ?>


    </div>
    </div>




    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="uikit.js"></script>
</body>

</html>