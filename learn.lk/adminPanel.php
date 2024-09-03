<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>


    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="semantic.css" />

    <link rel="icon" href="resources/icon.png" />
</head>

<body class=" bg-info ">
    <div class=" container-fluid vh-100 ">

        <?php
        session_start();
        if (isset($_SESSION["adu"])) {

            $data = $_SESSION["adu"];

            require "connection.php";


            $student_rs=Database::search("SELECT * FROM `students`");
            $student_num=$student_rs->num_rows;

            $teachers_rs=Database::search("SELECT * FROM `teachers`");
            $teachers_num=$teachers_rs->num_rows;

            $academic_officers_rs=Database::search("SELECT * FROM `academic_officers`");
            $academic_officers_num=$academic_officers_rs->num_rows;
            

        ?>






            <div class="col-12 d-flex justify-content-center" style="height:5vh;">
                <span class=" fs-1 fw-bolder text-dark mt-4">Admin Panel</span>
            </div>

            <div class=" row mt-5 mt-0">


                <!-- profile -->


                <div class=" col-12 col-lg-6" style="height: 95vh;">

                    <div class=" col-10 box1 bg-light d-flex justify-content-center " style="height:50vh; border-radius:20px;  box-shadow:0px 0px 10px 2px black;">
                        <div class="row">
                            <div class=" col-12  d-flex justify-content-center" style="height: 20%;">
                                <div class="row"><span class="fs-1 fw-bold text-primary" style="margin-top: 20px;">Admin Details</span></div>
                            </div>

                            <div class="col-12 d-flex justify-content-center" style="height: 40%;">
                                <div class="row">
                                <span class="fs-2 fw-bold text-dark" style="margin-top: 20px;">Name:-<?php echo $data["fname"]." ".  $data["lname"];?></span>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-center " style="height: 40%;">
                                <div class="row">
                                <span class="fs-2 fw-bold text-dark" style="margin-top: 20px;">Email:-<?php echo $data["email"]?></span>
                                </div>
                            </div>
                        </div>


                    </div>


                    <div class=" row">


                    <div class=" col-3 box1 bg-secondary d-flex justify-content-center  " style="height:25vh; border-radius:20px;  box-shadow:0px 0px 10px 2px black;" >
                                    <div class="row ">
                                        <div class="col-12 text-black text-center rounded" style="height: 100%;">
                                            <br />
                                            <span class="fs-4 fw-bold">No. of Students</span>
                                            <br /><br /><br />

                                            <span class="fs-1  fw-bolder"><?php echo $student_num?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-3 box1 bg-danger d-flex justify-content-center  " style="height:25vh; border-radius:20px;  box-shadow:0px 0px 10px 2px black;" >
                                    <div class="row ">
                                        <div class="col-12 text-black text-center rounded" style="height: 100%;">
                                            <br />
                                            <span class="fs-4 fw-bold">No. of Teachers</span>
                                            <br /><br /><br />

                                            <span class="fs-1  fw-bolder"><?php echo $teachers_num?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class=" col-3 box1 bg-success d-flex justify-content-center  " style="height:25vh; border-radius:20px;  box-shadow:0px 0px 10px 2px black;" >
                                    <div class="row ">
                                        <div class="col-12 text-black text-center rounded" style="height: 100%;">
                                            <br />
                                            <span class="fs-4 fw-bold">No. of Officers</span>
                                            <br /><br /><br />

                                            <span class="fs-1  fw-bolder"><?php echo $academic_officers_num?></span>
                                        </div>
                                    </div>
                                </div>




                        



                    </div>


                </div>
               
              
                <div class=" col-12 col-lg-6   " style="height: 95vh;">

                    <div class=" col-11 box " style="height:25%; border-radius:20px; background-image: linear-gradient(90deg,#74EBD5 0%,#9FACE6 100%); box-shadow:5px 5px 10px 1px black;" onclick="window.location='student.php';"><img href="dashboard.php" style="width: 100%; height:100%; border-radius:20px; " src="resources/student.jpg" /></div>
                    <div class=" col-11  box" style="height:25%; border-radius:20px; background-image: linear-gradient(90deg,#74EBD5 0%,#9FACE6 100%); box-shadow:5px 5px 10px 1px black;" onclick="window.location='teacher.php';"><img style="width: 100%; height:100%; border-radius:20px; " src="resources/teacher.jpeg" /></div>
                    <div class=" col-11  box" style="height:25%; border-radius:20px; background-image: linear-gradient(90deg,#74EBD5 0%,#9FACE6 100%); box-shadow:5px 5px 10px 1px black;" onclick="window.location='officer.php';"><img style="width: 100%; height:100%; border-radius:20px; " src="resources/officer.jpg" /></div>



                </div>
                
            <?php

        } else {
            header("Location:admin.php");
        }


            ?>


            </div>




    </div>


    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="semantic.js"></script>
</body>
</body>

</html>