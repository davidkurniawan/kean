<div class="container-fluid dialog py-0 mt-5">
    <div class="container ">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-section d-flex gap-1 gap-lg-3">
                        <h3>Daftar Alamat</h3>
                        <i class="bi bi-arrow-right-circle-fill"></i>
                        <div><a href="<?php echo BASEURL.'address/list' ?>">View All</a></div>
                    </div>
                </div>
            </div>
        </div>
    <div class="container content py-0 px-0 px-lg-0">
        <div class="d-flex justify-content-center align-content-between flex-wrap text-center px-1 px-md-4">
            <div class="col-12 mt-0 text-start content">
                <?php if ($this->uri->segment(1) == 'address') { ?>
                    <a href="<?php echo BASEURL.'billing' ?>"><i class="bi bi-arrow-left"></i> Back To Billing</a>
                <?php } ?>
                <h5 class="w-100"> <button type="button" class="text-orange float-right d-lg-inline btn btn-warning" data-bs-toggle="modal" data-bs-target="#addAddressesDialog">Tambah Alamat Baru</button></h5>                

                <form class="form-floating mb-0" id="ubahStatusAlamat">
                    <div class="col-md mb-2 address no-border box py-2 py-lg-4 mt-5">
                        <?php foreach (addresUser() as $key => $value): ?>
                        <div class="item active p-4 mb-3">
                            <h1><?php echo $value['nama'] ?></h1>   
                            <?php if ($value['status_address'] == 1){ ?>
                            <div class="pilih-address checked" data-idAddress="<?php echo $value['id_address_user'] ?>">
                                <i class="bi bi-check"></i>
                            </div>
                            <?php } else { ?>
                            <div class="pilih-address" data-idAddress="<?php echo $value['id_address_user'] ?>">
                                <button type="button" class="btn btn-pilih px-5" data-idAddress="<?php echo $value['id_address_user'] ?>">Pilih</button>
                            </div>
                            <?php } ?>    
                            <h2>Alamat Rumah <small class="badge"><?php echo $value['simpan_alamat'] ?></small></h2>
                            <p><?php echo $value['telepon'] ?></p><p><?php echo $value['alamat_lengkap'] ?></p> 
                            <ul class="list-inline buttons">
                                <li class="list-inline-item mt-3"><a href="<?php echo BASEURL.'address/update/'.$value['id_address_user'].''.((isset($from))?"/".$from:"") ?>" >Ubah Alamat</a></li>
                            </ul>      
                        </div>
                        <?php endforeach ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

