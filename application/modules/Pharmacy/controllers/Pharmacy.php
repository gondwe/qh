<?php 

class Pharmacy extends MX_Controller {


    public function __construct()
    {
     
        $this->load->model('Product');
     
    }

    public function products($action='dashboard')
    {
    


        switch ($action) {
            case 'dashboard': $data['products'] = $this->productDashboard(); break;
            
            default: $data = []; break;
        }

         serve('products/'.$action, $data);
    }
















    public function productDashboard()
    {
    
        return $this->Product->all(); 
    
    }
}