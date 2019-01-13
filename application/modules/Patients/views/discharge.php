<h5>Dsicharge Patient</h5>

<?php 

$this->load->view('patients/strip',['info'=>$info]);

if(isset($_POST['d'])){
    process("update patients set discharged = 1 where id = '$info->id'");
}

$dis = $info->discharged ? 'disabled' : null;
$type = $info->discharged ? 'button' : 'submit';

?>


<div class="clearfix mt-2">
&nbsp
</div>

<form action="" method="post" class=''>
    
    <button type="<?=$type?>" name='d'  class="<?=$dis?> btn btn-danger">Click To Discharge Patient</button>
    
</form>

<?php


if($info->discharged){ 

    $this->load->view('invoice');
    
}