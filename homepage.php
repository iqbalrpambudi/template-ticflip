<?php include './components/header.php';
include './homepagemodule/getdata.php'; ?>

<!-- Jumbotron -->
<div class="jumbotron" style="margin-top:50px;
        margin-bottom:0;
            height: 350px;
            background-image: url('./assets/hero.jpg');
            background-position:center;
            background-repeat: no-repeat;">
    <div class="container">
        <h1 class="display-4 mt-5 text-light">Pesan Sekarang</h1>
        <p class="lead text-light">Dapatkan promo menarik dengan memasukan kode promo</p>
    </div>
</div>


<!-- Daftar Paket -->
<div class="container border rounded py-5 px-5 bg-white mt-5">
    <h3 class="font-weight-bold">Pilihan Paket Tour</h3>
    <div class="row">
        <?php foreach ($tourQuery as $datas) : ?>
            <div class="col-md-4">
                <a href="deskripsi.php?id=<?php echo $datas['id_tour'] ?>">
                    <div class="card mx-auto mb-3">
                        <div class="card-img-caption">
                            <h3 class="card-text text-light"><?php echo $datas['nama']; ?></h3>
                            <img class="card-img-top" src="./assets/bali.jpg" alt="Card image cap">
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include './components/footer.php'; ?>