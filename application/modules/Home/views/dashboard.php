<h4>Dashboard</h4>


<?php 

    dashCard('Appointments','Doctors/appointments',$count->appointments,'cog','green');

    dashCard('Admissions','Patients/admission',$count->admission,'user','blue');

    dashCard('Pharmacy','Pharmacy/products',$count->pharmacy,'medkit','teal');

    dashCard('Laboratory','Lab/tests',$count->labtest,'funnel','red');

?>

