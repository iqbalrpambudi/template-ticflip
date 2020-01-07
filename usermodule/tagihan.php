<?php foreach ($getUserPaidTaxQuery as $paid) : ?>
    <div class="card bg-light mb-2">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="./usermodule/doConfirm.php" method="post">
                        <table class="table table-borderless">
                            <tr>
                                <th>Id Pembayaran<br></th>
                                <td><input type="text" name="id" class="form-control" value="<?php echo $paid['id_pembayaran']; ?>" readonly></td>
                            </tr>
                            <tr>
                                <th>Item</th>
                                <td><input type="text" name="item" class="form-control" value="<?php echo $paid['item']; ?>" readonly></td>
                            </tr>
                            <tr>
                                <th>Qty</small></th>
                                <td><input type="text" name="jumlah" class="form-control" value="<?php echo $paid['jumlah']; ?>" readonly></td>
                            </tr>
                            <tr>
                                <th>Total</small></th>
                                <td><input type="text" name="total" class="form-control" value="Rp. <?php echo number_format($paid['total'], 0, ',', '.'); ?>" readonly></td>
                            </tr>
                            <tr>
                                <th>Metode</small></th>
                                <td><input type="text" name="metode" class="form-control" value="<?php echo $paid['metode']; ?>" readonly></td>
                            </tr>
                            <tr>
                                <th>Tanggal</small></th>
                                <td><input type="text" name="tanggal" class="form-control" value="<?php echo $paid['tanggal']; ?>" readonly></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td><input type="text" name="status" class="form-control text-danger" value="<?php echo $paid['status']; ?>" readonly></span></td>
                            </tr>
                        </table>
                        <hr>
                        <?php if (strtolower($paid['metode']) == 'bni') {
                            echo "<p class='alert alert-success'>Silahkan melakukan pembayaran ke rekening " . $paid['metode'] . " <span class='font-weight-bold'>5555-01-111122-55-8</span></p>";
                        } elseif (strtolower($paid['metode']) == 'bri') {
                            echo "<p class='alert alert-success'>Silahkan melakukan pembayaran ke rekening " . $paid['metode'] . " <span class='font-weight-bold'>345710400</span></p>";
                        } elseif (strtolower($paid['metode']) == 'bca') {
                            echo "<p class='alert alert-success'>Silahkan melakukan pembayaran ke rekening " . $paid['metode'] . " <span class='font-weight-bold'>0373115250</span></p>";
                        } elseif (strtolower($paid['metode']) == 'gopay') {
                            echo "<p class='alert alert-success'>Silahkan melakukan pembayaran ke nomor " . $paid['metode'] . " <span class='font-weight-bold'>085655638843</span></p>";
                        }
                        ?>
                        <button type="submit" name="submit" class="btn btn-success">Konfirmasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>