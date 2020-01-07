<?php
// Include module admin
include '../admin/adminmodule.php';
// include header admin termasuk navbar & sidebar
include '../components/header-admin.php';
?>

<div class="col-md-10 p-5 pt-2">
  <h3><i class="fas fa-ticket-alt mr-2"></i> EDIT TIKET</h3>
  <hr>
  <a href="dfttiket.php" class="btn btn-primary mb-3"><i class="fas fa-angle-double-left"></i> KEMBALI</a>

  <?php
  //jika sudah mendapatkan parameter GET id dari URL
  if (isset($_GET['id_tiket'])) {
    //membuat variabel $user untuk menyimpan user dari GET user di URL
    $id = $_GET['id_tiket'];
    //query ke database SELECT tabel tiket berdasarkan username=$user
    $select = mysqli_query($connect, "SELECT * FROM tb_tiket WHERE id_tiket='$id'") or die(mysqli_error($connect));
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
  $querytiket = mysqli_query($connect, "SELECT * fROM tb_tiket WHERE id_tiket='$id'");
  $data = mysqli_fetch_assoc($querytiket);
  ?>

  <?php
  //jika tombol simpan di tekan/klik
  if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $des = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    if ($_FILES['file']['size'] != 0) {
      // ambil data file
      $namaFile = $_FILES['file']['name'];
      $namaSementara = $_FILES['file']['tmp_name'];

      // lokasi file yang akan diupload
      $dirUpload = "../assets/background/";

      // Ambil nama gambar sebelumnya di database
      $lastPicQuery = mysqli_query($connect, "SELECT foto FROM tb_tiket WHERE id_tiket='$id'");
      $lastPic = mysqli_fetch_assoc($lastPicQuery);

      // jika nama gambar ada di database maka hapus 
      if ($lastPic['foto']) {
        unlink($dirUpload . $lastPic['foto']);
      }

      // memindahkan file ke direktori server
      $terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);

      $sql = mysqli_query($connect, "UPDATE tb_tiket SET nama='$nama', deskripsi='$des', harga='$harga', foto='$namaFile' WHERE id_tiket='$id'") or die(mysqli_error($connect));

      if ($sql) {
        echo '<script>alert("Berhasil menyimpan data."); document.location="edittiket.php?id_tiket=' . $id . '";</script>';
      } else {
        echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
      }
    } else {
      $sql = mysqli_query($connect, "UPDATE tb_tiket SET nama='$nama', deskripsi='$des', harga='$harga'  WHERE id_tiket='$id'") or die(mysqli_error($connect));

      if ($sql) {
        echo '<script>alert("Berhasil menyimpan data."); document.location="edittiket.php?id_tiket=' . $id . '";</script>';
      } else {
        echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
      }
    }
  }
  ?>



  <form action="edittiket.php?id_tiket=<?php echo $id; ?>" method="post" enctype="multipart/form-data">

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
      <label class="col-sm-2 col-form-label">HARGA</label>
      <div class="col-sm-10">
        <input type="number" name="harga" class="form-control" required value="<?php echo $data['harga'] ?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">UPLOAD FOTO</label>
      <div class="col-sm-10">
        <input type="file" name="file" id="upload" class="form-control" value="foto">
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