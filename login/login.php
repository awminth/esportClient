<?php
    include('../config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>hitupmm.com</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo roothtml.'assets/img/favicon.png'?>" rel="icon">
    <link href="<?php echo roothtml.'assets/img/apple-touch-icon.png'?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo roothtml.'assets/vendor/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo roothtml.'assets/vendor/bootstrap-icons/bootstrap-icons.css'?>" rel="stylesheet">
    <link href="<?php echo roothtml.'assets/vendor/boxicons/css/boxicons.min.css'?>" rel="stylesheet">
    <link href="<?php echo roothtml.'assets/vendor/quill/quill.snow.css'?>" rel="stylesheet">
    <link href="<?php echo roothtml.'assets/vendor/quill/quill.bubble.css'?>" rel="stylesheet">
    <link href="<?php echo roothtml.'assets/vendor/remixicon/remixicon.css'?>" rel="stylesheet">
    <link href="<?php echo roothtml.'assets/vendor/simple-datatables/style.css'?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo roothtml.'assets/css/style.css'?>" rel="stylesheet">

    <!-- Sweet Alarm -->
    <link href="<?php echo roothtml.'lib/sweet/sweetalert.css' ?>" rel="stylesheet" />
    <script src="<?php echo roothtml.'lib/sweet/sweetalert.min.js' ?>"></script>
    <script src="<?php echo roothtml.'lib/sweet/sweetalert.js' ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo roothtml.'lib/plugins/select2/css/select2.min.css' ?>">
    <link rel="stylesheet"
        href="<?php echo roothtml.'lib/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css' ?>">

    <style>
    body {
        background: #236e91;
        background: linear-gradient(25deg, rgba(35, 110, 145, 1) 0%,
                rgba(46, 128, 143, 1) 17%,
                rgba(53, 141, 141, 1) 34%,
                rgba(63, 159, 138, 1) 51%,
                rgba(64, 160, 138, 1) 39%,
                rgba(69, 169, 137, 1) 52%);
    }
    
    .loader {
        position: fixed;
        z-index: 999;
        height: 100%;
        width: 100%;
        top: 0;
        left: 0;
        background-color: Black;
        filter: alpha(opacity=60);
        opacity: 0.7;
        -moz-opacity: 0.8;
        display: flex;           /* Flexbox ကိုသုံးပါ */
        justify-content: center; /* ရေပြင်ညီအလိုက် center ချပါ */
        align-items: center;     /* ဒေါင်လိုက်အလိုက် center ချပါ */
    }

    .center-load {
        text-align: center;      /* အတွင်းပိုင်း element များကို center ချပါ */
    }
    </style>
</head>

<body>
    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                        <p class="text-center small">Enter your personal details to create account</p>
                                    </div>

                                    <form class="row g-3 needs-validation" novalidate id="frmlogin">
                                        <input type="hidden" name="action" value="login" />
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="text" name="username" class="form-control" id="username"
                                                    value="<?php if(isset($_COOKIE['member_login'])){ echo $_COOKIE['member_login'];}?>"
                                                    required>
                                                <div class="invalid-feedback">Please choose a username.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                value="<?php if(isset($_COOKIE['member_login'])){ echo $_COOKIE['member_password'];}?>"
                                                required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="remember"
                                                    <?php if(isset($_COOKIE['member_password'])){?> checked <?php } ?>
                                                    type="checkbox" id="remember">
                                                <label class="form-check-label" for="acceptTerms">Remember
                                                    me</a></label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit"
                                                id="btncreate">Login</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Don't have account? <a
                                                    href="<?php echo roothtml.'index.php'?>">Create an account</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div class="loader" style="display:none;">
        <div class="center-load">
            <img src="<?php echo roothtml.'lib/images/loading.gif'?>" />
        </div>
    </div>


    <!-- Vendor JS Files -->
    <script src="<?php echo roothtml.'assets/vendor/apexcharts/apexcharts.min.js'?>"></script>
    <script src="<?php echo roothtml.'assets/vendor/bootstrap/js/bootstrap.bundle.min.js'?>"></script>
    <script src="<?php echo roothtml.'assets/vendor/echarts/echarts.min.js'?>"></script>
    <script src="<?php echo roothtml.'assets/vendor/quill/quill.js'?>"></script>
    <script src="<?php echo roothtml.'assets/vendor/simple-datatables/simple-datatables.js'?>"></script>
    <script src="<?php echo roothtml.'assets/vendor/tinymce/tinymce.min.js'?>"></script>
    <script src="<?php echo roothtml.'assets/vendor/php-email-form/validate.js'?>"></script>
    <!-- Template Main JS File -->
    <script src="<?php echo roothtml.'assets/js/main.js'?>"></script>

    <!-- jQuery -->
    <script src="<?php echo roothtml.'lib/plugins/jquery/jquery.min.js' ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo roothtml.'lib/plugins/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo roothtml.'lib/dist/js/adminlte.min.js' ?>"></script>
    <!-- Select2 -->
    <script src="<?php echo roothtml.'lib/plugins/select2/js/select2.full.min.js' ?>"></script>

    <script>
    $(document).ready(function() {

        $("#frmlogin").on("submit", function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                type: "post",
                url: "<?php echo roothtml.'login/login_action.php' ?>",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $(".loader").show();
                },
                success: function(data) {
                    try {
                        $(".loader").hide();
                        // Parse JSON response
                        var jsonData = typeof data === "string" ? JSON.parse(data) : data;

                        if (jsonData.status === "success") {
                            let redirectUrl = jsonData.redirect_url;
                            
                            // Redirect to the login URL
                            window.location.href = "<?= roothtml.'setup/home.php'?>" + "?target_url=" + encodeURIComponent(redirectUrl);
                        } 
                        else {
                            console.log("Error data", jsonData);
                            swal("Error", "Login failed", "error");
                        }
                    } 
                    catch (err) {
                        console.error("Invalid JSON:", err, data);
                        swal("Error", "Unexpected server response", "error");
                    }
                },
                error: function() {
                    swal("Error", "Server error occurred", "error");
                }
            });
        });

    });
    </script>

</body>

</html>