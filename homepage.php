<?php include './components/header.php';
include './homepagemodule/getdata.php';
?>


<!-- Jumbotron -->
<div class="jumbotron" style="
        margin-bottom:0;
            height: 350px;
            background-image: url('./assets/hero.jpg');
            background-position:center;
            background-repeat: no-repeat;">
    <div class="container">
        <h1 class="display-4 mt-5 text-light">Pesan Sekarang</h1>
        <p class="lead text-light">Dapatkan promo menarik dengan memasukan kode promo</p>
        <a href="/homepagemodule/promomodule.php" class="btn btn-primary">Gunakan Promo</a>
    </div>
</div>
<?php session_start();
if (isset($_SESSION['promo'])) { ?>
    <h5 class="alert alert-success mt-3 mx-3">Selamat! promo diskon <?php echo $_SESSION['promo']; ?>% sudah dimasukan</h5>
<?php unset($_SESSION['promo']);
} ?>
<!-- Daftar Paket -->
<div class=" container border rounded py-5 px-5 bg-white mt-3">
    <h5 class="font-weight-bold">Pilihan Paket</h5>
    <div class="row">
        <?php foreach ($tourQuery as $datas) : ?>
            <div class="col-lg-3">
                <a href="deskripsi-tour.php?id=<?php echo $datas['id_tour'] ?>">
                    <div class="card mx-auto mb-3">
                        <div class="card-img-caption">
                            <h5 class="card-text text-light"><?php echo $datas['nama']; ?></h5>
                            <img class="card-img-top" src="./assets/bali.jpg" alt="Card image cap">
                        </div>
                        <h6 class="text-dark ml-2 mt-2">Rating</h6><span class="card-rating ml-2"><?php $id = $datas['id_tour'];
                                                                                                        $tourRate = mysqli_query($conn, "SELECT AVG(rate) as avg FROM tb_rating where id_tour='$id'");
                                                                                                        $rating = mysqli_fetch_assoc($tourRate);
                                                                                                        for ($i = 0; $i < ceil($rating['avg']); $i++) {
                                                                                                            echo '<i class="fa fa-star text-warning"></i>';
                                                                                                        }
                                                                                                        ?></span>
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
                    <div class="card mx-auto mb-3">
                        <div class="card-img-caption">
                            <h5 class="card-text text-light"><?php echo $data['nama']; ?></h5>
                            <span class="card-rating"><?php $id = $data['id_tiket'];
                                                            $ticketRate = mysqli_query($conn, "SELECT AVG(rate) as avg FROM tb_rating where id_tiket='$id'");
                                                            $rating = mysqli_fetch_assoc($ticketRate);
                                                            for ($i = 0; $i < ceil($rating['avg']); $i++) {
                                                                echo '<i class="fa fa-star text-warning"></i>';
                                                            }
                                                            ?></span>
                            <img class="card-img-top" src="./assets/bali.jpg" alt="Card image cap">
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include './components/footer.php'; ?>