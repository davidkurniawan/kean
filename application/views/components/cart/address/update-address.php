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
    <div class="col-md mb-0">
        <div class="form-update">
            <label for="addressupdateName">Nama</label>
            <input type="name" class="form-control" id="addressupdateName" name="nama" placeholder="Name" required>
        </div>
    </div>
    <div class="col-md mb-2">
        <div class="form-update">
            <label for="updateTelepon">Telepon</label>
            <input type="phone" class="form-control" id="updateTelepon" name="telepon" placeholder="Telepon" required>
        </div>
    </div>
    <div class="col-md mb-2">
        <div class="form-update">
            <label for="simpanAlamat">Simpan alamat sebagai</label>
            <select class="form-control" name="simpanAlamat" id="simpanAlamat" required>
                <option value="Utama">Utama</option>
                <option value="Rumah">Rumah</option>
                <option value="Kantor">Kantor</option>
            </select>
        </div>
    </div>
    <div class="col-md mb-2">
        <div class="form-update">
            <label for="updateAlamat">Alamat Lengkap</label>
            <textarea class="form-control" name="alamatLengkap" id="updateAlamatLengkap" required></textarea>
        </div>
        
    </div>
    <div class="col-md">
        <div class="form-update">
            <label>Provinsi</label>
            <input type="text" class="form-control" id="updateProvinsi" name="provinsi" placeholder="Provinsi" required>
        </div>
    </div>
    <div class="col-md">
        <div class="form-update">
            <label>Kota/Kabupaten</label>
            <input type="text" class="form-control" id="updateKota" name="kota" placeholder="Kota/Kabupaten" required>
        </div>
    </div>
    <div class="col-md">
        <div class="form-update">
            <label>Kecamatan</label>
            <input type="text" class="form-control" id="updateKecamatan" name="kecamatan" placeholder="Kecamatan" required>
        </div>
    </div>
    <div class="col-md mb-2">
        <div class="form-update">
            <label for="updateKodepos">Kode Pos</label>
            <input type="text" class="form-control" id="updateKodepos" name="kodePos" placeholder="Kode Pos" required>
        </div>
    </div>

<script type="text/javascript">
$(document).ready(function() {
   
    $( "#updateAlamat" ).keyup(function() {
        $(".absolute-select").css("display","block");
        var destination = encodeURIComponent($(this).val());
        $.post( "<?php echo BASEURL.'cart/getDestination' ?>", { destination: destination })
        .done(function( data ) {
            $(".data-response-select").html(data);
        });
    });

    $(".absolute-select").on('click','.option-destination',function () {
        var valueText       = $(this).text();
        var provinsi        = $(this).data('provinsi');
        var kota            = $(this).data('kota');
        var kecamatan       = $(this).data('kecamatan');
        var kodepos         = $(this).data('kodepos');

        $("#updateProvinsi").val(provinsi);
        $("#updateKota").val(kota);
        $("#updateKecamatan").val(kecamatan);
        $("#updateKodepos").val(kodepos);
        $("#updateAlamat").val(valueText);
        $("#updateDestination").val(updateDestination);
        $(".absolute-select").css("display","none");
    });
});
</script>