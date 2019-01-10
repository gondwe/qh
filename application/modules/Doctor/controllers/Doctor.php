<?php 

class Doctor extends MX_Controller {


    public function __construct()
    {
     
        $this->load->model('pharmacy/Product');

        $this->load->model('Patient');
     
    }


    public function products($action='dashboard')
    {
    


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
    
        $location = is_null($param)? "search" : "prescription";

        serve('patient/'.$location, $data) ;
    
    }
















    public function productDashboard()
    {
    
        return $this->Product->all(); 
    
    }
}