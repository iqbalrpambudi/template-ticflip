    <!-- Import Header (Navbar) & Fungsi Module User -->
    <?php include './components/header.php';
    include './module/usermodule.php'
    ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mb-3 border rounded p-4 bg-white mx-2">

                <!-- Foto Profil User -->
                <div class="card">
                    <?php if (!$getUserData['foto']) { ?>
                        <img src="./assets/default.png" class="card-img-top " alt="...">
                    <?php } else { ?>
                        <img src="./assets/profile/<?php echo $getUserData['foto']; ?>" class="card-img-top " alt="...">
                    <?php }; ?>
                </div>

                <!-- Nama User -->
                <h3 class="card-title font-weight-bold text-dark text-center rounded p-2">
                    <?php echo $getUserData['nama']; ?>
                </h3>
                <h5 class="font-weight-light text-center p-2 text-warning">
                    <i class="fa fa-coins "></i> <?php echo $getUserData['poin']; ?> Poin
                </h5>
                <hr>
                <!-- Menu Tab Kiri -->
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="dashboard-tab" data-toggle="pill" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="true">Dashboard</a>
                    <a class="nav-link" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                    <a class="nav-link" id="keranjang-tab" data-toggle="pill" href="#keranjang" role="tab" aria-controls="keranjang" aria-selected="false">Keranjang</a>
                    <a class="nav-link" id="tagihan-tab" data-toggle="pill" href="#tagihan" role="tab" aria-controls="tagihan" aria-selected="false">Tagihan</a>
                    <a class="nav-link" id="history-tab" data-toggle="pill" href="#history" role="tab" aria-controls="history" aria-selected="false">History</a>
                </div>
            </div>
            <div class="col-md-7 border rounded p-4 bg-white">

                <!-- Item tab menu -->
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">Dashboard</div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h4>Profile</h4>
                        <hr>
                        <?php require_once "./module/profile.php" ?>
                    </div>
                    <div class="tab-pane fade" id="tagihan" role="tabpanel" aria-labelledby="tagihan-tab">
                        <h4>Tagihan</h4>
                        <hr>
                        <?php require_once "./module/tagihan.php" ?>
                    </div>
                    <div class="tab-pane fade" id="keranjang" role="tabpanel" aria-labelledby="keranjang-tab">
                        <h4>Keranjang</h4>
                        <hr>
                        <?php require_once "./module/keranjang.php" ?>
                    </div>
                    <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                        <h4>History Pembayaran</h4>
                        <hr>
                        <?php require_once "./module/history.php" ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include './components/footer.php' ?>