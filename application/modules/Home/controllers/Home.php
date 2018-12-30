<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

	public function index()
	{
		
		serve('dashboard');

	}


	public function about()
	{
		
		serve("about");
	}

}
