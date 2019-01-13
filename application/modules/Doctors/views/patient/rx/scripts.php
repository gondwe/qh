
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

    const totalize=function(i=false){

        if(i){ total = []; prods = []; }

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

        swallow("patients/saveRx",data,'prescription');
        
        totalize(true);
    })
    
    

</script>