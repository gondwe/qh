<h4>Prescription</h4>

        <h2 class=''><?=$info->names?></h2>
        <span class=''><b>Address</b> <?=$info->postaladdress?></span>
        <span class='badge badge-primary' style="margin-bottom:3px"><b></b> <?=$info->email?></span>
        <span class='pull-right'><b>Contacts</b> <?=implode(' / ',[$info->tel1,$info->tel2])?></span>

<?php 

// pf($info);

?>
<div class="clearfix mt-3">

</div>

<div class="row">
    <div class="col-md-8 " style="border-right:1px solid #dcdcdc">
    <form method="post">
        <div class="col-md-5 col-sm-4 col-xs-6">
        <div class='form-group'>
            <label>Rx</label>
                <select required class='form-control select2' style='width:100%;' data-select='Products OR Services' name='products' id='name' >
            </select>
        </div>
        </div>
        <div class="col-md-2  col-sm-2 col-xs-4">
            <div class="form-group">
              <label for="qty">Qty</label>
              <input required type="number" class="form-control" name="qty" id="qty" aria-describedby="helpId" placeholder="">
              
            </div>
        </div>
        <div class="col-md-2  col-sm-2 col-xs-4">
            <div class="form-group">
              <label for="qty">Prd</label>
              <input required type="number" class="form-control" name="prd" id="qty" aria-describedby="helpId" placeholder="">
              
            </div>
        </div>
        <div class="col-md-2  col-sm-2 col-xs-4">
            <div class="form-group">
              <label for="qty">Rate</label>
              <input required type="text" class="form-control" name="rate" id="qty" aria-describedby="helpId" placeholder="1x2">
              
            </div>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
            <div class="form-group">
              <label for="qty">&nbsp</label>
              <button required type="submit" class="form-control btn-success"><i class="fa fa-plus"></i></button>
              
            </div>
        </div>
    </form>
    
    <div class="clearfix">
    
    </div>
    
    <div class='ml-1' >
        <div class="panel panel-default" id="rxl">
        <!-- Default panel contents -->
        <div class="panel panel-title" style="padding:10px"><i class="fa fa-plus-circle text-green"></i> Rx
            <span class="pull-right">
                <?php printButton('rxl','','rx') ?>
            </span>
            button
        </div>
            <table class="table">
                <tbody id="rx">

                </tbody>
            </table>
            <button type="button" class="savebtn hide btn btn-success btn-sm m-1 pull-right">SAVE RX</button>
        </div> 
    </div>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">

        
        <div class="clearfix">
            
        </div>
            
        
        <div id="totalsDiv" class="hide panel panel-default" style="padding-left:10px">
                
            <div id="pdetail"></div>    
            
            <hr>
            
            <span class='small' id="smallTotal"></span>
            <h1 id='rTotal'></h1>
            
        </div>
                
                
    </div>
</div>


<script>
    var total = [];
    var prods = [];
    prodid = 0;
    $('form').submit(function(e){
        let data =$(this).serialize() + "&prodid="+prodid;
        // pf(data);
        $.get("<?=base_url('products/rxStrip')?>", {data}, function(res){
            $('#rx').append(res);
            prodid += 1;
            
        }).then(
            $.get("<?=base_url('products/jsondata/')?>" + $('[name="products"]').val(), function(res){
            res = $.parseJSON(res);
            // pf(res);
            // pf(res["id"]);
            // pf(res.id);
            prods.push(res.id);
            total.push( parseInt(res.unit_price) *  parseInt($('[name="qty"]').val())) ;
            
            // let rTotal = total.length > 0 ?  total.reduce(function(a,b){ return a + b; }) : '0';
            // $('#rTotal').text('KES ' + parseInt(rTotal) + '.00');
            totalize();
        }) 
        );
        e.preventDefault();
    });

    $('[name="products"]').change(function(){
        $.get("<?=base_url('products/detail/')?>"+this.value, function(res){
            $('#pdetail').html(res);
        }).then($.get("<?=base_url('products/price/')?>"+this.value, function(res){
            $('#smallTotal').text('KES ' + parseInt(res) + '.00');
            // total.push(55);
            // pf(total);
            totalize();
        })
        )
    });

    const totalize=function(){
        $('#totalsDiv').removeClass('hide')

        if(prods.length){ $('.savebtn').removeClass('hide'); }else{$('.savebtn').addClass('hide');}
        let rTotal = total.length ? total.reduce(function(a,b){ return a + b; }) : '0';
        $('#rTotal').text('KES ' + parseInt(rTotal) + '.00');
    }

    function removerx(e){
        qty = $(e).data("qty");
        price = $(e).data("price");
        id = $(e).data("id");
        product = $(e).data("product");
        amt = parseInt(qty) * parseInt(price);


        pf(product);

        for(let key in total){
            if(total[key] == amt){
                total.splice(key,1);
            }
        }

        for(let key in prods){
            if(prods[key] == product){
                prods.splice(key,1);
            }
        }

        $("#"+id).fadeOut(1000);
        
        totalize();
    }

    $('.savebtn').click(function(){
        let data = [];
        $('.rxdata').each(function(){
            let item = $(this);
            let arr = {
                "rate":item.data('rate'),
                "duration":item.data('prd'),
                "qty":item.data('qty'),
                "product":item.data('product'),
                "pid":"<?=$info->id?>",
                "docid":"<?=$this->session->user_id?>"
            }
            data.push(arr);
        })

        $.post('<?=base_url("patients/saveRx")?>', {data}, function(){
            
            /* resolve */
            
        })
    })
</script>