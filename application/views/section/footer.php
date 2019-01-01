</div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>&copy; <?=date('Y')?> <a href="https://queenterichospital.org">Queenteric Hospital</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <?php //$this->load->view('section/parts/right_sidebar')?>
  <!-- /.control-sidebar -->


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>


<script>

/* prepare the system for printing a thing */
$(".printer").click(function(){
    
    let div = this.dataset.div;
    
    let url = this.dataset.url == "" ? null : this.dataset.url + "/";
    
    let view = this.dataset.view;
    
    if(div == ""){
        
        window.location = "<?=base_url('systems/customPrinter/')?>" + url + view;

    }else{
        
        let table = $("#" + div )[0].outerHTML;

        $.post("<?=base_url('systems/')?>" + url , { "data":table}).then(function(){

            window.location = "<?=base_url('systems/out/')?>" + view;

        });
    }
});



/* load the select boxes dynamic stylo */
$('select').each(function(){
    
    let combo = $(this);

    url = "<?=base_url('Systems/combo/')?>" + this.name + '/' + this.id;

    comboFeed(combo,url,0,this.dataset.select);

    combo.change(function(){
        console.log(this.value);
    })

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

<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- SlimScroll -->
<script src="<?=base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
<!-- FastClick -->
<script src="<?=base_url('assets/bower_components/fastclick/lib/fastclick.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('assets/dist/js/demo.js')?>"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>
