
<?php 

$d = new Tablo('patients');
$total = get("select count(id) total from patients where weekofyear(date) = weekofyear(curdate())")[0]->total;
// pf($total);
dashCard('Recent Admissions','#',$total);
// $d->tabloprops();

$d->newButton();
$d->hide('email,dob, nationalid, tel2');
$d->ucase('category');
$d->combos('discharged','select id, b from vdata where a = "yesno"');
$d->hidden('discharged',0);
$d->where('weekofyear(date) = weekofyear(curdate())');
$d->button('<i class="fa fa-bell text-green"></i> Q','Doctors/queue');
$d->button('<i class="fa fa-warning text-red"></i> Discharge','Patients/discharge');
$d->limit($total);
$d->delete = false;
// $d->tabloprops();

// $d->table(0);
?>

<div class="clearfix">

</div>

<div class='box  box-primary'><div class='box-header with-border'><h3 class='box-title'>Recente Patients</h3>
    <div class='box-tools pull-right'>
        <button type='button' class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
</div></div>
<div class='p-2'><?php $d->table(0); ?>
</div></div>

<?php 


$e = new Tablo('patients');
$e->tableid = 'ex2';
$e->hide('email,dob, nationalid, tel2');
$e->ucase('category');
$e->button('<i class="fa fa-bell text-green"></i> Q','Doctors/queue');
$e->button('<i class="fa fa-warning text-red"></i> Discharge','Patients/discharge');
$e->delete = false;
$e->limit(10);


?>




<div class='box  box-primary mt-3'><div class='box-header with-border'><h3 class='box-title'>All Patients</h3>
    <div class='box-tools pull-right'>
        <button type='button' class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
</div></div>
<div class='p-2'><?php $e->table(2); ?>
</div></div>    