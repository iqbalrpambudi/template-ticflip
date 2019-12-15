<form action="./usermodule/edituser.php" method="POST" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo $getUserData['username']; ?>" readonly>
        </div>
        <div class="form-group col-md-6">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $getUserData['nama']; ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="<?php echo $getUserData['email']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" name="alamat" id="alamat" value="Jln Raya">
    </div>
    <div class="form-group">
        <label for="upload">Upload Foto</label><br>
        <input type="file" name="file" id="upload" value="Jln Raya">
    </div>
    <button type="submit" name="update" class="btn btn-primary">Perbarui</button>
</form>