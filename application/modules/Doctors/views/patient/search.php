<!-- <h5>Search Patient</h5> -->

<?php $section = $this->uri->segment(2); ?>

<div class='form-group'>
    <label>Search Patient</label>
        <select class='form-control select2' style='width:100%;' data-select='names' name='patients' id='names/tel1/id' >
    </select>
</div>
<?php 




switch($this->uri->segment(2)){

    case "theatre" : $this->load->view('appointments/upcoming/theatre'); break;

    case "consultation" : $this->load->view('appointments/upcoming/consultation'); break;
    
}


?>

<script>
    $('[name=patients]').change(function(){
        window.location = '<?=base_url("doctors/{$section}/")?>' + this.value;
    })
</script>