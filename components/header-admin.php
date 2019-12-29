<?php
$username = $_SESSION['username'];
$queryprofile = mysqli_query($connect, "SELECT * FROM tb_user WHERE username='$username'");
$getUserProfile = mysqli_fetch_assoc($queryprofile);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">

    <!-- Icons -->
    <script src="../assets/fontawesome/js/all.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Deskripsi</title>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-white navbar-light">
        <div class="container">

            <!-- Brand -->
            <a class="navbar-brand" href="../homepage.php">
                <h2 class="text-dark">TicFlip</h2>
            </a>

            <!-- Button -->
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu Navigation -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="../homepage.php"><i class="fa fa-home mr-2"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../paket-tour.php"><i class="fas fa-box mr-2"></i>Paket
                            Tour</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../tiket.php"><i class="fas fa-ticket-alt mr-2"></i>Tiket</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <?php
                    if (isset($_SESSION['username'])) { ?>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                Welcome, <?php echo ucfirst($_SESSION['username']); ?><b class="caret"></b>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right position-absolute" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../loginmodule/logout.php">Logout</a>
                            </div>
                        </li>
                        <!--  -->
                    <?php } else { ?>
                        <div class="nav-item ml-3">
                            <a href="login.php"><button type="button" class="btn btn-success">Login</button></a>
                            <a href="register.php"><button type="button" class="btn btn-primary">Register</button></a>
                        </div>
                    <?php }
                    session_abort();
                    ?>
                </ul>
            </div>
        </div>
    </nav>


    <div class="row no-gutters">
        <div class=" col-md-2 bg-dark">
            <?php if (!$getUserProfile['foto']) { ?>
                <img src="../assets/default.png" class="card-img-top " alt="...">
            <?php } else { ?>
                <img src="../assets/profile/<?php echo $getUserProfile['foto'] ?>" class="card-img-top " alt="...">
            <?php }; ?>
            <hr class="bg-secondary">
            <ul class="nav flex-column ml-3 mb-5">
                <li class="nav-item">
                    <a class="nav-link active text-white" href="admin.php"><i class="fa fa-tachometer-alt mr-2"></i>Dashboard</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="dfttiket.php"><i class="fas fa-ticket-alt mr-2"></i>Daftar Tiket</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="dftpaket.php"><i class="fas fa-box mr-2"></i>Daftar Paket Tour</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="dftpromo.php"><i class="fas fa-percent mr-2"></i>Daftar Promo</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="dftuser.php"><i class="fa fa-users mr-2" aria-hidden="true"></i>Daftar User</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="dftcheckout.php"><i class="fa fa-shopping-cart mr-2" aria-hidden="true"></i>Daftar Checkout</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="dftpembayaran.php"><i class="fa fa-credit-card mr-2" aria-hidden="true"></i>Daftar Pembayaran</a>
                    <hr class="bg-secondary">
                </li>
            </ul>
        </div>