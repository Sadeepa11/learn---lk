<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Marks</title>

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
                <!-- hedar -->






                <!-- header -->
                <div>

                    <span class=" fs-3 mt-3 fw-bold text-primary">Teacher:- <?php echo $teacher_data["fname"] . " " . $teacher_data["lname"]; ?></span>

                    <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
                        <thead>
                            <tr>
                                <th class="uk-table-shrink">ID</th>
                                <th class="uk-table-expand">Description</th>
                                <th class="uk-width-small">Marks</th>

                            </tr>
                        </thead>


                        <?php
                        $query = "SELECT * FROM `assignment` WHERE `email`='" . $_SESSION["u"]["email"] . "' AND `subject`='" . $sub . "'";

                        // $subject_rs = Database::search($query);
                        // $subject_num = $subject_rs->num_rows;
                        // $subject_data = $subject_rs->fetch_assoc();

                        $selected_rs =  Database::search($query);

                        $selected_num = $selected_rs->num_rows;

                        for ($x = 0; $x < $selected_num; $x++) {
                            $selected_data = $selected_rs->fetch_assoc();

                        ?>


                            <tbody>
                                <tr>

                                    <td><span><?php echo $x + 1; ?></span></td>
                                    <td class="uk-table-link">
                                        <span class="uk-text-reset"><?php echo $selected_data["name"]; ?></a>
                                    </td>
                                    <td class="uk-text-truncate"><span class=" text-dark"><?php echo $selected_data["marks"]; ?></span></td>

                                </tr>



                            </tbody>


                        <?php

                        }

                        ?>
                    </table>
                </div>
            <?php
            } else {
                header("Location:index.php");
            }
            ?>
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