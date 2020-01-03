<?php

include './pembayaranmodule/getdata.php';
include './components/header.php';
?>


<!-- Item Checkout -->
<div class="container border vh-100 min-vh-100 rounded p-5 bg-white mt-5">
    <h3 class="font-weight-bold">Pembayaran</h3>
    <?php if ($get != null) { ?>
        <div class="container border p-3 rounded my-2 bg-white">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mx-auto">
                        <img src="./assets/bali.jpg" class="card-img-top" alt="...">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <form action="./pembayaranmodule/doPay.php" method="POST">
                                <!-- Id -->
                                <input type="hidden" name="id" value="<?php echo $get['id_checkout']; ?>">
                                <input type="hidden" name="id_item" value="<?php if ($get['id_tiket']) {
                                                                                echo $get['id_tiket'];
                                                                            } else if ($get['id_tour']) {
                                                                                echo $get['id_tour'];
                                                                            } ?>">
                                <!-- Tiket -->
                                <div class="form-group row">
                                    <label for="tiket" class="col-sm-5 col-form-label"><?php if ($get['id_tiket']) {
                                                                                            echo 'Tiket';
                                                                                        } else if ($get['id_tour']) {
                                                                                            echo 'Paket';
                                                                                        } ?></label>
                                    <div class="col-sm-7">
                                        <input type="text" name="item" class="form-control" value="<?php if ($get['id_tiket']) {
                                                                                                        echo $get['tiket'];
                                                                                                    } else if ($get['id_tour']) {
                                                                                                        echo $get['tour'];
                                                                                                    } ?>" readonly>
                                    </div>
                                </div>

                                <!-- Jumlah -->
                                <div class="form-group row">
                                    <label for="jumlah" class="col-sm-5 col-form-label">Jumlah</label>
                                    <div class="col-sm-7">
                                        <input readonly type="number" name="jumlah" min="1" max="10" class="form-control" id="jumlah" value="<?php echo $get['jumlah']; ?>">
                                    </div>
                                </div>

                                <!-- Harga -->
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Harga</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="harga" class="form-control" value="<?php if ($get['id_tiket']) {
                                                                                                        echo $get['harga_tiket'];
                                                                                                    } else if ($get['id_tour']) {
                                                                                                        echo $get['harga_tour'];
                                                                                                    } ?>" readonly>
                                    </div>
                                </div>

                                <!-- Total -->
                                <div class="form-group row">
                                    <label for="total" class="col-sm-5 col-form-label">Total</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="total" id="total" value="Rp. <?php if ($get['id_tiket']) {
                                                                                                                        echo $get['harga_tiket'] * $get['jumlah'];
                                                                                                                    } else if ($get['id_tour']) {
                                                                                                                        echo $get['harga_tour'] * $get['jumlah'];
                                                                                                                    } ?>" readonly>
                                    </div>
                                </div>

                                <!-- Pembayaran -->
                                <fieldset class="form-group">
                                    <div class="row">
                                        <legend class="col-form-label col-sm-5 pt-0">Pembayaran</legend>
                                        <div class="col-sm-7">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pembayaran" id="gopay" value="Gopay" checked>
                                                <label class="form-check-label" for="gopay">
                                                    Gopay
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pembayaran" id="BNI" value="BNI">
                                                <label class="form-check-label" for="BNI">
                                                    BNI
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pembayaran" id="BRI" value="BRI">
                                                <label class="form-check-label" for="BRI">
                                                    BRI
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pembayaran" id="BCA" value="BCA">
                                                <label class="form-check-label" for="BCA">
                                                    BCA
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <!-- Promo -->
                                <div class="form-group row">
                                    <label for="promo" class="col-sm-5 col-form-label">Kode Promo</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="promo" id="total" value="<?php if (isset($_SESSION['kodepromo'])) {
                                                                                                                    echo $_SESSION['kodepromo'];
                                                                                                                } else {
                                                                                                                    echo '';
                                                                                                                } ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label"></label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" name="tukarpoin" id="total" value="5">
                                        <small>Tukarkan 200 poin untuk diskon 5%</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <hr>
                                        <button type="submit" name="submit" class="btn btn-success">Bayar</button>
                                        <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="container bg-light rounded p-5">
            <h1 class="display-4 font-weight-light">Tidak ada pembayaran</h1>
            <p class="lead">Pesanan kosong, yuk pesan sekarang disini</p>
            <a href="/homepage.php" class="btn btn-primary">Pesan</a>
        </div>
    <?php } ?>
</div>
<?php include './components/footer.php'; ?>