<?php foreach ($getUserTaxQuery as $tax) : ?>
    <div class="card bg-light mb-2">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <table class="table table-borderless">
                        <form action="./usermodule/rating.php" method="post">
                            <input type="hidden" class="form-control" name="id_item" value="<?php echo $tax['id_item']; ?>">
                            <tbody>
                                <tr>
                                    <th>Id Pembayaran<br></th>
                                    <td><input readonly type="text" class="form-control" name="id" value="<?php echo $tax['id_pembayaran']; ?>"></td>
                                </tr>
                                <tr>
                                    <th>Item</th>
                                    <td><input readonly type="text" class="form-control" name="item" value="<?php echo $tax['item']; ?>"></td>
                                </tr>
                                <tr>
                                    <th>Metode</th>
                                    <td><input readonly type="text" class="form-control" name="metode" value="<?php echo $tax['metode']; ?>"></td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td><input readonly type="date" class="form-control" name="tanggal" value="<?php echo $tax['tanggal']; ?>"></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>: <p class="badge <?php if ($tax['status'] == 'lunas') echo 'badge-success';
                                                            else echo 'badge-danger'; ?>"> <?php if ($tax['status'] == 'lunas') echo 'transaksi sukses';
                                                                                            else echo 'transaksi dibatalkan'; ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <?php  ?>
                                    <th>Rating</th>
                                    <td>
                                        <?php
                                        $user = $_SESSION['username'];
                                        $item = $tax['id_item'];
                                        $check = substr($item, 0, 2);
                                        if ($check == 'TC') {
                                            $cek = mysqli_query($conn, "SELECT * FROM `tb_rating` WHERE username = '$user' and id_tiket='$item'");
                                        } else {
                                            $cek = mysqli_query($conn, "SELECT * FROM `tb_rating` WHERE username = '$user' and id_tour='$item'");
                                        }
                                        $get = mysqli_fetch_assoc($cek);
                                        ?>
                                        <input type="number" min="0" max="5" class="form-control" name="rate" value="<?php echo (int) $get['rate'] ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input class="btn btn-success" type="submit" name="submit " value="Beri Rating">
                                        <a href="./laporan.php?id=<?php echo $tax['id_pembayaran']; ?>" class="btn btn-warning">Cetak PDF</a></td>
                                </tr>
                            </tbody>
                        </form>
                    </table>
                </div>
                <div class="col-md-4 text-center">
                    <!-- Qr Code Generator -->
                    <?php require_once "./qrcode/qrlib.php";
                    // Data QrCode
                    QRcode::png(
                        $tax['id_pembayaran'] . "\n"
                            . $tax['item'] . "\n"
                            . $tax['metode'] . "\n"
                            . $tax['tanggal'] . "\n"
                            . $tax['status'],
                        // Output QR Image
                        "./qr/" . $tax['id_pembayaran'] . "qr.png",
                        "L",
                        4,
                        4
                    );
                    ?>
                    <!-- Print Qr Code -->
                    <img src="<?php echo "./qr/" . $tax['id_pembayaran']; ?>qr.png" width="100px" />
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>