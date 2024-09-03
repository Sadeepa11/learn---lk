<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Marks</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="semantic.css" />

    <link rel="icon" href="resources/icon.png" />
</head>

<body>

    <div class=" container-fluid ">
        <div class=" row ">

            <?php



            require "connection.php";

            ?>
            <!-- hedar -->

            <?php include "header.php"; ?>


            <span class=" text-primary fs-4 fw-bold text-center">Send Marks</span>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Assignment Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col" class=" text-center">marks</th>
                        <th scope="col" class=" text-center">Send Marks</th>
                    </tr>
                </thead>
                <?php
                $query = "SELECT * FROM `marks`";

                $marks_rs = Database::search($query);
                $marks_num = $marks_rs->num_rows;



                for ($x = 0; $x < $marks_num; $x++) {
                    $marks_data = $marks_rs->fetch_assoc();

                    $student_rs = Database::search("SELECT * FROM `students` WHERE `email`='" . $marks_data["email"] . "'");
                    $student_data = $student_rs->fetch_assoc();



                ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $x + 1; ?></th>
                            <td> <?php echo $student_data["fname"] . " " .  $student_data["lname"] ?></td>
                            <td> <?php echo $marks_data["name"] ?></td>
                            <td><?php echo $marks_data["email"] ?></td>
                            <td><?php echo $marks_data["subject"] ?></td>
                            <td class=" text-center"><?php echo $marks_data["marks"] ?></td>
                            <td class=" text-center"><button class=" btn btn-success" onclick="sendMarks();"><i class="bi bi-arrow-bar-right"></i></button></td>
                        </tr>

                    </tbody>
                <?php

                }

                ?>
            </table>

            <div class="modal" tabindex="-1" id="smUploade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Send Marks to Students</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Assignment No</p>
                            <input type="text" placeholder="Ex: Assignment 1" class=" form-control" id="san">

                            <p>Student Email</p>
                            <input type="text" class=" form-control" id="ase" value="<?php echo $student_data["email"]; ?>" readonly>

                            <p>Marks</p>
                            <input type="text" class=" form-control" id="sm" >




                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" onclick="sendMarksToStudent();">Uploade</button>
                        </div>
                    </div>
                </div>
            </div>


            <?php include "footer.php"; ?>



        </div>
    </div>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="semantic.js"></script>
</body>

</html>