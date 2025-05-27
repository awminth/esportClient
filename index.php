<?php
    include('config.php');
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
        body{
            background: #236e91;
            background: linear-gradient(
                25deg, rgba(35, 110, 145, 1) 0%,
                rgba(46, 128, 143, 1) 17%, 
                rgba(53, 141, 141, 1) 34%, 
                rgba(63, 159, 138, 1) 51%, 
                rgba(64, 160, 138, 1) 39%, 
                rgba(69, 169, 137, 1) 52%);
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

                                    <form class="row g-3 needs-validation" novalidate id="frmcreate">
                                    <input type="hidden" name="action" value="save" />
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="text" name="username" class="form-control"
                                                    id="username" required>
                                                <div class="invalid-feedback">Please choose a username.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="password" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="youtAgent" class="form-label">Agent</label>
                                            <select required class="form-select select2" name="agentid">
                                                <option selected="">Choose Your Agent Name</option>
                                                <?=load_agent();?>
                                            </select>
                                            <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourdisplayName" class="form-label">DisplayName</label>
                                            <input type="text" name="displayname" class="form-control" required>
                                            <div class="invalid-feedback">Please, enter username!</div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit" id="btncreate">Create
                                                Account</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Already have an account? <a
                                                    href="<?php echo roothtml.'login/login.php'?>">Log in</a></p>
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

        $("#frmcreate").on("submit", function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var username = $("[name='username']").val();
            var regex_username = /^[a-zA-Z0-9_]{6,40}$/;
            //Check Username
            if (!regex_username.test(username)) {
                swal("Warning", "(Number, Letter and _ only.)(Username must be 6 to 40 characters)",
                    "warning");
                return false;
            }
            //Check Password
            var password = $("[name='password']").val();
            var regex_password = /^[a-zA-Z0-9]{6,20}$/;
            if (!regex_password.test(password)) {
                swal("Warning", "(Number, Letter only.)(Password must be 6 to 20 characters)",
                    "warning");
                return false;
            }
            $.ajax({
                type: "post",
                url: "<?php echo roothtml.'index_action.php' ?>",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data == 0) {
                        swal("Error", "Save data is error.", "error");
                    }
                    else if (data == 1) {
                        swal("Success", "Save data is successful.", "success");
                        swal.close();
                    } 
                    else if (data == 2) {
                        swal("Info", "Server Request no response.", "info");
                    }  
                    else {
                        swal("Error", data, "error");
                    }
                }
            });
        });
    });
    </script>

</body>

</html>