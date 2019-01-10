<script>
$('.select2').each(function(){
    
    let combo = $(this);

    url = "<?=base_url('Systems/combo/')?>" + this.name + '/' + this.id;

    comboFeed(combo,url,0,this.dataset.select);
    
});


/* assist with populating the select2 combo */
function comboFeed(selector,url,minInputLength,placeholder){
    selector.select2({
        minimumInputLength:minInputLength,
        placeholder:placeholder,
        ajax: {
            url: url,
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    
                    page: params.page
                };
            },
            processResults: function (data) {
                if(data.length < 1){
                    // let title  = placeholder[0].toUpperCase() + placeholder.substr(1).toLowerCase();
                    // let name = this.$element[0].name;
                    // let add = '<a name="" id="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#newModal" data-title="' + name + '" >Add New '+ title +'</a>';

                    // this.$element.next().append(add);
                    
                }
                return {
                    results: $.map(data, function(obj) {
                        return { 
                            
                            id: obj[Object.keys(obj)[0]], 
                            
                            text: obj[Object.keys(obj)[1]] };
                    })
                };
            },
            
            cache: true
        },
        debug:false
    });
}
</script>