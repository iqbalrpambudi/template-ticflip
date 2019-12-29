<?php
$id = $_GET['id'];
$nama = $_GET['nama'];
$tanggal = $_GET['tanggal'];
$jumlah = $_GET['jumlah'];
$harga = $_GET['harga'];

include './components/header.php';
?>


<!-- Item Checkout -->
<div class="container border rounded p-4 bg-white mt-5 vh-100">
    <h3 class="font-weight-bold">Order</h3>
    <hr>
    <form action="doCheckout.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <div class="container  p-3 rounded my-2 bg-white">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mx-auto">
                        <img src="./assets/bali.jpg" class="card-img-top" alt="...">
                    </div>
                </div>
                <div class="col-md-8">
                    <h4><?php echo $nama; ?></h4>
                    <hr>
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
    <hr>
</div>
</div>


<?php include './components/footer.php' ?>