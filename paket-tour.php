<?php
include './components/header.php';
include './pakettourmodule/getdata.php';
include './pakettourmodule/sorting.php' ?>
<!-- Daftar Paket -->
<div class="container border rounded py-5 px-5 bg-white mt-5 vh-100">
    <div class="row">
        <div class="col-lg-6">
            <h5 class="font-weight-bold">Pilihan Paket Tour</h5>
        </div>
        <div class="col-lg-6 d-flex justify-content-end">
            <form action="" method="GET">
                <div class="row ml-auto">
                    <div class="col p-1">
                        <select name="key" class="form-control">
                            <option value="nama">Nama</option>
                            <option value="harga">Harga</option>
                        </select>
                    </div>
                    <div class="col p-1">
                        <select name="order" class="form-control">
                            <option value="ASC">Ascending</option>
                            <option value="DESC">Descending</option>
                        </select>
                    </div>
                    <div class="col p-1">
                        <input type="submit" value="filter" class="btn btn-secondary">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <?php while ($data = mysqli_fetch_assoc($hasil)) { ?>
            <!-- Card -->
            <div class="col-md-3">
                <a href="deskripsi-tour.php?id=<?php echo $data['id_tour'] ?>">
                    <div class="card mx-auto mb-3">
                        <div class="card-img-caption">
                            <h5 class="card-text text-light"><?php echo $data['nama'] ?></h5>
                            <img class="card-img-top" src="./assets/bali.jpg" alt="Card image cap">
                        </div>
                    </div>
                </a>
            </div>
        <?php  }; ?>
    </div>
</div>

<?php include './components/footer.php' ?>