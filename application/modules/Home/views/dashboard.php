<h4>Dashboard</h4>


<?php 

    dashCard('Appointments','doctors/appointments',$count->appointments,'cog','green');

    dashCard('Admissions','patients/admission',$count->admission,'user','blue');

    dashCard('Pharmacy','pharmacy/products',$count->pharmacy,'medkit','teal');

    dashCard('Laboratory','lab/tests',$count->labtest,'funnel','red');

?>

