<h4>Theatre</h4>
<?php 

$p = new Tablo('appointments');
$consult = $this->db->query("select id from vdata where a = 'apcat' and b like '%heat%'")->row('id');

$p->where("apcat ='$consult'");
$p->aliases('apcat,category');
$p->combos('apcat','select id, b from vdata where a = "apcat"');
$p->combos('pid','select id, names name from patients');
$p->combos('docid','select id, concat(first_name," ",last_name) name from users');
$p->aliases('docid,doctor');
$p->aliases('pid,patient');
$p->aliases('apdate,date');
$p->ucase('docid');
$p->ucase('apcat');
$p->ucase('pid');

if(isset($info->id)){

    $this->load->view('patients/strip',['info',$info]);
    
    echo '<div class="mb-2 clearfix"></div>';
    $p->hidden('pid',$info->id);
    $p->hidden('apcat',$consult);
    $p->newButton();
    echo '<div class="mb-2 clearfix"></div><h4>Schedules</h4><hr>';
    $p->where("pid = '$info->id'");
    $p->table(0);
    
    
}else{

    $total = $this->db->where('apcat', $consult)->count_all('appointments');
    
    echo '<div class="mb-2">';
    dashCard('Theatre Operations','doctors/theatre',$total,'bell','teal','Queue Appointment','plus-circle');
    echo '<a  class="btn btn-sm btn-primary pull-right" href="'.base_url('doctors/theatre').'" role="button">QUEUE NEW APPOINTMENT</a>';
    echo '</div>';
    $p->button('<span class="btn btn-sm btn-danger">RESCHEDULE</span>','doctors/appointments/reschedule');
    $p->table(0);


}


$p->tabloprops();

