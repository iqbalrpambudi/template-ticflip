<?php include './components/header.php';
include './deskripsimodule/getdata.php' ?>

<!-- Daftar Paket -->
<div class="container mt-5 vh-100">
    <div class="row">
        <div class="col-md-4 mb-3 border rounded p-4 bg-white mx-2">
            <a href="#">
                <div class="card mx-auto mb-3">
                    <div class="card-img-caption">
                        <h3 class="card-text text-light">
                            <?php
                            echo $datatiket["nama"];
                            ?>
                        </h3>
                        <img class="card-img-top" src="./assets/bali.jpg" alt="Card image cap">
                    </div>
                </div>
            </a>
            <h3 class="card-title font-weight-bold text-dark text-center bg-warning rounded p-2">
                Rp <?php
                    echo number_format($datatiket["harga"], 0, ',', '.');
                    ?>
            </h3>
        </div>
        <div class="col-md-7 border rounded p-4 bg-white">
            <li class="list-group-item borderless bg-transparent">
                <?php
                echo $datatiket["deskripsi"];
                ?>
            </li>
            <div class="container">
                <div class="float-left p-2 ">
                    <h5>Pilih Tanggal</h5>
                    <input type="date" name="tanggal" id="tanggal" class="form-control">
                </div>
                <div class="float-right p-5">
                    <a href="#" class="btn btn-secondary">
                        Order
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './components/footer.php'; ?>