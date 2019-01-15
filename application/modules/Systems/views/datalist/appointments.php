<h4>Appointment Categories</h4>
<?php 


$p = new Tablo('vdata');
// $p->aliased = "patient_categories";
$p->aliases("b,category");
$p->hidden("a","apcat");
$p->hide("c");
// $p->formgrid(4,6,12);
$p->where("a = 'apcat'");
$p->newButton();

$p->ucase('c');
$p->ucase('b');
$p->table(0);
$p->tabloprops();
