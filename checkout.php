<?php
include './components/header.php';
require_once './usermodule/koneksi.php';

$id = $_GET['id'];
$nama = $_GET['nama'];
$tanggal = $_GET['tanggal'];
$jumlah = $_GET['jumlah'];
$harga = $_GET['harga'];

$check = substr($id, 0, 2);
if ($check == 'TC') {
    $query = mysqli_query($conn, "SELECT foto from tb_tiket WHERE id_tiket='$id'");
    $foto = mysqli_fetch_assoc($query);
} else {
    $query = mysqli_query($conn, "SELECT foto from tb_tour WHERE id_tour='$id'");
    $foto = mysqli_fetch_assoc($query);
    $penginapan = $_GET['penginapan'];
    $kendaraan = $_GET['kendaraan'];

    $penginapanquery = mysqli_query($conn, "SELECT * from tb_penginapan where id_penginapan='$penginapan'");
    $kendaraanquery = mysqli_query($conn, "SELECT * from tb_kendaraan where id_kendaraan='$kendaraan'");

    $datapenginapan = mysqli_fetch_assoc($penginapanquery);
    $datakendaraan = mysqli_fetch_assoc($kendaraanquery);
}
?>


<!-- Item Checkout -->
<div class="container p-4 mt-5 vh-min-100">
    <div class="card">
        <div class="card-header bg-primary">
            <h4 class="text-white">Order</h4>
        </div>
        <div class="card-body">
            <form action="doCheckout.php" method="POST">

                <!-- Input Hidden -->
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <div class="container  p-3 rounded my-2 bg-white">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card mx-auto">
                                <?php if ($foto['foto']) { ?>
                                    <img src="./assets/background/<?php echo $foto['foto'] ?>" class="img-fluid " alt="...">
                                <?php } else { ?>
                                    <img src="./assets/bali.jpg" class="card-img-top " alt="...">
                                <?php }; ?>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h4><?php echo $nama; ?></h4>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <h6>Tanggal</h6>
                                    <input type="date" class="form-control" name="tanggal" placeholder="Tanggal" value="<?php echo $tanggal ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <h6>Jumlah</h6>
                                    <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah ?>">
                                </div>
                            </div>
                            <?php if ($check == 'TR') { ?>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <h6>Penginapan</h6>
                                        <?php if ($datapenginapan['nama'] != '') { ?>
                                            <input readonly type="hidden" class="form-control" name="penginapan" value="<?php echo $datapenginapan['nama']; ?>">
                                            <span class="lead font-weight-bold"><?php echo $datapenginapan['nama']; ?></span>
                                        <?php } else { ?>
                                            <input readonly type="hidden" class="form-control" name="penginapan" value="">
                                            <span class="lead font-weight-bold">-</span>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h6>Kendaraan</h6>
                                        <?php if ($datakendaraan['nama'] != '') { ?>
                                            <input readonly type="hidden" class="form-control" name="kendaraan" value="<?php echo $datakendaraan['nama']; ?>">
                                            <span class="lead font-weight-bold"><?php echo $datakendaraan['nama']; ?></span>
                                        <?php } else { ?>
                                            <input readonly type="hidden" class="form-control" name="kendaraan" value="">
                                            <span class="lead font-weight-bold">-</span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <hr>
                            <?php } ?>
                            <h6>Total</h6>
                            <input readonly type="hidden" name="total" class="form-control" value="<?php echo $harga * $jumlah ?>">
                            <span class="lead font-weight-bold">Rp <?php echo number_format($harga * $jumlah, 0, ',', '.'); ?></span>
                        </div>
                    </div>
                    <div class="container text-right">
                        <button type="submit" class="btn btn-success">Checkout</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>


<?php include './components/footer.php' ?>