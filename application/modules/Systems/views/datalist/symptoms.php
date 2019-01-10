<h4>Symptoms</h4>
<?php 


$p = new Tablo('symptoms');
$p->aliases("names,symptom");
$p->newButton();

echo '<div class="clearfi"></div>';
$p->tabloprops();
$p->table(0);

