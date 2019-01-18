<h4>Diagnosis</h4>

        <h2 class=''><?=$info->names?></h2>
        <span class=''><b>Address</b> <?=$info->postaladdress?></span>
        <span class='badge badge-primary' style="margin-bottom:3px"><b></b> <?=$info->email?></span>
        <span class='pull-right'><b>Contacts</b> <?=implode(' / ',[$info->tel1,$info->tel2])?></span>

<?php 

// pf($info);

dataTableModals();

?>
<div class="clearfix">

</div>


<div class="col-md-4 mt-1">
        <form action="<?=base_url('Patients/save/diagnosis/'.$info->id)?>" method="post">
                <div class='form-group'>
                        <label>Symptoms</label>
                                <select class='form-control select2' style='width:100%;' data-select='symptom' name='symptoms' id='names' >
                        </select>
                </div> 

                <div class="form-group">
                <label for="">Notes</label>
                <textarea name="notes" class="form-control" name="" id="" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                
        </form>
</div>

<?php 

$p= new Tablo('diagnosis');
$p->where('pid = '.$info->id);
$p->hidden('pid', $info->id);
$p->combos('doc_id','select id, concat(first_name," ",last_name) from users');
$p->combos('symptom','select id, names from symptoms');
$p->tabloprops();
$p->table(0);


