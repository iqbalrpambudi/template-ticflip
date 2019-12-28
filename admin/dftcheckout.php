<?php
// Include module admin
include '../admin/adminmodule.php';
// include header admin termasuk navbar & sidebar
include '../components/header-admin.php';
?>

<div class="col-md-10 p-5 pt-2">
  <h3><i class="fa fa-shopping-cart mr-2" aria-hidden="true"></i> DAFTAR CHECKOUT</h3>
  <hr>

  <table class="table table-striped table-bordered">
    <thead>
      <tr class="text-center">
        <th scope="col">NO</th>
        <th scope="col">ID CHECKOUT</th>
        <th scope="col">ID TIKET</th>
        <th scope="col">ID TOUR</th>
        <th scope="col">USERNAME</th>
        <th scope="col">JUMLAH</th>
        <th scope="col">TOTAL</th>
        <th scope="col">TANGGAL</th>
      </tr>
    </thead>
    <tbody>
      <?php
      //query ke database SELECT tabel user urut berdasarkan id yang paling besar
      $query = mysqli_query($connect, "SELECT * FROM tb_checkout ORDER BY id_checkout ASC") or die(mysqli_error($connect));
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
                          <td>' . $data['id_checkout'] . '</td>
                          <td>' . $data['id_tiket'] . '</td>
                          <td>' . $data['id_tour'] . '</td>
                          <td>' . $data['username'] . '</td>
                          <td>' . $data['jumlah'] . '</td>
                          <td>' . $data['total'] . '</td>
                          <td>' . $data['tanggal'] . '</td>
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