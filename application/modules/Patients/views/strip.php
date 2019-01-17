
<div class='box  box-primary'><div class='box-header with-border'><h3 class='box-title'>Personal Info</h3>
    <div class='box-tools pull-right'>
        <button type='button' class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
</div></div>
<div class='pl-2 pb-1 pr-1'>

<h2 class=''><?=ucwords(strtolower($info->names))?></h2>

<span class=''><b>Address</b> <?=$info->postaladdress?></span>

<span class='badge badge-primary' style="margin-bottom:3px"><b></b> <?=$info->email?></span>

<span class='pull-right'><b>Contacts</b> <?=implode(' / ',[$info->tel1,$info->tel2])?></span>


</div></div>