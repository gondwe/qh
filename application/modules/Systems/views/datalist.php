<?php 

$datalist = [
    "Symptoms",
    "Beds",
    "room_Categories",
    "room_Names",
    "rooms",
    "patient_categories",
    "appointments",
    "test_category",
    "test_sub_category",
];


$a = $this->uri->segment(3) ?? 0;

?>
<div class="row">
<div class="col-md-3" style='border-right:1px solid #dcdcdc'>
    <?php foreach($datalist as $key=>$val): $active = $a == $key? 'info' : 'default'; ?>
        <a class="btn btn-<?=$active?> mb-1 btn-sm" href="<?=base_url("systems/data/{$key}")?>" ><?=rxx($val)?></a>
        
    <?php endforeach; ?>

</div>
<div class="col-md-9">
    <?php $this->load->view('datalist/'.strtolower($datalist[$a])) ?>
</div>
</div>

