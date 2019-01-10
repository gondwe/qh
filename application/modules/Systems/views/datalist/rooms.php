<!-- <h4>Rooms</h4> -->
<h4>Assign Beds</h4>
<?php 

$a = new Tablo('wards');
$a->combos('names', 'select id, b  from vdata where a ="wardname"');
$a->combos('bed', 'select id, names from beds where id not in (select bed from wards)');
$a->combos('category', "select id, b from vdata where a ='wardcat'");
$a->newform();


echo '<div class="clearfix"></div>';

$p = new Tablo('wards');
$p->combos('names', 'select id, b  from vdata where a ="wardname"');
$p->combos('bed', 'select id, ucase(names) from beds');
$p->combos('category', "select id, ucase(b) as category from vdata where a ='wardcat'");
$p->edit = false;
// $p->sqlstring = "";


$p->table(0);

