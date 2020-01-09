<?php include './components/header.php';
include './homepagemodule/getdata.php';
?>
<div class="row my-3">
    <div class="col-lg-6 mx-auto">
        <div class="container border rounded bg-white p-4">
            <h3 class="">Tentang TicFlip</h3>
            <p>Ticflip adalah aplikasi yang menyediakan tiket dan paket wisata. Kami menyediakan berbagai macam tiket mulai dari tiket wisata, tiket wahana. Selain itu kami juga menyediakan Paket wisata dengan fasilitas yang lengkap. </p>
            <h3 class="mt-5">Kontak Kami</h3>
            <p>Silahkan hubungi kami jika ada request pertanyaan maupun saran.</p>
            <form action="./homepagemodule/doAbout.php" method="POST">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="inlineFormInputGroup">No. Telepon</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">+62</div>
                        </div>
                        <input type="text" name="telepon" class="form-control" id="inlineFormInputGroup" placeholder="81xxxx">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Kritik/Saran</label>
                    <textarea class="form-control" name="saran" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Kirim Saran</button>
            </form>

        </div>
    </div>

</div>
</div>
<?php include './components/footer.php'; ?>