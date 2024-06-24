<section class="w-100 p-4 d-flex justify-content-center pb-4" id="voucher-detail">
	<div style="width: 26rem;">
		<div class="container mt-5">
	    	<div class="row">
	    		<div class="col-lg-12 col-md-12">
	    			<div class="card-voucher d-flex">
	    				<div class="grid-one" style="background-image:url('<?php echo ASSETS.'img/backgrounds/voucher-bg-left.png' ?>');">
	    					<div class="title-voucher"><?php echo $vo['voucher_title'] ?></div>
		    				<div class="valid-date-voucher"><i class="bi bi-calendar-week"></i> <?php echo $vo['start_date'] ?> s/d <?php echo $vo['end_date'] ?></div>
		    				<div class="description-voucher"><?php echo $vo['voucher_desc'] ?></div>
	    				</div>
	    				<div class="grid-two" style="background-image:url('<?php echo ASSETS.'img/backgrounds/voucher-bg-right.png' ?>');">
	    					<div class="kategori-voucher"><?php if($vo['voucher_category'] == 1){echo"Diskon";} ?></div>
	    					<div class="amount-voucher"><?php echo $vo['voucher_value'] ?>%</div>
	    				</div>
	    			</div>
	    		</div>
	    		<div class="col-12 mt-4">
	    			<div class="text-voucher fw-bold">Masa Berlaku</div>
	    			<div class="text-voucher f-15"><?php echo date('Y F H:i:s',strtotime($vo['start_date'])) ?> - <?php echo date('Y F H:i:s',strtotime($vo['end_date'])) ?></div>

	    			<div class="text-voucher fw-bold mt-3">Promosi</div>
	    			<div class="text-voucher f-15"><?php echo $vo['voucher_title'] ?></div>

	    			<div class="text-voucher fw-bold mt-3">Deskripsi</div>
	    			<div class="text-voucher f-15"><?php echo $vo['voucher_desc'] ?></div>

	    			<div class="text-voucher fw-bold mt-3">Syarat Dan Ketentuan</div>
	    			<div class="text-voucher f-15"><?php echo $vo['voucher_sk'] ?></div>
	    		</div>
	    	</div>
	    </div>
	</div>
</section>