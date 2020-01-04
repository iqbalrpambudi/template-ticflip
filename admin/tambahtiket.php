<?php
// Include module admin
include '../admin/adminmodule.php';
// include header admin termasuk navbar & sidebar
include '../components/header-admin.php';
?>

<div class="col-md-10 p-5 pt-2">
  <h3><i class="fas fa-ticket-alt mr-2"></i> TAMBAH TIKET</h3>
  <hr>
  <a href="dfttiket.php" class="btn btn-primary mb-3"><i class="fas fa-angle-double-left"></i> KEMBALI</a>

  <?php

  // membuat query max
  $cariid = mysqli_query($connect, "SELECT max(id_tiket) as id FROM tb_tiket") or die(mysqli_error($connect));
  // menjadikannya array
  $dataid = mysqli_fetch_assoc($cariid);
  // jika $datakode
  if ($dataid) {
    $nilaiid = substr($dataid['id'], 2);
    // menjadikan $nilaikode ( int )
    $kode = (int) $nilaiid;
    // setiap $kode di tambah 1
    $kode = $kode + 1;
    $id_otomatis = str_pad("TC00", 5, $kode);
  } else {
    $id_otomatis = "TC001";
  }
  ?>

  <?php
  if (isset($_POST['submit'])) {
    $id = $_POST['id_tiket'];
    $nama = $_POST['nama'];
    $des = $_POST['deskripsi'];
    $harga = $_POST['harga'];

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

    $cek = mysqli_query($connect, "SELECT * FROM tb_tiket WHERE id_tiket='$id'") or die(mysqli_error($connect));

    if (mysqli_num_rows($cek) == 0) {
      $sql = mysqli_query($connect, "INSERT INTO tb_tiket (id_tiket, nama, deskripsi, harga) VALUES('$id','$nama', '$des', '$harga')") or die(mysqli_error($connect));

      if ($sql) {
        echo '<script>alert("Berhasil menambahkan data."); document.location="tambahtiket.php";</script>';
      } else {
        echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
      }
    } else {
      echo '<div class="alert alert-warning">Gagal, ID sudah terdaftar.</div>';
    }
  }
  ?>


  <form action="tambahtiket.php" method="post" enctype="multipart/form-data">

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">ID TIKET</label>
      <div class="col-sm-10">
        <input readonly type="text" class="form-control" name="id_tiket" value="<?php echo $id_otomatis; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">NAMA TIKET</label>
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
      <label class="col-sm-2 col-form-label">UPLOAD FOTO</label>
      <div class="col-sm-10">
        <input type="file" name="file" id="upload" class="form-control" required value="foto">
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