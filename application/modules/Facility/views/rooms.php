<h4>Rooms Names</h4>
<?php 

// $a = new Tablo('wards');
// $a->combos('names', 'select id, names from wards');
// $a->combos('bed', 'select id, names from beds where id not in (select bed from wards)');
// $a->newform();


echo '<div class="clearfix"></div>';

$q = new Tablo('vdata');
$q->hidden("a",'wardname');
$q->aliased = 'ward_names';
$q->formgrid(6,6,12);
$q->hide('c');
$q->aliases['b'] = 'Room Name';
// $q->aliases['c'] = 'price';

$q->sqlstring = "select id,b room_name from vdata where a = 'wardname' ";

$q->newButton();
$q->tabloprops();   
$q->table(0);



