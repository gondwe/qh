<h5>Patient Admission</h5>
<?php 

$d = new Tablo('patients');


// $d->tabloprops();

$d->hide('email,dob, nationalid, tel2');
$d->ucase('category');
$d->newButton();
$d->button('<i class="fa fa-bell text-green"></i> Q','doctors/queue');
$d->button('<i class="fa fa-warning text-red"></i> Discharge','patients/discharge');
$d->limit(10);
$d->delete = false;

$d->table(2);

?>
