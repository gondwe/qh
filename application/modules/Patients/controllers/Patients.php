<?php 


/* 
    *
    *   author:ace
    *
 */


class Patients extends MX_Controller {

    
    public function __construct()
    {
    
        $this->load->model('Patient');
    }


    public function save($param,$id)
    {
    
        $action = "save".strtolower($param);

        if($this->Patient->$action($id)) redirect('doctors/diagnosis/'.$id);
        
    }



    public function saveRx()
    {
    
        $this->db->insert_batch('rx',$_POST['data']);
    
    }


    public function admission($param=null)
    {
    
        if($param == "list") serve('admission/list'); 
    
    }


    public function discharge($param)
    {
    
        $data['info'] = $this->Patient->info($param);

        serve('discharge',$data);
    
    }


    public function discharged()
    {
    
        serve('discharged');
    
    }
}