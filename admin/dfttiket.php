<?php
// Include module admin
include '../admin/adminmodule.php';
// include header admin termasuk navbar & sidebar
include '../components/header-admin.php';
?>

<div class="col-md-10 p-5 pt-2">
  <h3><i class="fas fa-ticket-alt mr-2"></i> DAFTAR TIKET</h3>
  <hr>

  <a href="tambahtiket.php" name="submit" class="btn btn-primary mb-3"><i class="fas fa-plus-square mr-2"></i>TAMBAH DATA TIKET</a>
  <table class="table table-striped table-bordered">
    <thead>
      <tr class="text-center">
        <th scope="col">NO</th>
        <th scope="col">ID TIKET</th>
        <th scope="col">NAMA TIKET</th>
        <th scope="col">DESKRIPSI</th>
        <th scope="col">HARGA</th>
        <th colspan="3" scope="col">AKSI</th>
      </tr>
    </thead>
    <tbody>
      <?php
      //query ke database SELECT tabel user urut berdasarkan id yang paling besar
      $query = mysqli_query($connect, "SELECT * FROM tb_tiket ORDER BY id_tiket ASC") or die(mysqli_error($connect));
      //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
      if (mysqli_num_rows($query) > 0) {
        //membuat variabel $no untuk menyimpan nomor urut
        $no = 1;
        //melakukan perulangan while dengan dari dari query $sql
        while ($data = mysqli_fetch_assoc($query)) {
          //menampilkan data perulangan
          echo '
                        <tr>
                          <td>' . $no . '</td>
                          <td>' . $data['id_tiket'] . '</td>
                          <td>' . $data['nama'] . '</td>
                          <td>' . $data['deskripsi'] . '</td>
                          <td>' . $data['harga'] . '</td>
                          <td>
                            <a href="edittiket.php?id_tiket=' . $data['id_tiket'] . '" class="badge badge-warning">Edit</a>
                            <a href="deletetiket.php?id_tiket=' . $data['id_tiket'] . '" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
                          </td>
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