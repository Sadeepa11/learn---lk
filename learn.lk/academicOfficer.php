<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>learn.lk</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/icon.png"  />

</head>

<body class=" bg-info">

    <div class="container-fluid col-12  d-flex justify-content-center">
        <div class="row ">

            <!-- header -->

            <!-- header -->

            <!-- content -->
            <!-- sign up -->

            <div class="col-12 ">
                <div class="row">

                    <div class="col-6 col-lg-6 d-none vh-100  d-lg-block background">

                    </div>
                    

                    <div class="col-12 col-lg-6" style=" margin-top:10%;" id="asignUpBox">
                
                        <div class="row g-2">
                            <div class="col-12">
                                <p class="title2">Create New Account</p>
                            </div>
                            <div class="col-12 d-none" id="amsgdiv">
                                <div class="alert alert-danger" role="alert" id="aalertdiv">
                                    <i class="bi bi-x-octagon-fill fs-5" id="amsg">

                                    </i>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" id="af" />
                            </div>
                            <div class="col-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="al" />
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="ae" />
                            </div>
                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" id="ap" />
                            </div>
                            
                            
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-primary" onclick="asignUp();">Register</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-dark" onclick="achangeView();">Sign In</button>
                            </div>
                        </div>
                    </div>

                    <!-- sign up -->
                    <!-- sign in -->

                    <div class="col-12 col-lg-6 d-none " style=" margin-top:10%;" id="asignInBox">
                    <div class="col-12">
                            
                        
                        <div class="row g-2">
                            <div class="col-12">
                                <p class="title2">Sign In</p>
                                <span class="text-danger" id="amsg2"></span>
                            </div>

                            <?php

                            $email = "";
                            $password = "";

                            if (isset($_COOKIE["aemail"])) {
                                $email = $_COOKIE["aemail"];
                            }

                            if (isset($_COOKIE["apassword"])) {
                                $password = $_COOKIE["apassword"];
                            }

                            ?>

                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="aemail2" value="<?php echo $email; ?>" />
                            </div>
                            <div class="col-12">
                                <label class="form-label ">Password</label>
                                <input type="password" class="form-control" id="apassword2" value="<?php echo $password; ?>" />
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="arememberme">
                                    <label class="form-check-label">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <a href="#" class=" link-danger fw-bold" onclick="aforgotPassword();">Forgot Password?</a>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-primary" onclick="asignIn();">Sign In</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-secondary" onclick="achangeView();">New Users</button>
                            </div>
                        </div>
                        </div>

                    </div>

                </div>
            </div>
            <!-- sign in -->
            <!-- content -->

            <!-- modal -->

            <div class="modal" tabindex="-1" id="aforgotPasswordModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Reset Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">

                                <div class="col-6">
                                    <label class="form-label">New Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="anp" />
                                        <button class=" btn btn-primary" type="button" id="anpb" onclick="ashowPassword();">Show</button>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Re-type Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="arnp" />
                                        <button class=" btn btn-primary " type="button" id="arnpb" onclick="ashowPassword2();">Show</button>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Verification Code</label>
                                    <input type="text" class="form-control" id="avc" />
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="aresetPassword();">Reset Password</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal -->

            <!-- footer -->
            

            <div class="col-6 fixed-bottom d-none d-lg-block">
                <p class="text-center">&copy; 2022 learn.lk || All Right Reserved</p>
            </div>

            <!-- footer -->

        </div>

    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>