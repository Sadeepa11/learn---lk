<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Dashboard</title>



    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="semantic.css" />

    <link rel="icon" href="resources/icon.png" />
</head>

<body>
    <div class=" container-fluid">
        <div class=" row ">

            <?php
            session_start();
            if (isset($_SESSION["acu"])) {

                $data = $_SESSION["acu"];

                require "connection.php";

            ?>
                <!-- hedar -->

                <?php include "header.php"; ?>



        </div>
        <!-- header -->
        <div class=" row">
           

            <!-- profile -->

            <div class=" col-12 col-lg-6  d-flex justify-content-center ">


                <?php
                $profile_rs = Database::search("SELECT * FROM `academic_officers` WHERE 
                                `email`='" . $data["email"] . "'");
                $profile_data = $profile_rs->fetch_assoc();
                $image_rs = Database::search("SELECT * FROM `a_pro_pics` WHERE 
                                `email`='" . $data["email"] . "'");
                $image_data = $image_rs->fetch_assoc();
                ?>

                <div class="ui card   " style="height: 80%; margin-top:70px;">
                <?php
                if (empty($image_data["path"])) {
                ?>
                 <div class="image" style="height: 45%;">
                        <img src="resources/profile_imgs/sample.png"   style="height: 100%;"/>
                    </div>
                    
                <?php
                } else {
                ?>
                     <div class="image" style="height: 45%;">
                        <img src="<?php echo $image_data["path"]; ?>"  style="height: 100%;"/>
                    </div>
                <?php
                }
                ?>
                    
                    <div class="content">
                        <span class="header mt-2"><?php echo $data["fname"]; ?> <?php echo $data["lname"]; ?></span>
                        <div class="meta mt-3">
                            <span class="date">Joined in <br /> <?php echo $data["joined_date"]; ?></span>
                        </div>
                        
                    </div>
                    <div class="extra content">
                        <a>

                            <a type="button" class=" mb-2 btn btn-primary d-grid text-light" href="acuserprofile.php">Edit Your Profile</a>
                            <a type="button" class=" mb-5 btn btn-danger d-grid text-light" onclick="acsignout();">Sign Out</a>
                        </a>
                    </div>
                </div>

            </div>
            <!-- profile -->
            <!-- options -->
            <div class=" col-12 col-lg-6 vh-100  mt-5 gap-4 border-2 border-start border-primary">

                <div class=" col-11 box" style="height:45%; border-radius:20px; background-image: linear-gradient(90deg,#74EBD5 0%,#9FACE6 100%); box-shadow:5px 5px 10px 1px black;"onclick="window.location='studentDetails.php';"><img href="dashboard.php" style="width: 100%; height:100%; border-radius:20px; " src="resources/StudentDetails.png" /></div>
                <div class=" col-11  box" style="height:45%; border-radius:20px; background-image: linear-gradient(90deg,#74EBD5 0%,#9FACE6 100%); box-shadow:5px 5px 10px 1px black;" onclick="window.location='assignmentMarks.php';"><img  style="width: 100%; height:100%; border-radius:20px; " src="resources/assignment.png" /></div>



            </div>
             <!-- options -->
        <?php

            } else {
                header("Location:index.php");
            }


        ?>
        </div>
<!-- footer -->
<?php include "footer.php"; ?>

<!-- footer -->



    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="semantic.js"></script>
</body>

</html>