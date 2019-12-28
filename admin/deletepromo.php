<?php
  //include file config.php
  include('./koneksi.php');
  //jika benar mendapatkan GET id dari URL
  if(isset($_GET['id_promo'])){
    //membuat variabel $id yang menyimpan nilai dari $_GET['promo']
    $id = $_GET['id_promo'];

    //melakukan query ke database, dengan cara SELECT data yang memiliki promo yang sama dengan variabel $id
    $cek = mysqli_query($connect, "SELECT * FROM tb_promo WHERE id_promo='$id'") or die(mysqli_error($connect));
    
    //jika query menghasilkan nilai > 0 maka eksekusi script di bawah
    if(mysqli_num_rows($cek) > 0){
      //query ke database DELETE untuk menghapus data dengan kondisi id_promo=$id
      $delete = mysqli_query($connect, "DELETE FROM tb_promo WHERE id_promo='$id'") or die(mysqli_error($connect));
      if($delete){
        echo '<script>alert("Berhasil menghapus data."); document.location="dftpromo.php";</script>';
      }else{
        echo '<script>alert("Gagal menghapus data."); document.location="dftpromo.php";</script>';
      }
    }else{
      echo '<script>alert("ID tidak ditemukan di database."); document.location="dftpromo.php";</script>';
    }
  }else{
    echo '<script>alert("ID tidak ditemukan di database."); document.location="dftpromo.php";</script>';
  }
