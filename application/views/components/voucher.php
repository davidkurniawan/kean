<div class="container-fluid dialog py-0 mt-5">
    <div class="container ">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-section d-flex gap-1 gap-lg-3">
                    <h3>Voucher</h3>
                    <i class="bi bi-arrow-right-circle-fill"></i>
                    <div><a href="<?php echo BASEURL.'address/list' ?>">View All</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
    	<div class="row">
    		<?php foreach ($voucher as $key => $vo): ?>
    		<div class="col-lg-4">
    			<a href="<?php echo BASEURL.'voucher/detail/'.$vo['voucher_slug'] ?>" class="card-voucher d-flex">
    				<div class="grid-one" style="background-image:url('<?php echo ASSETS.'img/backgrounds/voucher-bg-left.png' ?>');">
    					<div class="title-voucher"><?php echo $vo['voucher_title'] ?></div>
	    				<div class="valid-date-voucher"><i class="bi bi-calendar-week"></i> <?php echo $vo['start_date'] ?> s/d <?php echo $vo['end_date'] ?></div>
	    				<div class="description-voucher"><?php echo $vo['voucher_desc'] ?></div>
    				</div>
    				<div class="grid-two" style="background-image:url('<?php echo ASSETS.'img/backgrounds/voucher-bg-right.png' ?>');">
    					<div class="kategori-voucher"><?php if($vo['voucher_category'] == 1){echo"Diskon";} ?></div>
    					<div class="amount-voucher"><?php echo $vo['voucher_value'] ?>%</div>
    				</div>
    			</a>
    		</div>
    		<?php endforeach ?>
    	</div>
    </div>
</div>
