<h4>Patient's Rx</h4>

<?php 

$this->load->view('patients/strip', array('info'=>$info));

?>
<div class="clearfix mt-3">

</div>

<div class="row">
    <div class="col-md-8 " style="border-right:1px solid #dcdcdc">
    
    <?php $this->load->view('rx/form')?>

    <div class="clearfix">
    
    </div>
    
    <?php $this->load->view('rx/list') ?>
    
    </div>

    <?php $this->load->view('rx/totals') ?>
   
</div>

<?php $this->load->view('rx/scripts') ?>