<style type="text/css">
    .absolute-select {
        position: relative;
        z-index: 101;       
    }
    .absolute-select .data-response-select {
        position: absolute;
        background: aliceblue;
        width: 100%;
        padding: 12px;
    }
    .absolute-select .data-response-select .option-destination {
        padding-bottom: 4px;
        padding-top: 4px;
        cursor: pointer;
    }
</style>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<div class="container-fluid join py-0">
    <div class="container content py-0 px-0 px-lg-0">
        <div class="d-flex justify-content-center align-content-between flex-wrap text-center px-1 px-md-4">
            <div class="col-12 col-lg-5 img">
                <div style="background-image:url('<?php echo IMAGES ?>assets/image-join.png')" class="asset"></div>
            </div>

            <div class="col-12 col-lg-7 px-0 px-md-5 mt-5 mt-lg-0 text-start content">
                <h5>Join Reseller Sekarang ✨</h5>
                <p>Gabung sekarang juga dan dapatkan harga terbaik untuk keuntungan bisnis kecantikan mu bersama Diary indonesia</p>

                <form class="form-floating mb-0" action="<?php echo BASEURL.'user/daftar' ?>" method="POST" enctype="multipart/form-data">
                    <div class="col-md mb-0">
                        <div class="form-floating">
                            <input type="name" class="form-control" name="nama" placeholder="Nama sesuai KTP" required>
                            <label for="floatingName">Nama</label>
                        </div>
                    </div>
                    <div class="col-md mb-2">
                        <div class="form-floating">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                            <label for="floatingEmail">Email</label>
                        </div>
                    </div>
                    <div class="col-md mb-2">
                        <div class="form-floating">
                            <input type="phone" class="form-control" name="telepon" placeholder="Telepon" required>
                            <label for="floatingTelepon">Telepon</label>
                        </div>
                    </div>
                    <div class="col-md mb-2">
                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="Alamat" name="alamat" required>
                            <label for="floatingAlamat">Alamat</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingAlamatRegist" name="selectAlamat" placeholder="Kecamatan/Kota/Provinsi/Kode Pos" required>
                            <label>Kecamatan/Kota/Provinsi/Kode Pos</label>
                        </div>
                        <div class="absolute-select">
                            <div class="data-response-select">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md mb-2">
                        <div class="form-floating">
                            <input type="text" class="form-control"placeholder="provinsi" id="floatingProvinsiRegist" name="provinsi" required>
                            <label for="kecamatanFloatingAlamat">Provinsi</label>
                        </div>
                    </div>
                    <div class="col-md mb-2">
                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="kota" name="kota" id="floatKotaRegist" required>
                            <label for="kecamatanFloatingAlamat">Kota</label>
                        </div>
                    </div>
                    <div class="col-md mb-2">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatKecamatanRegist" placeholder="kecamatan" name="kecamatan" required>
                            <label for="kecamatanFloatingAlamat">Kecamatan</label>
                        </div>
                    </div>
                    <div class="col-md mb-2">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatKelurahanRegist" placeholder="Kelurahan" name="kelurahan" required>
                            <label for="kelurahanFloatingAlamat">Kelurahan</label>
                        </div>
                    </div>
                    <div class="col-md mb-2">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingKodeposRegist" placeholder="kodepos" name="kodepos" required>
                            <label for="kodeposFloatingAlamat">Kode Pos</label>
                        </div>
                    </div>
                    <div class="col-md mb-2">
                        <div class="form-floating">
                            <input type="password" class="form-control passwordShowinput" placeholder="Password" id="passwordRegister" name="password" required>
                            <label for="floatingAlamat">Password</label>
                            <div style="cursor: pointer;position: absolute;top: 16px;right: 10px;" class="passwordShow"><i class="bi bi-eye fa-eye-slash" style="font-size: 24px;" id="eye"></i></div>
                        </div>
                    </div>
                    <div class="col-md mb-2">
                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="Nik" name="nik" required>
                            <label for="floatingAlamat">NIK KTP</label>
                        </div>
                    </div>
                    <div class="col-md mb-4 mt-3">
                        <div class="form-group custom-file-button">
                            <label for="floatingKtp">Upload KTP</label>
                            <input type="file" class="form-control file mt-1" name="userfile" placeholder="ktp" required>
                        </div>
                    </div>
                    <div class="col-md mt-3 mb-3">
                        <div class="g-recaptcha" data-sitekey="6Le4fc4iAAAAAKU5DxG2jHxzmxEoTSQnh6f-qpvC"></div>
                    </div>

                    <div class="row px-2">
                        <button type="submit" class="btn btn-cyan d-block d-lg-inline">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {

    $( "#floatingAlamatRegist" ).keyup(function() {
        $(".absolute-select").css("display","block");
        var destination = encodeURIComponent($(this).val());
        $.post( "<?php echo BASEURL.'cart/getDestination' ?>", { destination: destination })
        .done(function( data ) {
            $(".data-response-select").html(data);
        });
    });

    $(".absolute-select").on('click','.option-destination',function () {
        var valueText       = $(this).text();
        var idDestination   = $(this).data('iddesti');
        var provinsi        = $(this).data('provinsi');
        var kota            = $(this).data('kota');
        var kecamatan       = $(this).data('kecamatan');
        var kodepos         = $(this).data('kodepos');

        $("#floatingProvinsiRegist").val(provinsi);
        $("#floatKotaRegist").val(kota);
        $("#floatKecamatanRegist").val(kecamatan);
        $("#floatingKodeposRegist").val(kodepos);
        // $("#floatingAlamat").val(valueText);
        // $("#idDestination").val(idDestination);
        $(".absolute-select").css("display","none");
    });
});
</script>
<script type="text/javascript">
    function show() {
    var p = document.getElementById('passwordRegister');
        p.setAttribute('type', 'text');
    }

    function hide() {
        var p = document.getElementById('passwordRegister');
        p.setAttribute('type', 'password');
    }

    var pwShown = 0;

    document.getElementById("eye").addEventListener("click", function () {
        if (pwShown == 0) {
            pwShown = 1;    
                    document.getElementById("eye").classList.add("fa-eye-slash");
                    document.getElementById("eye").classList.remove("fa-eye");
            show();
        } else {
            pwShown = 0;
                  document.getElementById("eye").classList.add("fa-eye");
                    document.getElementById("eye").classList.remove("fa-eye-slash");
            hide();
        }
    }, false);
           
</script>

