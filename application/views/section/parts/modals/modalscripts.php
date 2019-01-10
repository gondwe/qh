<script>



$('#newModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var title = button.data('title') // Extract info from data-* attributes
    var modal = $(this)
    modal.find('.modal-title').text('Add New ' + title)
      $.get("<?=base_url('crud/ajaxNew/')?>" + title.toLowerCase() + '/' + id, function(dat){
          modal.find('.modal-body').html(dat)
      })
  })
  
  
  $('#exampleModalDel').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var table = button.data('title') // Extract info from data-* attributes
    var modal = $(this)
      modal.find('#yes').click(function(){
          $("#row" + id ).hide();
          $.post("<?=base_url('crud/ajaxDel/')?>" + table.toLowerCase() + '/' + id);
      });
    });
  
  
    $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var title = button.data('title') // Extract info from data-* attributes
    var modal = $(this)
    modal.find('.modal-title').text('Edit ' + title)
      $.get("<?=base_url('crud/ajaxEdit/')?>" + title.toLowerCase() + '/' + id, function(dat){
          modal.find('.modal-body').html(dat)
      })
  })
</script>