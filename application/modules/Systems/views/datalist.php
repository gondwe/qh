<?php 

$datalist = [
    "Symptoms",
    "Beds",
    "room_Categories",
    "room_Names",
    "rooms",
];

$a = $this->uri->segment(3) ?? 0;

?>
<div class="row">
<div class="col-md-2" style='border-right:1px solid #dcdcdc'>
    <?php foreach($datalist as $key=>$val): $active = $a == $key? 'info' : 'default'; ?>
        <a class="btn btn-<?=$active?> btn-block btn-sm" href="<?=base_url("systems/data/{$key}")?>" ><?=rxx($val)?></a>
    <?php endforeach; ?>
</div>
<div class="col-md-10">
    <?php $this->load->view('datalist/'.strtolower($datalist[$a])) ?>
</div>
</div>

