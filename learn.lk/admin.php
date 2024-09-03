<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admins</title>



    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="semantic.css" />

    <link rel="icon" href="resources/icon.png" />
</head>

<body>
    <div class=" container-fluid bg-info">
        <div class=" row ">





            <!-- profile -->

            <div class=" col-12 col-lg-6  d-flex justify-content-center background">




                <div class="col-6 fixed-bottom d-none d-lg-block">
                    <p class="text-center">&copy; 2022 learn.lk || All Right Reserved</p>
                </div>

            </div>
            <!-- profile -->
            <!-- options -->
            <div class=" col-12 col-lg-6 vh-100  ">

                <div class="col-12" style="margin-top:25%;">
                    <p class="title2">Register as a Admin</p>
                </div>
                <div class="col-12" style="margin-top:10%;">
                    <label class="form-label">Email</label>
                    <input type="email" class=" form-control" id="ade">
                </div>
                <div class="col-12" style="margin-top:5%;">
                    <Button class=" btn btn-success d-grid col-12" onclick="adminVerification();">Send Verification Code</Button>
                </div>



            </div>
            <!-- options -->





            <div class="modal" tabindex="-1" id="verificationModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Admin Verification</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label class="form-label">Enter Your Verification Code</label>
                            <input type="text" class="form-control" id="vcode">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="verify();">Verify</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="semantic.js"></script>
</body>

</html>