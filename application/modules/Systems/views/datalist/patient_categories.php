<h4>Patient Categories</h4>
<?php 


$p = new Tablo('vdata');
// $p->aliased = "patient_categories";
$p->aliases("b,category");
$p->aliases("c,abbr");
$p->hidden("a","patcat");
// $p->formgrid(4,6,12);
$p->where("a = 'patcat'");
$p->newButton();

$p->ucase('c');
$p->ucase('b');
$p->table(0);
$p->tabloprops();

