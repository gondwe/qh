<?php 



class Fieldsets  {

	private $thisb;
	public $orient;
	protected $segment;
	
	
	function __construct(){
		$this->segment = this()->uri->segments ?? null;
	}

	
	function fsets(){
		global $user;
		// $sid = $user->scode;
		$sid = 1;
		switch($this->table){
			case "users" : 
				$this->hide("password,salt,activation_code,forgotten_password_code,active,created_on,forgotten_password_selector,remember_selector,
							created_on,last_login,ip_address,forgotten_password_time,remember_code,activation_selector");
				// $this->combos("user_type","select id, b from dataconf where a = 'usertype'");
				
			break;
			
			case "settings":
				$this->aliases("pobox, address");
				$this->aliases["pnumber"] = "phone";
				$this->aliases["location"] = "town";
				$this->pictures[] = "sign";
				$this->pictures[] = "logo";
			break;
			
			case "dataconf" : 
				if($this->valuetype == 'religion') {
					$this->aliases("b,RELIGION");
					$this->hide("a,c,d");
					$this->hide("a");
				}
			break;

			case "students" : 
				$this->combos("classname", "select id, name from classes");
				$this->combos("stream", "select id, name from streams");
				$this->combos("house", "select id, name from dorms");
				$this->order_by("created_at", "desc");
			break;
			
			case "vdata" : 
			
			switch($this->aliased){
				
				case "ward_categories": 
				$this->values("a",'wardcat');
				break;
				
				case "ward_names": 
				// $this->hidden("a",'wardname');
				break;
				
				default : 
				pf("Alias NOT Assigned");
				break;
				
			}
			
			break;

			case "diagnosis" : 
				// $this->where('pid = '.$info->id);
				// $this->hidden('pid', $info->id);
				// $this->combos('doc_id','select id, concat(first_name," ",last_name) from users');
				// $this->combos('symptom','select id, names from symptoms');
			break;
		}
		
	}
	
}