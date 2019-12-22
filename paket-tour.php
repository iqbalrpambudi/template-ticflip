<?php include './components/header.php';
include './pakettourmodule/getdata.php' ?>
<!-- Daftar Paket -->
<div class="container border rounded py-5 px-5 bg-white mt-5 vh-100">
    <h5 class="font-weight-bold">Pilihan Paket Tour</h5>
    <div class="row">
        <?php foreach ($tourquery as $data) { ?>

            <!-- Card -->
            <div class="col-md-3">
                <a href="deskripsi-tour.php?id=<?php echo $data['id_tour'] ?>">
                    <div class="card mx-auto mb-3">
                        <div class="card-img-caption">
                            <h5 class="card-text text-light"><?php echo $data['nama'] ?></h5>
                            <img class="card-img-top" src="./assets/bali.jpg" alt="Card image cap">
                        </div>
                    </div>
                </a>
            </div>
        <?php  }; ?>
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
<script src="./jquery/jquery.min.js"></script>
<script src=" ./bootstrap/js/bootstrap.min.js"> </script>
</body>

</html>