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
    <div class="col-md mb-2">
        <div class="form-floating">
            <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="Email" required>
            <label for="floatingEmail">Email</label>
        </div>
    </div>
    <div class="col-md mb-0">
        <div class="form-floating">
            <input type="name" class="form-control" id="addressfloatingName" name="nama" placeholder="Name" required>
            <label for="floatingName">Nama</label>
        </div>
    </div>
    <div class="col-md mb-2">
        <div class="form-floating">
            <input type="phone" class="form-control" id="floatingTelepon" name="telepon" placeholder="Telepon" required>
            <label for="floatingTelepon">Telepon</label>
        </div>
    </div>
    <div class="col-md mb-0">
        <div class="form-floating">
            <input type="name" class="form-control" id="floatingName" name="simpanAlamat" placeholder="Name" required>
            <label for="floatingName">Simpan alamat sebagai</label>
        </div>
    </div>
    <div class="col-md mb-2">
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingAlamatLengkap" name="alamatLengkap" placeholder="Alamat" required>
            <label for="floatingAlamat">Alamat Lengkap</label>
        </div>
        <input type="hidden" id="idDestination" name="idDestination">
        
    </div>
    <div class="col-md">
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingAlamat" name="selectAlamat" placeholder="Kecamatan/Kota/Provinsi/Kode Pos" required>
            <label>Kecamatan/Kota/Provinsi/Kode Pos</label>
        </div>
        <div class="absolute-select">
            <div class="data-response-select">
                
            </div>
        </div>
    </div>
    <div class="col-md">
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingProvinsi" name="provinsi" placeholder="Provinsi" readonly required>
            <label>Provinsi</label>
        </div>
    </div>
    <div class="col-md">
        <div class="form-floating">
            <input type="text" class="form-control" id="floatKota" name="kota" placeholder="Kota/Kabupaten" readonly required>
            <label>Kota/Kabupaten</label>
        </div>
    </div>
    <div class="col-md">
        <div class="form-floating">
            <input type="text" class="form-control" id="floatKecamatan" name="kecamatan" placeholder="Kecamatan" readonly required>
            <label>Kecamatan</label>
        </div>
    </div>
    <div class="col-md mb-2">
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingKodepos" name="kodePos" placeholder="Kode Pos" required>
            <label for="floatingKodepos">Kode Pos</label>
        </div>
    </div>

<script type="text/javascript">
$(document).ready(function() {
   
    $( "#floatingAlamat" ).keyup(function() {
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

        $("#floatingProvinsi").val(provinsi);
        $("#floatKota").val(kota);
        $("#floatKecamatan").val(kecamatan);
        $("#floatingKodepos").val(kodepos);
        $("#floatingAlamat").val(valueText);
        $("#idDestination").val(idDestination);
        $(".absolute-select").css("display","none");
    });
});
</script>