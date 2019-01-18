<?php 
// pf($options);
?>
<div class='box  box-primary'><div class='box-header with-border'><h3 class='box-title'>Misc Options</h3>
    <div class='box-tools pull-right'>
        <button type='button' class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
</div></div>
<div class='p-2'>

    <div class="container form-inline">
        <?php foreach($options as $v): ?>
        <div class="checkbox" style="margin:12px">
            <label>
                <input type="checkbox" class='subcat inline-item' value="<?=$v->id?>">
                <span><?=ucase($v->b)?></span>
            </label>
        </div>
    <?php endforeach; ?>

</div>

</div></div>   






<script>
items = [];
$('.subcat').change(function(){
    // $('#itemsList').html('');

    if(this.checked){
        if(items.indexOf(this.value) === -1) items.push(this.value);
    }else{
        items = arrayDel(items,this.value);
        $("#" + this.value).remove();
    }


    for(item in items ){
        a = $('#listItems').find('#'+items[item]);
        $.post('Lab/subcategoryTable/' + items[item], function(res){
            if(a.length){
                // $("#" + items[item]).remove();
            }else{
                $("#listItems").append(res);
            }
        })
    }

    // $cl = ['show','hide'];
    if(items.length == 0 ) $('#savebtn').addClass('hide');
    if(items.length > 0) $('#savebtn').removeClass('hide');

})


function arrayDel(arr, val){
    return arr.filter(function(ele){
        return ele !== val
    })
}

$('#savebtn').click(function(){
    
    $('.trs').each(function(i){
        // pf(i);
        pf($(this)[0].id);
    });

    // pf(data)
})

</script>