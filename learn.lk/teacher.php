<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>

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


            <span class=" text-primary fs-4 fw-bold text-center">Teacher Details</span>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col" class=" text-center">Subject</th>
                    </tr>
                </thead>
                <?php
                $query = "SELECT * FROM `teachers`";

                $teacher_rs = Database::search($query);
                $teacher_num = $teacher_rs->num_rows;



                for ($x = 0; $x < $teacher_num; $x++) {
                    $teacher_data = $teacher_rs->fetch_assoc();



                ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $x + 1; ?></th>
                            <td> <?php echo $teacher_data["fname"] . " " .  $teacher_data["lname"] ?></td>
                            <td><?php echo $teacher_data["email"] ?></td>
                            <td class=" text-center"><?php echo $teacher_data["subject"] ?></td>
                        </tr>

                    </tbody>
                <?php

                }

                ?>
            </table>


            <?php include "footer.php"; ?>



        </div>
    </div>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="semantic.js"></script>
</body>

</html>