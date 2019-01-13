<h5>Queue Patient</h5>

<?php 

$this->load->view('patients/strip',['info'=>$info]);



?>
<hr>
<form action="<?=base_url('doctors/queue/'.$info->id)?>" method="post">

<div class='form-group'>
    <label>SELECT USER/ SECTION</label>
    <select class='form-control select2' style='width:100%;' data-select='User /Section' name='uid' ></select>
</div>


<input type="hidden" name="pid" id="inputpid" class="form-control" value="<?=$info->id?>">


<button type="submit" class="btn btn-primary">QUEUE PATIENT</button>


</form>