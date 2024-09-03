<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Your Assignment</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="uikit.css" />

    <link rel="icon" href="resources/icon.png" />
</head>

<body>
    <?php include "header.php"; ?>
    <div class=" container-fluid vh-100 col-12">
        <div class=" row">
            <?php
            session_start();
            if (isset($_SESSION["u"])) {

                $data = $_SESSION["u"];

                $sub = $_GET["name"];

                require "connection.php";


                $teacher_rs = Database::search("SELECT * FROM `teachers` WHERE `subject`='" . $sub . "'");
                $teacher_data = $teacher_rs->fetch_assoc();

            ?>

                <div>


                    <span class=" fs-3 mt-3 fw-bold text-primary">Teacher:- <?php echo $teacher_data["fname"] ." ". $teacher_data["lname"]; ?></span>
                    <input type="text" class="from label  d-flex justify-content-center border-0 text-secondary fw-bold fs-4" id="subject" value="<?php echo $sub?>" readonly>

                    <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
                        <thead>
                            <tr>
                                <th class="uk-table-shrink">ID</th>
                                <th class="uk-table-expand">Description</th>
                                <th class="uk-width-small">Download</th>
                                <th class="uk-table-shrink uk-text-nowrap">Uploade</th>
                            </tr>
                        </thead>



                        <?php

$query= "SELECT * FROM `tassignments` WHERE `email`='".$teacher_data["email"]."'";

                        $subject_rs = Database::search($query);
                        $subject_num = $subject_rs->num_rows;
                        $subject_data = $subject_rs->fetch_assoc();

                        $selected_rs =  Database::search($query );

                        $selected_num = $selected_rs->num_rows;

                        for ($x = 0; $x < $selected_num; $x++) {
                            $selected_data = $selected_rs->fetch_assoc();

                        ?>


                            <tbody>
                                <tr>

                                    <td><span><?php echo $x + 1; ?></span></td>

                                    <td class="uk-table-link">
                                        <input class="uk-text-reset from label  d-flex justify-content-center border-0 text-secondary fw-bold fs-4" id="name"value="<?php echo $selected_data["name"];?>" readonly/>
                                    </td>
                                    <td class="uk-text-truncate"><a href="<?php echo $selected_data["code"];?>" class=" btn btn-success d-grid mt-3 text-decoration-none">Download</a></td>
                                    <td class="uk-text-nowrap">
                                        <!-- <input type="file" class="d-none" id="assignment" />
                                        <label for="assignment" id="assignment" class="btn btn-dark mt-3">Uploade</label> -->
                                        <button class="btn btn-secondary mt-3" type="submit"   onclick="st_uploade_assignment();">Uploade  <i class="bi bi-arrow-bar-up"></i></button>
                                    </td>
                                </tr>


                                <tr>

                            </tbody>
                        <?php

                        }

                        ?>
                    </table>
                </div>
            <?php
            } else {
                header("Location:teachers.php");
            }
            ?>


<div class="modal" tabindex="-1" id="stassignmentUploade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Uploade Assignments</h5>
        <button type="button"  class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Assignment No</p>
        <input type="text" placeholder="Ex: Assignment 1" class=" form-control" id="san">

        <p>Subject Name</p>
        <input type="text"  class=" form-control" id="sas">
        
        
        
      </div>
      <div class="modal-footer">
        <input type="file" id="assignment" class="d-none">
        <label class=" btn btn-secondary" for="assignment">Choose File</label>
        <button type="submit" class="btn btn-primary" onclick="stuploadeass();">Uploade</button>
      </div>
    </div>
  </div>
</div>


            <!-- footer -->
            <?php include "footer.php"; ?>

            <!-- footer -->
        </div>
    </div>


    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="uikit.js"></script>
</body>

</html>