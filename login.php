<!-- Lee Kai Mun -->
<?php
include("config/callOOPdbcon.php");
include("codes/authentication_code.php");
$auth->isLoggedIn();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/style/style.css">
    <link rel="stylesheet" href="../IP_Assignment/assets/css/bootstrap5.min.css">

    <style>
        * {
            margin: 0%;
            padding: 0%;
        }

        header {
            overflow: hidden;
            height: 100vh;
        }

        .nav-link:hover {
            background-color: grey;
        }

        .anotherStyleOfLOA {
            color: #fff;
            font-size: 30px;
            letter-spacing: 2px;
            font-family: serif;
        }

        .anotherStyleOfLogo {
            margin-left: -100px;
            margin-top: -13px;
            display: inline-block;
        }
    </style>
</head>

<body>

    <!-- nav bar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container">
            <a class="navbar-brand" href="../IP_Assignment/homepage.php"><img src="../IP_Assignment/logo.gif" class="anotherStyleOfLogo" style="width: 50px; height: 50px; text-align: center;" alt="logo gif"><span class="anotherStyleOfLOA">LOA MUSIC</span></a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" style="font-size: 22px; padding-right: 10px;" href="#">Music</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" style="font-size: 22px; padding-right: 10px;" href="<?= base_url('login.php') ?>">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" style="font-size: 22px; padding-right: 10px;" href="<?= base_url('register.php') ?>">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- login form -->
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">

                    <?php include('message.php'); ?>

                    <div class="card">
                        <div class="card-header">
                            <h4>Login</h4>
                        </div>
                        <div class="card-body">

                            <form action="" method="POST">
                                <div class="form-group mb-3">
                                    <label>Email Id</label>
                                    <input type="email" name="email" placeholder="Enter Email Address" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Password</label>
                                    <input type="password" name="password" placeholder="Enter Password" class="form-control">
                                </div>
                                <p>Forgot your password? <a href="forgot.php">Click Here!</a></p>
                                <div class="form-group mb-3">
                                    <button type="submit" name="login_btn" class="btn btn-primary">Login Now</button>
                                </div>
                                
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jQuery.min.js"></script>
    <script src="assets/js/bootstrap5.min.js"></script>
</body>

</html>