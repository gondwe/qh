<!-- <h5>Search Patient</h5> -->

<?php $section = $this->uri->segment(2); ?>

<div class='form-group'>
    <label>Search Patient</label>
        <select class='form-control select2' style='width:100%;' data-select='names' name='patients' id='names/tel1/id' >
    </select>
</div>
<?php 


?>

<script>
    $('[name=patients]').change(function(){
        window.location = '<?=base_url("doctor/{$section}/")?>' + this.value;
    })
</script>