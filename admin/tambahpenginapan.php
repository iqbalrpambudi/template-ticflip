<?php
// Include module admin
include '../admin/adminmodule.php';
// include header admin termasuk navbar & sidebar
include '../components/header-admin.php';
?>

<div class="col-md-10 p-5 pt-2">
  <h3><i class="fa fa-bed mr-2" aria-hidden="true"></i> TAMBAH PENGINAPAN</h3>
  <hr>
  <a href="dftpenginapan.php" class="btn btn-primary mb-3"><i class="fas fa-angle-double-left"></i> KEMBALI</a>

  <?php
  // membuat query max
  $cariid = mysqli_query($connect, "SELECT max(id_penginapan) as id FROM tb_penginapan") or die(mysqli_error($connect));
  // menjadikannya array
  $dataid = mysqli_fetch_assoc($cariid);
  // jika $datakode
  if ($dataid) {
    $nilaiid = substr($dataid['id'], 2);
    // menjadikan $nilaikode ( int )
    $kode = (int) $nilaiid;
    // setiap $kode di tambah 1
    $kode = $kode + 1;
    $id_otomatis = str_pad("PG00", 5, $kode);
  } else {
    $id_otomatis = "TR001";
  }
  ?>

  <?php
  if (isset($_POST['submit'])) {
    $id = $_POST['id_penginapan'];
    $nama = $_POST['nama'];
    $des = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];

    $cek = mysqli_query($connect, "SELECT * FROM tb_penginapan WHERE id_penginapan='$id'") or die(mysqli_error($connect));

    if (mysqli_num_rows($cek) == 0) {
      $sql = mysqli_query($connect, "INSERT INTO tb_penginapan (id_penginapan, nama, deskripsi, harga, status) VALUES('$id','$nama', '$des', '$harga', '$status')") or die(mysqli_error($connect));

      if ($sql) {
        echo '<script>alert("Berhasil menambahkan data."); document.location="tambahpenginapan.php";</script>';
      } else {
        echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
      }
    } else {
      echo '<div class="alert alert-warning">Gagal, ID sudah terdaftar.</div>';
    }
  }
  ?>

  <form action="tambahpenginapan.php" method="post">

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">ID PENGINAPAN</label>
      <div class="col-sm-10">
        <input readonly type="text" class="form-control" name="id_penginapan" value="<?php echo $id_otomatis; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">NAMA PENGINAPAN</label>
      <div class="col-sm-10">
        <input type="text" name="nama" class="form-control" required>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">DESKRIPSI</label>
      <div class="col-sm-10">
        <input type="text" name="deskripsi" class="form-control" required>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">HARGA</label>
      <div class="col-sm-10">
        <input type="number" name="harga" class="form-control" required>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">STATUS</label>
      <div class="col-sm-10">
        <input type="text" name="status" class="form-control" required>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">&nbsp;</label>
      <div class="col-sm-10">
        <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
      </div>
    </div>
  </form>



</div>
</div>
</div>

<!-- Footer -->
<?php include '../components/footer-admin.php'; ?>