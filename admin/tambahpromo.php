<?php
// Include module admin
include '../admin/adminmodule.php';
// include header admin termasuk navbar & sidebar
include '../components/header-admin.php';
?>

<div class="col-md-10 p-5 pt-2">
  <h3><i class="fas fa-percent mr-2"></i> TAMBAH PROMO</h3>
  <hr>
  <a href="dftpromo.php" class="btn btn-primary mb-3"><i class="fas fa-angle-double-left"></i> KEMBALI</a>

  <?php

  if (isset($_POST['submit'])) {
    $id = $_POST['id_promo'];
    $diskon = $_POST['diskon'];

    $cek = mysqli_query($connect, "SELECT * FROM tb_promo WHERE id_promo='$id'") or die(mysqli_error($connect));

    if (mysqli_num_rows($cek) == 0) {
      $sql = mysqli_query($connect, "INSERT INTO tb_promo (id_promo, diskon) VALUES('$id', '$diskon')") or die(mysqli_error($connect));

      if ($sql) {
        echo '<script>alert("Berhasil menambahkan data."); document.location="tambahpromo.php";</script>';
      } else {
        echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
      }
    } else {
      echo '<div class="alert alert-warning">Gagal, ID sudah terdaftar.</div>';
    }
  }
  ?>


  <form action="tambahpromo.php" method="post">

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">ID PROMO</label>
      <div class="col-sm-10">
        <input type="text" name="id_promo" class="form-control" required>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">DISKON</label>
      <div class="col-sm-10">
        <input type="number" name="diskon" class="form-control" required>
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