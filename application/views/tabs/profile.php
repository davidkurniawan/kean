<?php $biodata = biodataUser(); ?>

<div class="toast-container bg-orange position-fixed top-0 start-50 translate-middle-x p-3">
  <div id="changeToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <div class="rounded me-2" alt="..."><i class="bi bi-info-circle-fill"></i></div>
      <strong class="me-auto">Perubahan berhasil disimpan</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>


<div class="container d-flex p-4 flex-wrap">
    <div class="title-profile mt-4 col-12">
        <h1 class="hi">Hi,</h1>
        <h2 class="name satisfy"><?php echo $this->session->userdata("sessNamaUser"); ?></h2>
    </div>
    <div class="info-profile col-12 d-flex flex-wrap mt-5 g-5">
        <div class="col-12 col-lg-3">
            <div class="photo-upload p-4 text-center">
                <img src="<?php echo BASEURL.$profile['user_profile'] ?>" id="previewImage" loading="lazy"/> <br/>
                <div class="custom-file text-center">
                    <form action="<?php echo BASEURL.'profile/photoProfile' ?>" id="uploadProfile" method="POST" enctype="multipart/form-data">
                    <input type="file" accept="image/*" class="custom-file-input d-none" id="customFileInput" aria-describedby="customFileInput" name="photo" onchange="previewFile();">                    
                    </form>
                    <label class="custom-file-label mt-3 btn btn-pilih d-block my-4 mx-2" for="customFileInput" id="customFileInput">Pilih Foto</label>
                </div>

                <p>Besar file: Max 2MB.<br/>
                Jenis file: .JPG .JPEG .PNG</p>
            </div>                        
        </div>
        <div class="col-12 col-lg-5 <?php echo (empty(biodataUser())) ? 'd-none' : ''; ?>" id="data-biodata">
            <div class="item h-100 mx-0 mx-lg-5 px-0 px-lg-4 my-5 my-lg-0 biodata">
            <?php if ($this->session->flashdata('msgbiodata')): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('msgbiodata') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>
                <h2>Biodata</h2>
                <h4 class="mt-4"><span>Nama</span><small><?php echo $profile['nama_lengkap'] ?></small></h4>
                <h4><span>Email</span><small><?php echo $profile['email'] ?></small></h4>
                <h4><span>No Telepon</span><small><?php echo $profile['phone'] ?></small></h4>
                <ul class="list-inline buttons mt-5">
                    <li class="list-inline-item"><div id="ubahBiodata"><a href="javascript:void(0)">Ubah</a></div></li>
                </ul>
            </div>
        </div>
        
        <div class="col-12 col-lg-5 <?php echo (empty(biodataUser())) ? '' : 'd-none'; ?>" id="form-biodata">
            <form class="item h-100 mx-0 mx-lg-5 px-0 px-lg-4 my-5 my-lg-0 biodata" action="<?php echo BASEURL.'profile/biodataUpdate' ?>" method="POST">
                <h2>Biodata</h2>
                
                <div class="col-md mb-0 mt-0">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="nama" value="<?php echo $profile['nama_lengkap'] ?>" required>
                        <label >Name</label>
                    </div>
                </div>
                <div class="col-md mb-0 mt-0">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $profile['email'] ?>" required>
                        <label >Email</label>
                    </div>
                </div>
                <div class="col-md mb-0 mt-0">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="telepon" placeholder="Phone Number" value="<?php echo $profile['phone'] ?>" required>
                        <label >Phone Number</label>
                    </div>
                </div>

                <ul class="list-inline mt-5">
                    <li class="list-inline-item">
                        <button type="submit" class="btn btn-pilih px-4">Save Changes</button>
                    </li>
                    <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-white" id="btnBatalForm">Batal</a></li>
                </ul>
            </form>
        </div>
        <div class="col-12 col-lg-4">
            <form class="h-100 mx-0 mx-lg-5 px-0 biodata" action="<?php echo BASEURL."profile/passwordChange" ?>" method="POST">
                <h2>Password Change</h2>
                <?php if ($this->session->flashdata('msg')): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <?php echo $this->session->flashdata('msg'); ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif ?>
                <div class="col-md mb-0 mt-0">
                    <div class="form-floating">
                        <input type="password" class="form-control"  name="currenPassword"  required>
                        <label >Current Password *</label>
                        <div style="cursor: pointer;position: absolute;top: 16px;right: 10px;" class="passwordShow"><i class="bi bi-eye" style="font-size: 24px;"></i></div>
                    </div>
                </div>
                <div class="col-md mb-0 mt-0">
                    <div class="form-floating">
                        <input type="password" class="form-control" name="newPassword"  required>
                        <label >New Password *</label>
                    </div>
                </div>
                <div class="col-md mb-0 mt-0">
                    <div class="form-floating">
                        <input type="password" class="form-control" name="confirmPassword"  required>
                        <label >Confirm New Password *</label>
                    </div>
                </div>

                <button class="btn btn-pilih px-4 mt-5" type="submit">Save Changes</button>
            </form>
        </div>
        <div class="col-12 col-lg-4 ">
            <div class="h-100 mx-0 mx-lg-5 px-0 mt-5 reff-code">
                <h5>Refferal Code Anda <?php echo $profile['refferal_code'] ?></h5>
            </div>
        </div>
    </div>
</div>
<hr class="mx-5"/>
<?php loadview("components/address-list"); ?>

<script type="text/javascript">
$(document).ready(function () {
   $("#ubahBiodata").click(function () {
        $("#form-biodata").removeClass("d-none");
        $("#data-biodata").addClass("d-none");
   }); 
   $("#btnBatalForm").click(function(){
        $("#form-biodata").addClass("d-none");
        $("#data-biodata").removeClass("d-none");
   });
});
</script>

<script type="text/javascript">
    $(document).ready(function () {
        var count = 0;
        $('.passwordShow').click(function () {
            count += 1;
            if ((count % 2) == 0) {
                $("input[name='currenPassword']").attr('type','text');
                $("input[name='newPassword']").attr('type','text');
                $("input[name='confirmPassword']").attr('type','text');
            } else {
                $("input[name='currenPassword']").attr('type','password');
                $("input[name='newPassword']").attr('type','text');
                $("input[name='confirmPassword']").attr('type','text');
            }
        });
    });
</script>