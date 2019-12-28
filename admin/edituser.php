<?php
// Include module admin
include '../admin/adminmodule.php';
// include header admin termasuk navbar & sidebar
include '../components/header-admin.php';
?>

<div class="col-md-10 p-5 pt-2">
  <h3><i class="fa fa-users mr-2" aria-hidden="true"></i> EDIT USER</h3>
  <hr>
  <a href="dftuser.php" class="btn btn-primary mb-3"><i class="fas fa-angle-double-left"></i> KEMBALI</a>

  <?php
  //jika sudah mendapatkan parameter GET id dari URL
  if (isset($_GET['username'])) {
    //membuat variabel $user untuk menyimpan user dari GET user di URL
    $user = $_GET['username'];
    //query ke database SELECT tabel tiket berdasarkan username=$user
    $select = mysqli_query($connect, "SELECT * FROM tb_user WHERE username='$user'") or die(mysqli_error($connect));
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
  $queryuser = mysqli_query($connect, "SELECT * fROM tb_user WHERE username='$user'");
  $data = mysqli_fetch_assoc($queryuser);
  ?>

  <?php
  //jika tombol simpan di tekan/klik
  if (isset($_POST['submit'])) {
    $user = $_POST['username'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $ban = $_POST['baned'];

    $sql = mysqli_query($connect, "UPDATE tb_user SET username='$user', nama='$nama', email='$email', baned='$ban' WHERE username='$user'") or die(mysqli_error($connect));

    if ($sql) {
      echo '<script>alert("Berhasil menyimpan data."); document.location="edituser.php?username=' . $user . '";</script>';
    } else {
      echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
    }
  }
  ?>



  <form action="edituser.php?username=<?php echo $user; ?>" method="post">

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">USERNAME</label>
      <div class="col-sm-10">
        <input type="text" name="username" class="form-control" size="4" required value="<?php echo $data['username'] ?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">NAMA</label>
      <div class="col-sm-10">
        <input type="text" name="nama" class="form-control" required value="<?php echo $data['nama'] ?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">EMAIL</label>
      <div class="col-sm-10">
        <input type="text" name="email" class="form-control" required value="<?php echo $data['email'] ?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">BANED</label>
      <div class="col-sm-10">
        <input type="text" name="baned" class="form-control" required value="<?php echo $data['baned'] ?>">
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