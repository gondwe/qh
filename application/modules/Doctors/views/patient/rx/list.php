    
    <div class='ml-1' >
        <div class="panel panel-default" id="rxl">
        <!-- Default panel contents -->
        <div class="panel panel-title" style="padding:10px"><i class="fa fa-plus-circle text-green"></i> Prescription List
            
            
        </div>
            <table class="table">
                <tbody id="rx">

                </tbody>
            </table>
            <button type="button" style="margin:15px" class="savebtn hide btn btn-success btn-sm m-1 pull-right">SAVE PRESCRIPTION</button>
        </div> 
    </div>



<div class="clearfix">

</div>

    <?php 
    // pf($rx);
        if(!empty($rx)){

            foreach($rx as $date=> $rxd):
            ?>
    <div class='ml-1' >
        <div class="panel panel-default" id="rxl-<?=strval($date)?>">
        <!-- Default panel contents -->
        <div class="panel panel-title" style="padding:10px">
            <span class="text-success">Date : <?=df($date)?></span>
            <span class="pull-right">
                <?php printButton('rxl-'.strval($date),'','rx') ?>
            </span>
            
        </div>
            <table class="table">
                <tbody id="rx">
                    <?php 
                    
                    foreach($rxd as $data)
                    {
?>
    <tr>
        <td><?=rx($data->name)?></td>
        <td><?=$data->qty." ".$data->unit?></td>
        <td><?=$data->rate?></td>
        <td><?=$data->duration?> day(s)</td>
        <!-- <td><i ></i></td> -->
    </tr>
<?php
                    }
                    
                    ?>
                </tbody>
            </table>
            <!-- <button type="button" class="savebtn hide btn btn-success btn-sm m-1 pull-right">SAVE PRESCRIPTION</button> -->
        </div> 
    </div>
            <?php 
    endforeach;  
        }
    

    ?>
    
    

