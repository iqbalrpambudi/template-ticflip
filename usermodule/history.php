<?php foreach ($getUserTaxQuery as $tax) : ?>
    <div class="card bg-light mb-2">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>Id Pembayaran<br></th>
                                <td>: <?php echo $tax['id_pembayaran']; ?></td>
                            </tr>
                            <tr>
                                <th>Item</th>
                                <td>: <?php echo $tax['item']; ?></td>
                            </tr>
                            <tr>
                                <th>Metode</th>
                                <td>: <?php echo $tax['metode']; ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td>: <?php echo $tax['tanggal']; ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>: <p class="badge <?php if ($tax['status'] == 'lunas') echo 'badge-success';
                                                            else echo 'badge-danger'; ?>"> <?php echo $tax['status']; ?></p>
                                </td>
                            </tr>
                        </tbody>
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
                    <img src="<?php echo "/qr/" . $tax['id_pembayaran']; ?>qr.png" width="100px" />
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>