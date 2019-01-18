<?php 

class Doctors extends MX_Controller {


    public function __construct()
    {
     
        $this->load->model('Pharmacy/Product');

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

        $this->fetchPatient($param, "diagnosis");
    
    }


    public function appointments($section=null, $pid = null)
    {
    
        $section = $section ?? "dashboard";

        $data['info'] = is_null($pid) ? [] : $this->Patient->info($pid);

        serve('appointments/'.$section, $data);
    
    }

    public function prescription($param=null)
    {

        $data['rx'] = is_null($param)? [] : $this->Patient->rx($param);
        
        $data['info'] = is_null($param)? [] : $this->Patient->info($param);
    
        $location = is_null($param)? "search" : "prescription";

        serve('patient/'.$location, $data) ;
    
    }


    public function referal($param=null)
    {
    
        $this->fetchPatient($param, "referal");
    
    }

    public function consultation($param=null)
    {
    
       if(is_null($param)) { $this->fetchPatient($param, "consultation"); }else{

           $this->appointments('consultation', $param);
       }
    
    }

    public function theatre($param=null)
    {
    
        if(is_null($param)) { $this->fetchPatient($param, "consultation"); }else{

            $this->appointments('theatre', $param);
        }
    
    }



    public function fetchPatient($param, $view)
    {
    
        $data['info'] = is_null($param)? [] : $this->Patient->info($param);
    
        $location = is_null($param)? "search" : $view;

        serve('patient/'.$location, $data);     
    
    }















    public function productDashboard()
    {
    
        return $this->Product->all(); 
    
    }
}