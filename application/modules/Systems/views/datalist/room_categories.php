<h4>Rooms Categories</h4>
<?php 

// $a = new Tablo('wards');
// $a->combos('names', 'select id, names from wards');
// $a->combos('bed', 'select id, names from beds where id not in (select bed from wards)');
// $a->newform();


echo '<div class="clearfix"></div>';

$q = new Tablo('vdata');
$q->hidden("a",'wardcat');
$q->aliased = 'ward_categories';
$q->aliases['b'] = 'category';
$q->aliases['c'] = 'price';

$q->sqlstring = "select id,b category,c price from vdata where a = 'wardcat' ";

$q->newButton();
$q->tabloprops();   
$q->table(0);
// pf($_SESSION['tabloprops']);


