

<?php 


// pf($products);

// table($products);

$t = new Tablo('products');
$t->hide('description,critical_level,reorder_level');
$t->newButton=true;
$t->print();
$t->table();