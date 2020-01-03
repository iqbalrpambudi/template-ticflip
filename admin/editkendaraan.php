<?php
// Include module admin
include '../admin/adminmodule.php';
// include header admin termasuk navbar & sidebar
include '../components/header-admin.php';
?>

<div class="col-md-10 p-5 pt-2">
  <h3><i class="fa fa-car mr-2" aria-hidden="true"></i> EDIT KENDARAAN</h3>
  <hr>
  <a href="dftkendaraan.php" class="btn btn-primary mb-3"><i class="fas fa-angle-double-left"></i> KEMBALI</a>

  <?php
  //jika sudah mendapatkan parameter GET id dari URL
  if (isset($_GET['id_kendaraan'])) {
    //membuat variabel $user untuk menyimpan user dari GET user di URL
    $id = $_GET['id_kendaraan'];
    //query ke database SELECT tabel tiket berdasarkan username=$user
    $select = mysqli_query($connect, "SELECT * FROM tb_kendaraan WHERE id_kendaraan='$id'") or die(mysqli_error($connect));
    //jika hasil query = 0 maka muncul pesan error
    if (mysqli_num_rows($select) == 0) {
      echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
      exit();
      //jika hasil query > 0
    } else {
      //membuat variabel $data dan menyimpan data row dari query
      $data = mysqli_fetch_assoc($select);
    }
  }
  ?>

  <?php
  $querykendaraan = mysqli_query($connect, "SELECT * fROM tb_kendaraan WHERE id_kendaraan='$id'");
  $data = mysqli_fetch_assoc($querykendaraan);
  ?>

  <?php
  //jika tombol simpan di tekan/klik
  if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $tipe = $_POST['tipe'];
    $status = $_POST['status'];


    $sql = mysqli_query($connect, "UPDATE tb_kendaraan SET nama='$nama', tipe='$tipe', status='$status' WHERE id_kendaraan='$id'") or die(mysqli_error($connect));

    if ($sql) {
      echo '<script>alert("Berhasil menyimpan data."); document.location="editkendaraan.php?id_kendaraan=' . $id . '";</script>';
    } else {
      echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
    }
  }
  ?>

  <form action="editkendaraan.php?id_kendaraan=<?php echo $id; ?>" method="post">

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">NAMA KENDARAAN</label>
      <div class="col-sm-10">
        <input type="text" name="nama" class="form-control" size="4" required value="<?php echo $data['nama'] ?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">TIPE</label>
      <div class="col-sm-10">
        <input type="text" name="tipe" class="form-control" required value="<?php echo $data['tipe'] ?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">STATUS</label>
      <div class="col-sm-10">
        <input type="text" name="status" class="form-control" required value="<?php echo $data['status'] ?>">
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