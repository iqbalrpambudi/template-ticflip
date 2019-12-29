<!-- Navbar -->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">

    <!-- Icons -->
    <script src="./assets/fontawesome/js/all.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assets/style/style.css">
    <title>Deskripsi</title>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container">

            <!-- Brand -->
            <a class="navbar-brand" href="homepage.php">
                <h2 class="text-light">TicFlip</h2>
            </a>

            <!-- Button -->
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu Navigation -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="homepage.php"><i class="fa fa-home mr-2"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="paket-tour.php"><i class="fas fa-box mr-2"></i>Paket
                            Tour</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tiket.php"><i class="fas fa-ticket-alt mr-2"></i>Tiket</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <?php session_start();
                    if (isset($_SESSION['username'])) { ?>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                Welcome, <?php echo ucfirst($_SESSION['username']); ?><b class="caret"></b>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right position-absolute" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="./loginmodule/logout.php">Logout</a>
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