<!-- Low Zhi Lok -->
<?php
// Can reuse this authentication_code.php for "my-profile.php" and admin "index.php"
include('config/callOOPdbcon.php');
include_once('controllers/AuthenticationController.php');
$authenticated = new AuthenticationController;
$data = $authenticated->authDetail();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile page</title>
    <link rel="stylesheet" href="../IP_Assignment/style/style.css">
    <link rel="stylesheet" href="../IP_Assignment/assets/css/bootstrap5.min.css">

    <style>
        * {
            margin: 0%;
            padding: 0%;
        }

        nav {
            background-color: rgba(0, 0, 0, 0.7);
        }

        .nav-link:hover {
            background-color: grey;
        }

        header {
            overflow: hidden;
            height: 100vh;
        }

        .anotherStyleOfLOA {
            color: #fff;
            font-size: 30px;
            letter-spacing: 2px;
            font-family: serif;
        }

        .anotherStyleOfLogo {
            margin-top: -13px;
            display: inline-block;
        }
    </style>
</head>

<body>
    <!-- testing bootstrap -->
    <?php include('message.php'); ?>

    <nav class="navbar navbar-expand-lg container-fluid" style="position: fixed">
        <a class="navbar-brand mr-5 text-warning" href="<?= base_url('homepage.php') ?>"><img src="../IP_Assignment/logo.gif" class="anotherStyleOfLogo" style="width: 50px; height: 50px; text-align: center;" alt="logo gif"><span class="anotherStyleOfLOA">LOA MUSIC</span></a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <!-- If got registered, it should pop up the name -->
                <?php if (isset($_SESSION['authenticated'])) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" style="font-size: 22px; padding-right: 10px;" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['auth_user']['user_fname'] . " " . $_SESSION['auth_user']['user_lname']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?= base_url('my-profile.php') ?>">My Profile</a></li>
                            <li>
                                <form action="" method="POST">
                                    <button type="submit" class="dropdown-item" name="logout_btn">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>


                    <!-- If no yet registered an account, it should pop up the "register" and "login" button -->
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" style="font-size: 22px; padding-right: 10px;" href="<?= base_url('login.php') ?>">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" style="font-size: 22px; padding-right: 10px;" href="<?= base_url('register.php') ?>">Register</a>
                    </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a class="nav-link text-white" style="font-size: 22px; padding-right: 10px;" href="#about">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" style="font-size: 22px; padding-right: 10px;" href="#">Music</a>
                </li>
            </ul>
        </div>
    </nav>

    <table class="table container text-center w-50">
        <th><h1>My Profile Page</h1></th>
        <tr>
            <td><h3>First Name: <?= $data['fname']. ' ' .$data['lname'];  ?></h3></td>
        </tr>
        <tr>
            <td><h3>Email: <?= $data['email']; ?></h3></td>
        </tr>
        <tr>
            <td><h3>Created At: <?= date('d-m-Y', strtotime($data['created_at'])); ?></h3></td>
        </tr>
    </table>


    <script src="assets/js/jQuery.min.js"></script>
    <script src="assets/js/bootstrap5.min.js"></script>
</body>

</html>