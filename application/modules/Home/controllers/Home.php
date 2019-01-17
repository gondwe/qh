<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

	public function index()
	{
		
		/* lets do the counting */
		$data['count'] = (Object) [
			
			'admission' => $this->db->count_all('patients'),

			'labtest' => $this->db->count_all('labtests'),

			'appointments' => $this->db->where('apdate >= curdate()')->count_all('appointments'),

			'pharmacy' => $this->db->count_all('products'),
		];

		serve('dashboard',$data);

	}


	public function about()
	{
		
		serve("about");
	}

}
