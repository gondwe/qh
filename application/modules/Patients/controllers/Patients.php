<?php 

class Patients extends MX_Controller {

    public function __construct()
    {
        $this->load->model('Patient');
    }

    public function save($param,$id)
    {
    
        $action = "save".strtolower($param);
        if($this->Patient->$action($id)) redirect('doctor/diagnosis/'.$id);
        
    }


    public function saveRx()
    {
    
        pf($_POST);
    
    }
}