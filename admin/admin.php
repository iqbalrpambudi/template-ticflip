<?php
// Include module admin
include '../admin/adminmodule.php';
// include header admin termasuk navbar & sidebar
include '../components/header-admin.php';
?>
<div class="col-md-10 p-5 pt-2">
	<h3><i class="fa fa-tachometer-alt mr-2"></i> DASHBOARD</h3>
	<hr>

	<div class="row text-white">
		<div class="card bg-info ml-5" style="width: 18rem;">
			<div class="card-body">
				<div class="card-body-icon">
					<i class="fa fa-users mr-2" aria-hidden="true"></i>
				</div>
				<h5 class="card-title">JUMLAH USER</h5>
				<div class="display-4"><?php $number = mysqli_num_rows($queryuser);
										echo $number; ?></div>
				<a href="dftuser.php">
					<p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p>
				</a>
			</div>
		</div>

		<div class="card bg-danger ml-5" style="width: 18rem;">
			<div class="card-body">
				<div class="card-body-icon">
					<i class="fa fa-shopping-cart mr-2" aria-hidden="true"></i>
				</div>
				<h5 class="card-title">JUMLAH CHECKOUT</h5>
				<div class="display-4"><?php $number = mysqli_num_rows($querycheckout);
										echo $number; ?></div>
				<a href="dftcheckout.php">
					<p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p>
				</a>
			</div>
		</div>

		<div class="card bg-success ml-5" style="width: 18rem;">
			<div class="card-body">
				<div class="card-body-icon">
					<i class="fa fa-credit-card mr-2" aria-hidden="true"></i>
				</div>
				<h5 class="card-title">JUMLAH PEMBAYARAN</h5>
				<div class="display-4"><?php $number = mysqli_num_rows($querypembayaran);
										echo $number; ?></div>
				<a href="dftpembayaran.php">
					<p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p>
				</a>
			</div>
		</div>
	</div>
</div>
</div>


<!-- Footer -->
<?php include '../components/footer-admin.php'; ?>