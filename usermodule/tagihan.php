<?php foreach ($getUserPaidTaxQuery as $paid) : ?>
    <div class="card bg-light mb-2">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-borderless">
                        <tr>
                            <th>Id Pembayaran<br></th>
                            <td>: <?php echo $paid['id_pembayaran']; ?></small></td>
                        </tr>
                        <tr>
                            <th>Item</th>
                            <td>: <?php echo $paid['item']; ?></td>
                        </tr>
                        <tr>
                            <th>Qty</small></th>
                            <td>: <?php echo $paid['jumlah']; ?></td>
                        </tr>
                        <tr>
                            <th>Total</small></th>
                            <td>: Rp.<?php echo $paid['total']; ?></td>
                        </tr>
                        <tr>
                            <th>Metode</small></th>
                            <td>: <?php echo $paid['metode']; ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal</small></th>
                            <td>: <?php echo $paid['tanggal']; ?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>: <span class="badge badge-danger"> <?php echo $paid['status']; ?></span></td>
                        </tr>
                    </table>
                    <hr>
                    <?php if ($paid['metode'] == 'BNI') {
                            echo "<p class='alert alert-success'>Silahkan melakukan pembayaran ke rekening " . $paid['metode'] . " <span class='font-weight-bold'>5555-01-111122-55-8</span></p>";
                        } elseif ($paid['metode'] == 'BRI') {
                            echo "<p class='alert alert-success'>Silahkan melakukan pembayaran ke rekening " . $paid['metode'] . " <span class='font-weight-bold'>345710400</span></p>";
                        } elseif ($paid['metode'] == 'BCA') {
                            echo "<p class='alert alert-success'>Silahkan melakukan pembayaran ke rekening " . $paid['metode'] . " <span class='font-weight-bold'>0373115250</span></p>";
                        } ?>
                    <button class="btn btn-success">Konfirmasi</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>