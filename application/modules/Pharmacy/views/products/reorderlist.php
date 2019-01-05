<?php 


$t = new Tablo('products');

$t->hide('description,critical_level,reorder_level');

$t->where('quantity < reorder_level');
$t->limit(10);

$t->print();

$t->table();