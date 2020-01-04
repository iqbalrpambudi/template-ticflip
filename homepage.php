<?php
include './components/header.php';
include './homepagemodule/getdata.php';
require './homepagemodule/HitCounter.php'; ?>


<!-- Jumbotron -->
<div class="container-fluid bg-white">
    <div class="row px-5 mx-5">
        <div class="col-lg-6 pt-5">
            <h2 class="display-4 mt-5">Pesan Sekarang</h2>
            <p class="lead">Dapatkan promo menarik dengan memasukan kode promo</p>
            <a href="./homepagemodule/promomodule.php" class="btn btn-primary">Gunakan Promo</a>
            <?php session_start();
            if (isset($_SESSION['promo'])) { ?>
                <h5 class="alert alert-success mt-3">Selamat! promo diskon <?php echo $_SESSION['promo']; ?>% sudah dimasukan</h5>
            <?php
            } ?>
        </div>
        <div class="col-lg-6 text-center">
            <img src="./assets/vacation.png" class="img-fluid" style="max-width: 90%">
        </div>
    </div>

    <!-- Search -->

</div>
<div class="container-fluid">
    <div class="row px-5 mx-5" style="margin-top: 100px">
        <div class="col-lg-6 align-item-center">
            <h2 class="display-4 mt-5">Cari Tiketmu disini</h2>
            <p class="lead">Beragam tiket plihan</p>
        </div>
        <div class="col-lg-6">
            <form action="./search.php" method="POST" class="navbar-form navbar-right" role="search">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari tiket/tour">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>

                <!-- Filter Min -->
                <h6 class="mt-3">Filter</h6>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Max</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="max">
                                <option value="0" selected>Choose...</option>
                                <option value="500000">500000</option>
                                <option value="1000000">1000000</option>
                                <option value="2000000">2000000</option>
                            </select>
                        </div>
                    </div>
                    <!-- Filter Max -->
                    <div class="col-lg-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Min</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="min">
                                <option value="0" selected>Choose...</option>
                                <option value="50000">Rp.50.000</option>
                                <option value="100000">Rp.100.000</option>
                                <option value="200000">Rp.200.000</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-success">Search</button>
            </form>
        </div>
    </div>
</div>

<!-- Daftar Paket -->
<div class=" container border rounded py-5 px-5 bg-white" style="margin-top: 100px">
    <h5 class="font-weight-bold">Pilihan Paket</h5>
    <div class="row">
        <?php foreach ($tourQuery as $datas) : ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="deskripsi-tour.php?id=<?php echo $datas['id_tour'] ?>" style="text-decoration: none">
                    <div class="card mx-auto" style="max-height: 140px">
                        <div class="card-img-caption">
                            <!-- Card Text -->
                            <h5 class="card-text text-light"><?php echo $datas['nama']; ?></h5>
                            <!-- Card Rating -->
                            <span class="card-rating"><?php $id = $datas['id_tour'];
                                                        $tourRate = mysqli_query($conn, "SELECT AVG(rate) as avg FROM tb_rating where id_tour='$id'");
                                                        $rating = mysqli_fetch_assoc($tourRate);
                                                        for ($i = 0; $i < ceil($rating['avg']); $i++) {
                                                            echo '<i class="fa fa-star text-warning"></i>';
                                                        }
                                                        ?></span>
                            <!-- gambar -->
                            <?php if ($datas['foto']) { ?>
                                <img src="./assets/background/<?php echo $datas['foto'] ?>" class="card-img-top " alt="...">
                            <?php } else { ?>
                                <img src="./assets/bali.jpg" class="card-img-top " alt="...">
                            <?php }; ?>
                        </div>
                    </div>

                </a>
            </div>
        <?php endforeach; ?>
    </div>

    <h5 class="font-weight-bold mt-5">Pilihan Tiket</h5>
    <div class="row">
        <?php foreach ($tiketQuery as $data) : ?>
            <div class="col-lg-3">
                <a href="deskripsi-tiket.php?id=<?php echo $data['id_tiket'] ?>">
                    <div class="card mx-auto mb-3" style="max-height: 140px">
                        <div class="card-img-caption">
                            <h5 class="card-text text-light"><?php echo $data['nama']; ?></h5>
                            <span class="card-rating"><?php $id = $data['id_tiket'];
                                                        $ticketRate = mysqli_query($conn, "SELECT AVG(rate) as avg FROM tb_rating where id_tiket='$id'");
                                                        $rating = mysqli_fetch_assoc($ticketRate);
                                                        for ($i = 0; $i < ceil($rating['avg']); $i++) {
                                                            echo '<i class="fa fa-star text-warning"></i>';
                                                        }
                                                        ?></span>
                            <?php if ($data['foto']) { ?>
                                <img src="./assets/background/<?php echo $data['foto'] ?>" class="card-img-top " alt="...">
                            <?php } else { ?>
                                <img src="./assets/bali.jpg" class="card-img-top " alt="...">
                            <?php }; ?>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="container-fluid" style="margin-top:100px;margin-bottom:100px">
    <h2 class="text-center display-4 font-weight-normal">Mengapa memilih Ticflip?</h2>
    <div class="row text-center mt-5 pt-5">
        <div class="col">
            <i class="fa fa-users fa-4x"></i>
            <h5 class="card-title font-weight-light">Ticflip telah dikunjungi sebanyak</h5>
            <p class="card-text display-3"><?php echo $tolcount2; ?></p>
        </div>
        <div class="col">
            <i class="fas fa-shopping-cart fa-4x"></i>
            <h5 class="card-title font-weight-light">Ticflip telah dipesan sebanyak</h5>
            <p class="card-text display-3"><?php echo $ordercounter['ordercount'] ?></p>
        </div>
    </div>
</div>
<?php include './components/footer.php'; ?>