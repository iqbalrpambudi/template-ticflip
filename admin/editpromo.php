<?php
// Include module admin
include '../admin/adminmodule.php';
// include header admin termasuk navbar & sidebar
include '../components/header-admin.php';
?>

<div class="col-md-10 p-5 pt-2">
  <h3><i class="fas fa-percent mr-2"></i> EDIT PROMO</h3>
  <hr>
  <a href="dftpromo.php" class="btn btn-primary mb-3"><i class="fas fa-angle-double-left"></i> KEMBALI</a>

  <?php
  //jika sudah mendapatkan parameter GET id dari URL
  if (isset($_GET['id_promo'])) {
    //membuat variabel $user untuk menyimpan user dari GET user di URL
    $id = $_GET['id_promo'];
    //query ke database SELECT tabel tiket berdasarkan username=$user
    $select = mysqli_query($connect, "SELECT * FROM tb_promo WHERE id_promo='$id'") or die(mysqli_error($connect));
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
  $querypromo = mysqli_query($connect, "SELECT * fROM tb_promo WHERE id_promo='$id'");
  $data = mysqli_fetch_assoc($querypromo);
  ?>

  <?php
  //jika tombol simpan di tekan/klik
  if (isset($_POST['submit'])) {
    $dis = $_POST['diskon'];

    $sql = mysqli_query($connect, "UPDATE tb_promo SET diskon='$dis' WHERE id_promo='$id'") or die(mysqli_error($connect));

    if ($sql) {
      echo '<script>alert("Berhasil menyimpan data."); document.location="editpromo.php?id_promo=' . $id . '";</script>';
    } else {
      echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
    }
  }
  ?>

  <form action="editpromo.php?id_promo=<?php echo $id; ?>" method="post">

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">DISKON</label>
      <div class="col-sm-10">
        <input type="number" name="diskon" class="form-control" required value="<?php echo $data['diskon'] ?>">
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