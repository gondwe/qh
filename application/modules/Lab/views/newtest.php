<h5>Lab Test</h5>
<div class='box  box-primary'><div class='box-header with-border'><h3 class='box-title'>Patients Info</h3>
    <div class='box-tools pull-right'>
        <button type='button' class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
</div></div>
<div class="container">
<div class='p-1'>

    <div class="col-md-3">
        <div class='form-group'>
            <label>Patient</label>
                <select class='form-control select2' style='width:100%;' data-select='PATIENT REF' name='patients' id='names/id' >
            </select>
        </div>  
    </div>

    <div class="col-md-3">
        <div class='form-group'>
            <label>Test Category</label>
                <select class='form-control select2' style='width:100%;' data-select='TEST CATEGORY' name='vdata' id='b/a/testcat' >
            </select>
        </div>
    </div>


</div>
</div>
</div>    


<div id="misc" class='hide box  box-primary'><div class='box-header with-border'><h3 class='box-title'>Misc Options</h3>
    <div class='box-tools pull-right'>
        <button type='button' class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
</div></div>
<div class='p-2'>

    <div class="container form-inline">
    
    <div id="options"></div>
    

</div>

</div></div> 


<?php printButton('tests','','div') ?>

<div class="table table-responsive" id='tests'>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Test</th>
                <th>category</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody id="listItems">

</tbody>
    </table>
<button type="submit" id='savebtn' class="hide btn btn-sm btn-success pull-right">SAVE</button>
</div>



<script>
$("[name='vdata']").change(function(){

    $.post('Lab/subcategories/'+this.value ).then(
        function(res){
            elem = "";
            data = $.parseJSON(res);
            
            if(data.length) $('#misc').removeClass('hide');

            for(i in data){
                node = data[i];
            
                elem += `<div class="checkbox" style="margin:12px">
            <label><input type="checkbox" onchange="subcat(this,event)" class='subcat inline-item' id="`+node.id+`" value="`+node.id+`"><span>`+ node.b.toUpperCase() +`</span></label></div>`

            }

            $('#options').html(elem);
            // pf(elem);
        }
    )

})

  

items = [];

function subcat(e,x){
    
    if(e.checked){
    
        if(items.indexOf(this.value) === -1) items.push(this.value);
        $.post('Lab/subcategoryTable/' + e.value, function(res){
            $("#listItems").append(res);
        })

    }else{
        items = arrayDel(items,this.value);
        $("#tr" + e.value).remove();

    }

    if(items.length == 0 ) $('#savebtn').addClass('hide');
    if(items.length > 0) $('#savebtn').removeClass('hide');

}


$('#savebtn').click(function(){
    ids = [];
    $('.trs').each(function(i){
      ids.push($(this)[0].id.substr(2));
    })

    patient = $("[name='patients']").val();
    
    if(patient == null){ swal('Patient No.','Please Select A Patient', 'error'); return; }

    pf(patient);

    swallow("Lab/saveTests/" + patient, {ids}, 'Lab Tests');

    $(this).addClass('hide');
})


</script>