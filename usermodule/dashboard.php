<div class="row">
    <div class="col-lg-6">
        <div class="card text-white <?php if (mysqli_num_rows($checktax)) echo 'bg-danger';
                                    else echo 'bg-success'; ?> mb-3" style="max-width: 18rem;">
            <div class="card-header font-weight-bold">Tagihan</div>
            <div class="card-body">
                <p class="card-title"><?php $row = mysqli_num_rows($checktax);
                                        if (!$row) {
                                            echo 'Tidak Ada Tagihan';
                                        } else {
                                            echo $row . ' Tagihan belum lunas';
                                        }; ?></p>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
            <div class="card-header font-weight-bold">Keranjang</div>
            <div class="card-body">
                <p class="card-title"><?php $row = mysqli_num_rows($checkcart);
                                        if (!$row) {
                                            echo 'Tidak Ada Tagihan';
                                        } else {
                                            echo 'Ada ' . $row . ' item di keranjang';
                                        }; ?></p>
            </div>
        </div>
    </div>
</div>