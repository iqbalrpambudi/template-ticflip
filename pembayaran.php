<?php

include './pembayaranmodule/getdata.php';
include './components/header.php';
?>

<?php session_start();
if (isset($_SESSION['info'])) { ?>
    <!-- Toast -->
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000" style="position: absolute; bottom: 1rem; right: 1rem;">
        <div class="toast-header bg-danger">

            <strong class="mr-auto text-white">Notification</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            Pesanan Telah Dihapus
        </div>
    </div>
    <script>
        $('.toast').toast('show');
    </script>
<?php };
unset($_SESSION['info']); ?>
<!-- Item Checkout -->
<div class="container border vh-min-100 min-vh-100 rounded p-4 bg-white mt-5">
    <?php if ($get != null) { ?>
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="text-white">Pembayaran</h3>
            </div>
            <div class="row ">
                <div class="col-md-4">
                    <?php if ($get['id_tiket']) {
                    ?><img src="./assets/background/<?php echo $get['foto_tiket'] ?>" class="w-100" alt="...">
                    <?php
                    } else if ($get['id_tour']) {
                    ?><img src="./assets/background/<?php echo $get['foto_tour'] ?>" class="w-100" alt="..."><?php
                                                                                                            } ?>
                </div>
                <div class="col-md-8 px-3 mt-3">
                    <div class="card-block px-3">
                        <form action="./pembayaranmodule/doPay.php" method="POST">
                            <!-- Input Hidden -->
                            <input type="hidden" name="id" value="<?php echo $get['id_checkout']; ?>">
                            <input type="hidden" name="id_item" value="<?php if ($get['id_tiket']) {
                                                                            echo $get['id_tiket'];
                                                                        } else if ($get['id_tour']) {
                                                                            echo $get['id_tour'];
                                                                        } ?>">
                            <input type="hidden" name="harga" value="<?php if ($get['id_tiket']) {
                                                                            echo $get['harga_tiket'];
                                                                        } else if ($get['id_tour']) {
                                                                            echo $get['harga_tour'];
                                                                        } ?>" readonly>
                            <input type="hidden" name="item" value="<?php if ($get['id_tiket']) {
                                                                        echo $get['tiket'];
                                                                    } else if ($get['id_tour']) {
                                                                        echo $get['tour'];
                                                                    } ?>" readonly>
                            <input type="hidden" name="total" value="Rp. <?php if ($get['id_tiket']) {
                                                                                echo $get['harga_tiket'] * $get['jumlah'];
                                                                            } else if ($get['id_tour']) {
                                                                                echo $get['harga_tour'] * $get['jumlah'];
                                                                            } ?>" readonly>
                            <input type="hidden" name="jumlah" min="1" max="10" class="form-control" id="jumlah" value="<?php echo $get['jumlah']; ?>" readonly>

                            <!-- Tiket/Tour Display -->
                            <div class="form-group row">
                                <label for="tiket" class="col-sm-5 col-form-label"><?php if ($get['id_tiket']) {
                                                                                        echo 'Tiket';
                                                                                    } else if ($get['id_tour']) {
                                                                                        echo 'Paket';
                                                                                    } ?></label>
                                <div class="col-sm-7 font-weight-bold">:
                                    <?php if ($get['id_tiket']) {
                                        echo $get['tiket'];
                                    } else if ($get['id_tour']) {
                                        echo $get['tour'];
                                    } ?>
                                </div>
                            </div>

                            <!-- Harga Display -->
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Harga</label>
                                <div class="col-sm-7 font-weight-bold">: Rp.
                                    <?php if ($get['id_tiket']) {
                                        echo number_format($get['harga_tiket'], 0, ',', '.');
                                    } else if ($get['id_tour']) {
                                        echo number_format($get['harga_tour'], 0, ',', '.');
                                    } ?>
                                </div>
                            </div>

                            <!-- Jumlah Display -->
                            <div class="form-group row">
                                <label for="jumlah" class=" col-sm-5 col-form-label">Jumlah</label>
                                <div class="col-sm-7 font-weight-bold">:
                                    <?php echo $get['jumlah']; ?>
                                </div>
                            </div>


                            <!-- Total Display -->
                            <div class="form-group row">
                                <label for="total" class="col-sm-5 col-form-label">Total</label>
                                <div class="col-sm-7 font-weight-bold">: Rp.
                                    <?php if ($get['id_tiket']) {
                                        echo number_format($get['harga_tiket'] * $get['jumlah'], 0, ',', '.');
                                    } else if ($get['id_tour']) {
                                        echo number_format($get['harga_tour'] * $get['jumlah'], 0, ',', '.');
                                    } ?>
                                </div>
                            </div>


                            <!-- Pembayaran Display -->
                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-5 pt-0">Pembayaran</legend>
                                    <div class="col-sm-7">

                                        <select class="form-control form-control-sm" name="pembayaran" required>
                                            <option id="gopay" value="gopay">Gopay</option>
                                            <option id="bri" value="bri">BRI</option>
                                            <option id="bni" value="bni">BNI</option>
                                            <option id="bca" value="bca">BCA</option>
                                        </select>
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

                            <!-- Tukarkan Kode -->
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label"></label>
                                <div class="col-sm-7">
                                    <input type="checkbox" name="tukarpoin" id="total" value="5">
                                    <small>Tukarkan 200 poin untuk diskon 5%</small>
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="form-group row">
                                <div class="col-sm-12 text-right">
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
        <a href="homepage.php" class="btn btn-primary">Pesan</a>
    </div>
<?php } ?>
</div>
<?php include './components/footer.php'; ?>