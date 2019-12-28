<?php
// Include module admin
include '../admin/adminmodule.php';
// include header admin termasuk navbar & sidebar
include '../components/header-admin.php';
?>

<div class="col-md-10 p-5 pt-2">
  <h3><i class="fas fa-box mr-2"></i> EDIT PAKET</h3>
  <hr>
  <a href="dftpaket.php" class="btn btn-primary mb-3"><i class="fas fa-angle-double-left"></i> KEMBALI</a>

  <?php
  //jika sudah mendapatkan parameter GET id dari URL
  if (isset($_GET['id_tour'])) {
    //membuat variabel $user untuk menyimpan user dari GET user di URL
    $id = $_GET['id_tour'];
    //query ke database SELECT tabel tiket berdasarkan username=$user
    $select = mysqli_query($connect, "SELECT * FROM tb_tour WHERE id_tour='$id'") or die(mysqli_error($connect));
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
  $querypaket = mysqli_query($connect, "SELECT * fROM tb_tour WHERE id_tour='$id'");
  $data = mysqli_fetch_assoc($querypaket);
  ?>

  <?php
  //jika tombol simpan di tekan/klik
  if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $des = $_POST['deskripsi'];
    $fas = $_POST['fasilitas'];
    $harga = $_POST['harga'];

    $sql = mysqli_query($connect, "UPDATE tb_tour SET nama='$nama', deskripsi='$des', fasilitas='$fas', harga='$harga' WHERE id_tour='$id'") or die(mysqli_error($connect));

    if ($sql) {
      echo '<script>alert("Berhasil menyimpan data."); document.location="editpaket.php?id_tour=' . $id . '";</script>';
    } else {
      echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
    }
  }
  ?>

  <form action="editpaket.php?id_tour=<?php echo $id; ?>" method="post">

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">NAMA TIKET</label>
      <div class="col-sm-10">
        <input type="text" name="nama" class="form-control" size="4" required value="<?php echo $data['nama'] ?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">DESKRIPSI</label>
      <div class="col-sm-10">
        <input type="text" name="deskripsi" class="form-control" required value="<?php echo $data['deskripsi'] ?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">FASILITAS</label>
      <div class="col-sm-10">
        <input type="text" name="fasilitas" class="form-control" required value="<?php echo $data['fasilitas'] ?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">HARGA</label>
      <div class="col-sm-10">
        <input type="number" name="harga" class="form-control" required value="<?php echo $data['harga'] ?>">
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