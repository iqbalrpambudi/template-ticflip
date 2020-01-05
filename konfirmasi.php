<?php
session_start();
$username = $_SESSION['username'];
session_abort();
$conn = mysqli_connect('localhost', 'root', '', 'ticflip');
$getData = mysqli_query($conn, "SELECT * from tb_pembayaran where status='belum lunas'");
$query = mysqli_query($conn, "SELECT tb_pembayaran.*,tb_checkout.jumlah, tb_checkout.total FROM tb_pembayaran JOIN tb_checkout ON tb_pembayaran.id_checkout=tb_checkout.id_checkout WHERE tb_pembayaran.status='belum lunas' and konfirmasi=0 and tb_pembayaran.username='$username'");
$data = mysqli_fetch_assoc($query);
include './components/header.php';
?>



<!-- Item Checkout -->
<div class="container border rounded p-5 bg-white">
    <h3 class="font-weight-bold">Konfirmasi Pembayaran</h3>


    <!----- Form Item -------->
    <div class="container p-2 rounded my-2 bg-white">
        <h6>Silahkan selesaikan dahulu pembayaran berikut ini</h6>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID Pembayaran</th>
                    <th><?php echo $data['id_pembayaran'] ?></th>
                </tr>
                <tr>
                    <th>Nama Pengirim</th>
                    <th><?php echo $data['username'] ?></th>
                </tr>
                <tr>
                    <th>Paket</th>
                    <th><?php echo $data['item'] ?></th>
                </tr>
                <tr>
                    <th>Nominal Transfer</th>
                    <th>Rp. <?php echo number_format($data["total"], 0, ',', '.');
                            ?></th>
                </tr>
                <tr>
                    <th>Metode Pembayaran<?php if ($data['metode'] == 'gopay') {
                                                echo 'Transfer via Gopay';
                                            } elseif (strtolower($data['metode']) == 'bni' || strtolower($data['metode']) == 'bri' || strtolower($data['metode']) == 'bca') {
                                                echo 'Transfer Bank';
                                            } ?>
                    </th>
                    <th>
                        <?php if (strtolower($data['metode']) == 'gopay') {
                            echo '+62856552341';
                        } elseif (strtolower($data['metode']) == 'bni') {
                            echo 'BNI - 09181623';
                        } elseif (strtolower($data['metode']) == 'bri') {
                            echo 'BRI - 62-234-2342-32';
                        } elseif (strtolower($data['metode']) == 'bca') {
                            echo 'BCA - 123456-778';
                        } ?>
                    </th>
                </tr>
                <tr>
                    <th>Tanggal Pesan</th>
                    </th>
                    <th><?php echo date('d F Y | h:m:s', strtotime($data['tanggal'])); ?></th>
                </tr>
                <tr>
                    <th>Batas Waktu Pembayaran</th>
                    <th>
                        <?php
                        $diff = date('Y-m-d', strtotime('+1 days', strtotime($data['tanggal'])));
                        echo date('d F Y | h:m:s', strtotime($diff));;
                        ?>
                    </th>
                <tr>
                    <th> Time Limit</th>
                    <th>
                        <div id='tampilkan'></div>
                    </th>
                </tr>
                </tr>
            </thead>
        </table>

        <table class="table">
            <tr>
                <div class="col-md 8">
                    <h6>INFO :</h6>
                </div>
                <ul>
                    <li>Form ini diisi setelah anda melakukan Pembayaran.</li>
                    <li>Issued Ticket tanpa melakukan transfer terlebih dahulu tidak bisa diproses.</li>
                    <li>Konfirmasi pembayaran minimal 1 jam sebelum Batas Waktu Pembayaran.</li>
                    <li>Konfirmasi Pembayaran yang anda kirimkan akan kamu anggap BENAR dan TIKET akan kami ISSUED.</li>

                </ul>
                <p class="col-md 8">
                    <input required type="checkbox" name="konfirmasi" value="konfirmasi"> Apakah Tiket yang anda bayar sudah sesuai pesanan?
                    Jika anda klik "Kirim Konfirmasi Pembayaran" kesalahan pada Pesanan setelah proses Issued bukan tangung jawab kami.
                </p>
            </tr>
        </table>
    </div>
    <form method="POST" action="./usermodule/doConfirm.php">
        <input type="hidden" name="id" value="<?php echo $data['id_pembayaran'] ?>">
        <div class="container text-right">
            <button type="submit" name="submit" class="btn btn-success">Konfirmasi Pembayaran</button>
            <a href="user.php" class="btn btn-warning">Bayar Nanti</a>
        </div>
    </form>
</div>
</div>

<!-- Time  -->
<script type='text/javascript' src='http://code.jquery.com/jquery-1.10.2.min.js'></script>
<script type='text/javascript' src='menit-detik-mundur.js'></script>
<script>
    $(document).ready(function() {
        var detik = 4;
        var menit = 0;
        var jam = 24;

        function hitung() {
            setTimeout(hitung, 1000);
            $('#tampilkan').html(jam + 'jam ' + menit + ' menit ' + detik + ' detik ');
            detik--;
            if (detik < 0) {
                detik = 59;
                menit--;
                if (menit < 0) {
                    menit = 59;
                    detik = 59;
                    jam--;
                }
            }
        }
        hitung();
    });
</script>
<?php include './components/footer.php' ?>