
<?php foreach ($dataKurir['history'] as $key => $history): ?>	
<div style="margin-bottom: 10px;color: black;">
	<small class="badge info" style="    background-color: rgba(157, 154, 152, 0.2);
    color: #404040;
    font-weight: 400;
    margin-left: 4px;"><?php echo $history['status'] ?></small>
	<div class="note" style="color: black;"><?php echo $history['note'] ?></div>
	<div class="date" style="color: black;"><?php echo date("Y-m-d H:i",strtotime($history['updated_at'])) ?></div>
</div>
<?php endforeach ?>