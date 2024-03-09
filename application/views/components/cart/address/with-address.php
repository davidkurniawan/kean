<div class="col-md mb-2 address py-2 py-lg-4">
    <?php if (!empty(addresUser())){ ?>
        <div class="item active">
            <?php $alamatAktif = activeAddressUser(); ?>
            <h1><?php echo $alamatAktif['nama'] ?></h1>
            <h2>Alamat Rumah <small class="badge"><?php echo $alamatAktif['simpan_alamat'] ?></small></h2>
            <p><?php echo $alamatAktif['telepon'] ?></p><p><?php echo $alamatAktif['destination_name'] ?></p><p><?php echo $alamatAktif['alamat_lengkap'] ?></p>     
            <input type="hidden" name="kodePos" value="<?php echo $alamatAktif['kodepos'] ?>">
        </div>
    <?php } else { ?>
        <div class="item active">
            <h1>Alamat Anda kosong!</h1>
        </div>
    <?php } ?>

    <a href="#" class="btn btn-white-bordered d-inline my-2 px-3 mt-2" data-bs-toggle="modal" data-bs-target="#addressesDialog">Pilih Alamat Lain</a>
</div>