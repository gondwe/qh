<?php 

class Doctor extends MX_Controller {


    public function __construct()
    {
     
        $this->load->model('pharmacy/Product');
     
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
    
        $location = is_null($param)? "search" : "diagnosis";

        serve('patient/'.$location) ;
    
    }
















    public function productDashboard()
    {
    
        return $this->Product->all(); 
    
    }
}