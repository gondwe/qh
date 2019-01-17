<h4>Upcoming Visits</h4>
<?php 

$consult = $this->db->query("select id from vdata where a = 'apcat' and b like '%cons%'")->row('id');

$p = new Tablo('appointments');
$p->where("apcat ='$consult'");
$p->aliases('apcat,category');
$p->combos('apcat','select id, b from vdata where a = "apcat"');
$p->combos('pid','select id, names name from patients');
$p->combos('docid','select id, concat(first_name," ",last_name) name from users');
$p->aliases('docid,doctor');
$p->aliases('pid,patient');
$p->aliases('apdate,date');
$p->ucase('docid');
$p->ucase('apcat');
$p->ucase('pid');
$p->hide('apcat');

$p->table(0);