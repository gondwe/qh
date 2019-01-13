<h5>Discharged Patients</h5>
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

$d->table(2);

?>
