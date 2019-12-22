    <?php
    include './components/header.php';
    include './deskripsimodule/getdata.php';
    ?>

    <!-- Daftar Paket -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mb-3 border rounded p-4 bg-white mx-2">
                <a href="#">
                    <div class="card mx-auto mb-3">
                        <div class="card-img-caption">
                            <h3 class="card-text text-light">
                                <?php
                                echo $datatour["nama"];
                                ?>
                            </h3>
                            <img class="card-img-top" src="./assets/bali.jpg" alt="Card image cap">
                        </div>
                    </div>
                </a>
                <h3 class="card-title font-weight-bold text-dark text-center bg-warning rounded p-2">
                    Rp <?php
                        echo number_format($datatour["harga"], 0, ',', '.');
                        ?>
                </h3>
                <h6 class="font-weight-bold">Rating</h5>
                    <span class="card-rating"><?php $id = $datatour['id_tour'];
                                                $ticketRate = mysqli_query($koneksi, "SELECT AVG(rate) as avg FROM tb_rating where id_tour='$id'");
                                                $rating = mysqli_fetch_assoc($ticketRate);
                                                for ($i = 0; $i < ceil($rating['avg']); $i++) {
                                                    echo '<i class="fa fa-star text-warning"></i>';
                                                }
                                                ?></span>
                    <hr>
                    <ul class="list-group list-group-flush">
                        <h3 class="mt-2">Fasilitas</h3>
                        <?php $fasilitas = explode(",", $datatour["fasilitas"]);
                        foreach ($fasilitas as $datas) :
                            ?>
                            <li class="list-group-item bg-transparent">
                                <?php echo ucfirst($datas); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
            </div>
            <div class="col-md-7 border rounded p-4 bg-white">
                <div class="container p-2
                ">
                    <h5>Deskripsi</h5>
                    <?php
                    echo $datatour["deskripsi"];
                    ?>
                </div>
                <div class="row mt-3 p-2">
                    <form action="checkout.php" method="post">
                        <div class="col-lg-12">
                            <table class="table table-borderless">
                                <tr>
                                    <td>
                                        <h5>Pilih Tanggal</h5>
                                        <input required type="date" name="tanggal" id="tanggal" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Jumlah Orang</h5>
                                        <input type="number" min="10" max="50" required name="jumlah" id="jumlah" class="form-control">
                                    </td>
                                    <td>
                                        <h5>Penginapan</h5>
                                        <select id="inputState" name='penginapan' class="form-control">
                                            <option value="0" selected>Choose...</option>
                                            <?php foreach ($penginapanquery as $penginapan) : ?>
                                                <option value="<?php echo $penginapan['id_penginapan'] ?>"><?php echo $penginapan['nama'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </td>
                                    <td>
                                        <h5>Bus</h5>
                                        <select id="inputState" name='kendaraan' class="form-control">
                                            <option value="0" selected>Tanpa Bus</option>
                                            <?php foreach ($busquery as $bus) : ?>
                                                <option value="<?php echo $bus['id_kendaraan'] ?>"><?php echo $bus['nama'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </td>
                                </tr>
                                <input type="hidden" required name="id" class="form-control" value="<?php echo $_GET['id'] ?>">
                            </table>

                        </div>
                        <div class="col-lg-6 align-self-center">
                            <input class="btn btn-success" type="submit" name="submit" value="Order">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include './components/footer.php' ?>