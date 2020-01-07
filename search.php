<?php include './components/header.php';
include './homepagemodule/getdata.php';
?>
<?php
$search = $_POST['search'];
$min = $_POST['min'];
$max = $_POST['max'];
if ($_POST['min'] > 0 && $_POST['max'] > 0) {
    $min = $_POST['min'];
    $max = $_POST['max'];
    $query1 = mysqli_query($conn, "SELECT * FROM tb_tour WHERE nama LIKE '%$search%' AND harga BETWEEN $min AND $max");
    $query3 = mysqli_query($conn, "SELECT * FROM tb_tiket where nama LIKE '%$search%' AND harga BETWEEN $min AND $max");
} elseif ($_POST['min'] > 0 && $_POST['max'] == 0) {
    $max = $_POST['max'];
    $query1 = mysqli_query($conn, "SELECT * FROM tb_tour WHERE nama LIKE '%$search%' AND harga >= $min");
    $query3 = mysqli_query($conn, "SELECT * FROM tb_tiket where nama LIKE '%$search%' AND harga >= $min");
} elseif ($_POST['min'] == 0 && $_POST['max'] > 0) {
    $max = $_POST['max'];
    $query1 = mysqli_query($conn, "SELECT * FROM tb_tour WHERE nama LIKE '%$search%' AND harga <=$max");
    $query3 = mysqli_query($conn, "SELECT * FROM tb_tiket where nama LIKE '%$search%' AND harga <= $max");
} elseif ($_POST['min'] == 0 && $_POST['max'] == 0) {
    $query1 = mysqli_query($conn, "SELECT * FROM tb_tour WHERE nama LIKE '%$search%'");
    $query3 = mysqli_query($conn, "SELECT * FROM tb_tiket where nama LIKE '%$search%'");
}

//$query2 = mysqli_query($conn,"SELECT * FROM tb_tiket WHERE nama LIKE '%$search%'");

?>

<!-- Jumbotron -->
<div class="jumbotron" style="
            margin-bottom:0;
            height: 60vh;
            background-image: url('./assets/vacation.png');
            background-position-y:40%;
            background-size: cover;
            filter: opacity(70%)">
</div>

<!-- Daftar Paket -->
<div class=" container border rounded py-5 px-5 bg-white" style="margin-top: -200px;position: relative;z-index: 1">
    <h4 class="font-weight-bold">Hasil Pencarian : "<?php echo $search ?>"</h4>
    <hr>

    <!-- Tour Result -->
    <?php
    if (mysqli_fetch_assoc($query1) != null) { ?>
        <div class="card">
            <div class="card-header text-light bg-primary">
                <h5>Paket Tour</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php foreach ($query1 as $data) : ?>
                        <div class="col-lg-3">
                            <a href="deskripsi-tour.php?id=<?php echo $data['id_tour'] ?>">
                                <div class="card mx-auto mb-3">
                                    <div class="card-img-caption">

                                        <!-- promo -->
                                        <h5 class="card-text text-light"><?php echo $data['nama']; ?></h5>
                                        <span class="card-rating"><?php $id = $data['id_tour'];
                                                                    $ticketRate = mysqli_query($conn, "SELECT AVG(rate) as avg FROM tb_rating where id_tour='$id'");
                                                                    $rating = mysqli_fetch_assoc($ticketRate);
                                                                    for ($i = 0; $i < ceil($rating['avg']); $i++) {
                                                                        echo '<i class="fa fa-star text-warning"></i>';
                                                                    }
                                                                    ?></span>
                                        <?php if ($data['foto']) { ?>
                                            <img src="./assets/background/<?php echo $data['foto'] ?>" class="card-img-top " alt="...">
                                        <?php } else { ?>
                                            <img src="./assets/bali.jpg" class="card-img-top " alt="...">
                                        <?php }; ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php }; ?>

    <!-- Ticket Result -->
    <?php
    if (mysqli_fetch_assoc($query3) != null) { ?>
        <div class="card mt-3 ">
            <div class="card-header text-light bg-primary">
                <h5>Tiket</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php foreach ($query3 as $data) : ?>
                        <div class="col-lg-3">
                            <a href="deskripsi-tiket.php?id=<?php echo $data['id_tiket'] ?>">
                                <div class="card mx-auto mb-3">
                                    <div class="card-img-caption">

                                        <!-- promo -->
                                        <h5 class="card-text text-light"><?php echo $data['nama']; ?></h5>
                                        <span class="card-rating"><?php $id = $data['id_tiket'];
                                                                    $ticketRate = mysqli_query($conn, "SELECT AVG(rate) as avg FROM tb_rating where id_tiket='$id'");
                                                                    $rating = mysqli_fetch_assoc($ticketRate);
                                                                    for ($i = 0; $i < ceil($rating['avg']); $i++) {
                                                                        echo '<i class="fa fa-star text-warning"></i>';
                                                                    }
                                                                    ?></span>
                                        <img class="card-img-top" src="./assets/bali.jpg" alt="Card image cap">
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php include './components/footer.php'; ?>