<?php
// Include module admin
include '../admin/adminmodule.php';
// include header admin termasuk navbar & sidebar
include '../components/header-admin.php';
?>

<div class="col-md-10 p-5 pt-2">
  <h3><i class="fas fa-car mr-2"></i> TAMBAH KENDARAAN</h3>
  <hr>
  <a href="dftkendaraan.php" class="btn btn-primary mb-3"><i class="fas fa-angle-double-left"></i> KEMBALI</a>

  <?php
  // membuat query max
  $cariid = mysqli_query($connect, "SELECT max(id_kendaraan) as id FROM tb_kendaraan") or die(mysqli_error($connect));
  // menjadikannya array
  $dataid = mysqli_fetch_assoc($cariid);
  // jika $datakode
  if ($dataid) {
    $nilaiid = substr($dataid['id'], 2);
    // menjadikan $nilaikode ( int )
    $kode = (int) $nilaiid;
    // setiap $kode di tambah 1
    $kode = $kode + 1;
    $id_otomatis = str_pad("KD00", 5, $kode);
  } else {
    $id_otomatis = "TR001";
  }
  ?>

  <?php
  if (isset($_POST['submit'])) {
    $id = $_POST['id_kendaraan'];
    $nama = $_POST['nama'];
    $tipe = $_POST['tipe'];
    $status = $_POST['status'];

    $cek = mysqli_query($connect, "SELECT * FROM tb_kendaraan WHERE id_kendaraan='$id'") or die(mysqli_error($connect));

    if (mysqli_num_rows($cek) == 0) {
      $sql = mysqli_query($connect, "INSERT INTO tb_kendaraan (id_kendaraan, nama, tipe, status) VALUES('$id','$nama', '$tipe', '$status')") or die(mysqli_error($connect));

      if ($sql) {
        echo '<script>alert("Berhasil menambahkan data."); document.location="tambahkendaraan.php";</script>';
      } else {
        echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
      }
    } else {
      echo '<div class="alert alert-warning">Gagal, ID sudah terdaftar.</div>';
    }
  }
  ?>

  <form action="tambahkendaraan.php" method="post">

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">ID KENDARAAN</label>
      <div class="col-sm-10">
        <input readonly type="text" class="form-control" name="id_kendaraan" value="<?php echo $id_otomatis; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">NAMA KENDARAAN</label>
      <div class="col-sm-10">
        <input type="text" name="nama" class="form-control" required>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">TIPE</label>
      <div class="col-sm-10">
        <input type="text" name="tipe" class="form-control" required>
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