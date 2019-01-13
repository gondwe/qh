<?php 

class Facility extends MX_Controller {

    public function rooms()
    {
    
         serve('rooms');
    
    }

    public function beds()
    {
    
         serve('beds');
    
    }

    public function setup()
    {
    
         serve('rmsetup');
    
    }
}