<h2 class=''><?=ucwords(strtolower($info->names))?></h2>

<span class=''><b>Address</b> <?=$info->postaladdress?></span>

<span class='badge badge-primary' style="margin-bottom:3px"><b></b> <?=$info->email?></span>

<span class='pull-right'><b>Contacts</b> <?=implode(' / ',[$info->tel1,$info->tel2])?></span>