
<div class="container d-flex p-4 flex-wrap">
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
        <div class="col-12 col-lg-9">
            <div class="profile-bio p-4 text-left">
                <div class="profile-list">
                    <div class="profile-text name fw-bold"><i class="bi bi-person-arms-up"></i> <?php echo $profile['nama_lengkap'] ?></div>
                    <div class="profile-text refferal fw-bold mt-4"><i class="bi bi-coin"></i> <?php echo $profile['poin'] ?> <i class="bi bi-circle-fill"></i> Points</div>
                </div>
                <div class="banner banner-profile mt-5">
                    <div class="border-banner-profile">
                        <div class="d-flex">
                        <img src="http://localhost/shop/assets/img/assets/profile.png" class="img-fluid" style="height: 140px;">
                            <div class="description-banner-profile mt-auto mb-auto">
                                <h4 class="fw-bold">REFER A FRIEND</h4>
                                <h5>Get 200 Points You can refer a maximum of 3 friends per year..</h5>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<hr />
<div class="container-fluid dialog py-0 mt-5">
    <div class="container content py-0 px-0 px-lg-0">
        <div class="d-flex justify-content-center align-content-between flex-wrap text-center px-1 px-md-4">
            <div class="col-12 mt-0 text-start ">
                <h5 class="w-100">Pesanan Anda </h5> 
            </div>
            <div class="tab-pane parent w-100" id="pills-order" role="tabpanel" aria-labelledby="pills-order-tab" tabindex="0">
                <?php loadview("tabs/orders"); ?>        
            </div>
        </div>
    </div>
</div>
<hr>
<?php loadview("components/address-list"); ?>

<hr>
<?php loadview("components/voucher"); ?>

<hr>
<div class="container-fluid dialog py-0 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-section d-flex gap-1 gap-lg-3">
                    <h3>Bantuan</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <a href="<?php echo "https://wa.me/+62895345016251?text=I'm%20interested%20in%20your%20car%20for%20sale" ?>" target="_blank" class="text-desc fw-bold"><i class="bi bi-question-octagon" style="font-size: 25px;"></i> Chat Dengan Customer Service</a>
            </div>
        </div>
    </div>
</div>
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