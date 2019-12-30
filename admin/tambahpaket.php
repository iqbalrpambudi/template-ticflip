<?php
// Include module admin
include '../admin/adminmodule.php';
// include header admin termasuk navbar & sidebar
include '../components/header-admin.php';
?>

<div class="col-md-10 p-5 pt-2">
  <h3><i class="fas fa-box mr-2"></i> TAMBAH PAKET TOUR</h3>
  <hr>
  <a href="dftpaket.php" class="btn btn-primary mb-3"><i class="fas fa-angle-double-left"></i> KEMBALI</a>

  <?php
  // membuat query max
  $cariid = mysqli_query($connect, "SELECT max(id_tour) as id FROM tb_tour") or die(mysqli_error($connect));
  // menjadikannya array
  $dataid = mysqli_fetch_assoc($cariid);
  // jika $datakode
  if ($dataid) {
    $nilaiid = substr($dataid['id'], 2);
    // menjadikan $nilaikode ( int )
    $kode = (int) $nilaiid;
    // setiap $kode di tambah 1
    $kode = $kode + 1;
    $id_otomatis = str_pad("TR00", 5, $kode);
  } else {
    $id_otomatis = "TR001";
  }
  ?>

  <?php
  if (isset($_POST['submit'])) {
    $id = $_POST['id_tour'];
    $nama = $_POST['nama'];
    $des = $_POST['deskripsi'];
    $fas = $_POST['fasilitas'];
    $harga = $_POST['harga'];

    // ambil data file
    $namaFile = $_FILES['file']['name'];
    $namaSementara = $_FILES['file']['tmp_name'];

    // lokasi file yang akan diupload
    $dirUpload = "../assets/background/";

    // Ambil nama gambar sebelumnya di database
    $lastPicQuery = mysqli_query($connect, "SELECT foto FROM tb_tour WHERE id_tour='$id'");
    $lastPic = mysqli_fetch_assoc($lastPicQuery);

    // jika nama gambar ada di database maka hapus 
    if ($lastPic['foto']) {
      unlink($dirUpload . $lastPic['foto']);
    }

    // memindahkan file ke direktori server
    $terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);


    $cek = mysqli_query($connect, "SELECT * FROM tb_tour WHERE id_tour='$id'") or die(mysqli_error($connect));

    if (mysqli_num_rows($cek) == 0) {
      $sql = mysqli_query($connect, "INSERT INTO tb_tour (id_tour, nama, deskripsi, fasilitas, harga, foto) VALUES('$id','$nama', '$des', '$fas', '$harga', '$namaFile')") or die(mysqli_error($connect));

      if ($sql) {
        echo '<script>alert("Berhasil menambahkan data."); document.location="tambahpaket.php";</script>';
      } else {
        echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
      }
    } else {
      echo '<div class="alert alert-warning">Gagal, ID sudah terdaftar.</div>';
    }
  }
  ?>

  <form action="tambahpaket.php" method="post" enctype="multipart/form-data">

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">ID TOUR</label>
      <div class="col-sm-10">
        <input readonly type="text" class="form-control" name="id_tour" value="<?php echo $id_otomatis; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">NAMA PAKET TOUR</label>
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
      <label class="col-sm-2 col-form-label">FASILITAS</label>
      <div class="col-sm-10">
        <input type="text" name="fasilitas" class="form-control" required>
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