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


            <span class=" text-primary fs-4 fw-bold text-center">Academic Officer's Details</span>

            <table class="table mx-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        
                    </tr>
                </thead>
                <?php
                $query = "SELECT * FROM `academic_officers`";

                $officer_rs = Database::search($query);
                $officer_num = $officer_rs->num_rows;



                for ($x = 0; $x < $officer_num; $x++) {
                    $officer_data = $officer_rs->fetch_assoc();



                ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $x + 1; ?></th>
                            <td> <?php echo  $officer_data["fname"] . " " .   $officer_data["lname"] ?></td>
                            <td><?php echo  $officer_data["email"] ?></td>
                            
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