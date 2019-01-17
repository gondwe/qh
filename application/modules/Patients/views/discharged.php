<?php 

$d = new Tablo('patients');


// $d->tabloprops();

$d->hide('email,dob, nationalid, tel2, discharged');
$d->ucase('category');
$d->where('discharged = 1');
// $d->newButton();
$d->button('<i class="fa fa-dollar text-red"></i> INVOICE ','billing/invoice');
// $d->button('<i class="fa fa-warning text-red"></i> Discharge','patients/discharge');
$d->limit(10);
$d->delete = false;
$d->edit = false;

// $d->table(2);

?>

<div class='box  box-primary'><div class='box-header with-border'><h3 class='box-title'>Discharged</h3>
    <div class='box-tools pull-right'>
        <button type='button' class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
</div></div>
<div class='p-2'><?php $d->table(2); ?>
</div></div>
