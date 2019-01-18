<script>
$(".printer").click(function(){
    
    let div = this.dataset.div;
    
    let url = this.dataset.url == "" ? 'divPrinter' : this.dataset.url + "/";
    
    let view = this.dataset.view;
    
    if(div == ""){
        
        window.location = "<?=base_url('Systems/customPrinter/')?>" + url + view;
        

    }else{
        
        let table = $("#" + div )[0].outerHTML;

        $.post("<?=base_url('Systems/')?>" + url , { "data":table}).then(function(){

            window.open( "<?=base_url('Systems/out/')?>" + view, "_blank");

        });
    }
});
</script>