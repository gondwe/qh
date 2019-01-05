
<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css')?>">
<?php

$data = $_SESSION['tablePrint'];

echo '<img src="'.base_url('assets/imgs/XLS6.PNG').'" alt="" srcset="">';

table($data, "table-striped table-bordered");

?>
