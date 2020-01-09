<?php
// Include module admin
include '../admin/adminmodule.php';
// include header admin termasuk navbar & sidebar
include '../components/header-admin.php';
?>

<div class="col-md-10 p-5 pt-2">
  <h3><i class="fa fa-credit-card mr-2" aria-hidden="true"></i> DAFTAR PEMBAYARAN</h3>
  <hr>

  <table class="table table-striped table-bordered">
    <thead>
      <tr class="text-center">
        <th scope="col">No</th>
        <th scope="col">ID PEMBAYARAN</th>
        <th scope="col">ID CHECKOUT</th>
        <th scope="col">USERNAME</th>
        <th scope="col">ITEM</th>
        <th scope="col">TANGGAL</th>
        <th scope="col">STATUS</th>
      </tr>
    </thead>
    <tbody>
      <?php
      //query ke database SELECT tabel user urut berdasarkan id yang paling besar
      $query = mysqli_query($connect, "SELECT * FROM tb_pembayaran ORDER BY id_pembayaran ASC") or die(mysqli_error($connect));
      //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
      if (mysqli_num_rows($query) > 0) {
        //membuat variabel $no untuk menyimpan nomor urut
        $no = 1;
        //melakukan perulangan while dengan dari dari query $sql
        while ($data = mysqli_fetch_assoc($query)) {
          //menampilkan data perulangan
          echo '
                        <tr class="text-center">
                          <td>' . $no . '</td>
                          <td>' . $data['id_pembayaran'] . '</td>
                          <td>' . $data['id_checkout'] . '</td>
                          <td>' . $data['username'] . '</td>
                          <td>' . $data['item'] . '</td>
                          <td>' . $data['tanggal'] . '</td>
                          <td>' . $data['status'] . ' </td>
                          <td> <a class="badge bagde-success" href="konfirmasi.php?id=' . $data['id_pembayaran'] . '">Konfirmasi</a> </td>
                        </tr>
                        ';
          $no++;
        }
        //jika query menghasilkan nilai 0
      } else {
        echo '
                      <tr>
                        <td colspan="6">Tidak ada data.</td>
                      </tr>
                      ';
      }
      ?>
    </tbody>
  </table>
</div>
</div>

<!-- Footer -->
<?php include '../components/footer-admin.php'; ?>