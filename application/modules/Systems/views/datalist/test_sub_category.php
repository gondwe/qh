<!-- <h4>Lab Test Categories</h4> -->
<?php 


$p = new Tablo('vdata');
// $p->aliased = "patient_categories";
$p->aliases("b,sub_category");
$p->aliases("c,category");
$p->aliases("d,price");
$p->combos("c","select id, b from vdata where a = 'testcat'");
$p->hidden("a","testsubcat");
// $p->formgrid(4,6,12);
$p->where("a = 'testsubcat'");
$p->newButton();

// $p->hide('c');
$p->ucase('b');
$p->ucase('c');
$p->tabloprops();
?>

<div class='box  box-primary'><div class='box-header with-border'><h3 class='box-title'>Sub Categories</h3>
    <div class='box-tools pull-right'>
        <button type='button' class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
</div></div>
<div class='p-2'><?php $p->table(0); ?>
</div></div>
