<h5>Patient Refereal</h5>
<!-- <hr> -->
<?php 


$this->load->view('patients/strip', array('info'=>$info));
hr();

echo '<div class="col border-right">';


$t = new Tablo('referals');
$t->hidden('pid',$info->id);
$t->hidden('docid',$this->session->user_id);
$t->formgrid(12,12,12);
$t->aliases('hospital,hospital /institution /medical consultant');
$t->newform();
?>

</div>

<div class="clearfix">

</div>

<hr>
<div class="col" style="margin-right:15px">
<h5 class="">Referal History</h5>
<?php 
$s = new Tablo('referals');
$s->where('pid='.$info->id);
$s->aliases('docid, refering doctor');
$s->hide('pid');
$s->ucase('hospital');
$s->combos('docid','select id, concat(first_name," ",last_name) names from users');
$s->table(0);
$s->tabloprops();
?>
</div>
</div>

