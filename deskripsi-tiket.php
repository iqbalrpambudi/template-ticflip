<?php include './components/header.php';
include './deskripsimodule/getdata.php' ?>

<!-- Daftar Paket --> 
<div class="container mt-5">
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
                        <div class="card">
                                <?php if (!$datatiket['foto']) { ?>
                                    <img src="./assets/bali.jpg" class="card-img-top " alt="...">
                                <?php } else { ?>
                                <img src="./assets/background/<?php echo $datatiket['foto']; ?>" class="card-img-top " alt="...">
                                <?php }; ?>
                            </div>
                    </div>
                </div>
            </a>
            <h3 class="card-title font-weight-bold text-dark text-center bg-warning rounded p-2">
                Rp <?php
                    echo number_format($datatiket["harga"], 0, ',', '.');
                    ?>
            </h3>
            <div class="row mt-3 p-2">
                <div class="col-lg-12">
                    <form action="checkout.php" method="get">
                        <input type="hidden" name="id" value="<?php echo $datatiket["id_tiket"]; ?>">
                        <input type="hidden" name="nama" value="<?php echo $datatiket["nama"]; ?>">
                        <input type="hidden" name="harga" value="<?php echo $datatiket["harga"]; ?>">
                        <h5 class="mt-2">Pilih Tanggal</h5>
                        <input required type="date" name="tanggal" class="form-control">
                        <h5 class="mt-2">Jumlah Tiket</h5>
                        <input required type="number" min="1" max="10" name="jumlah" class="form-control">
                        <button type="submit" class=" mt-3 btn btn-success">Order</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7 border rounded p-4 bg-white">
            <div class="container p-2">
                <?php
                echo $datatiket["deskripsi"];
                ?>
            </div>
        </div>
    </div>
</div>
<?php include './components/footer.php'; ?>