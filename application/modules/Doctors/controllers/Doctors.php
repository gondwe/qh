<?php 

class Doctors extends MX_Controller {


    public function __construct()
    {
     
        $this->load->model('pharmacy/Product');

        $this->load->model('Patient');
     
    }


    public function queue($pid)
    {
        if(isset($_POST['pid'])) {

            $this->db->insert('queues',$_POST);

            swal("patient queued successfully", 'success');

        }
    
        $data['info'] = $this->Patient->info($pid);

        serve('patient/queue',$data);

    }
	
	
	public function index()
	{
		
		serve('dashboard');
    }
    

    public function diagnosis($param=null)
    {

        $data['info'] = is_null($param)? [] : $this->Patient->info($param);
    
        $location = is_null($param)? "search" : "diagnosis";

        serve('patient/'.$location, $data) ;
    
    }

    public function prescription($param=null)
    {

        $data['info'] = is_null($param)? [] : $this->Patient->info($param);

        $data['rx'] = is_null($param)? [] : $this->Patient->rx($param);
    
        $location = is_null($param)? "search" : "prescription";

        serve('patient/'.$location, $data) ;
    
    }


    public function referal($param=null)
    {
    
        $data['info'] = is_null($param)? [] : $this->Patient->info($param);
    
        $location = is_null($param)? "search" : "referal";

        serve('patient/'.$location, $data) ;     
    
    }
















    public function productDashboard()
    {
    
        return $this->Product->all(); 
    
    }
}