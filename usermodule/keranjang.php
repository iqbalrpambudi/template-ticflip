<?php foreach ($getCheckoutQuery as $get) : ?>
    <div class="card bg-light mb-2">
        <div class="card-body">

            <!-- Form Tiket -->
            <form action="./usermodule/doPay.php" method="POST">
                <!-- Id -->
                <input type="hidden" name="id" value="<?php echo $get['id_checkout']; ?>">
                <input type="hidden" name="id_item" value="<?php if ($get['id_tiket']) {
                                                                    echo $get['id_tiket'];
                                                                } else if ($get['id_tour']) {
                                                                    echo $get['id_tour'];
                                                                } ?>">
                <!-- Tiket -->
                <div class="form-group row">
                    <label for="tiket" class="col-sm-3 col-form-label"><?php if ($get['id_tiket']) {
                                                                                echo 'Tiket';
                                                                            } else if ($get['id_tour']) {
                                                                                echo 'Paket';
                                                                            } ?></label>
                    <div class="col-sm-9">
                        <input type="text" name="item" class="form-control" value="<?php if ($get['id_tiket']) {
                                                                                            echo $get['tiket'];
                                                                                        } else if ($get['id_tour']) {
                                                                                            echo $get['tour'];
                                                                                        } ?>" readonly>
                    </div>
                </div>

                <!-- Jumlah -->
                <div class="form-group row">
                    <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                    <div class="col-sm-9">
                        <input type="number" name="jumlah" min="1" max="10" class="form-control" id="jumlah" value="<?php echo $get['jumlah']; ?>">
                    </div>
                </div>

                <!-- Harga -->
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Harga</label>
                    <div class="col-sm-9">
                        <input type="text" name="harga" class="form-control" value="<?php if ($get['id_tiket']) {
                                                                                            echo $get['harga_tiket'];
                                                                                        } else if ($get['id_tour']) {
                                                                                            echo $get['harga_tour'];
                                                                                        } ?>" readonly>
                    </div>
                </div>

                <!-- Total -->
                <div class="form-group row">
                    <label for="total" class="col-sm-3 col-form-label">Total</label>
                    <div class="col-sm-9">
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
                        <legend class="col-form-label col-sm-3 pt-0">Pembayaran</legend>
                        <div class="col-sm-9">
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
<?php endforeach; ?>