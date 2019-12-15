 <?php include './components/header.php';
    ?>

 <!-- Jumbotron -->
 <div class="jumbotron" style="margin-top:50px;
        margin-bottom:0;
            height: 500px;
            background-image: url('./assets/hero.jpg');
            background-position:center;
            background-repeat: no-repeat;">
     <div class="container">
         <div class="row">
             <div class="col-md-4">
                 <div class="card p-4" style="box-shadow: 0 3px 6px rgba(0,0,0,0.2);">
                     <form action="user.php" method="POST">
                         <div class=" form-group">
                             <label for="username">Username</label>
                             <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
                             <div class="form-group">
                                 <label for="password">Password</label>
                                 <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                             </div>
                             <small id="emailHelp" class="form-text text-muted">Don't have account? <a href="register.html">Register
                                     now</a></small>
                             <button type="submit" name="submit" class="btn btn-primary">Login</button>
                     </form>
                 </div>
                 <?php session_start();
                    if (isset($_SESSION['message'])) { ?>
                     <span class="alert alert-danger">
                         <?php echo $_SESSION['message'];
                                unset($_SESSION['message']); ?>
                     </span>
                 <?php }; ?>
             </div>
         </div>
     </div>
 </div>
 </div>

 <!-- Footer -->
 <div class="container-fluid bg-dark text-light">
     <div class="container p-3">
         <p class="my-auto text-left">©2019 TicFlip | All Rights Reserverd</p>
     </div>
 </div>

 <!-- Script -->
 <script src="./popper/popper.min.js"></script>
 <script src="./jquery/jquery.min.js""></script>
    <script src=" ./bootstrap/js/bootstrap.min.js"> </script> </body> </html>