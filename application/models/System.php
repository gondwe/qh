<?php 

class System extends CI_Model {


    public function combo($table,$field,$where)
    {
    
        if(isset($_GET['q'])) 
        {

            $this->db->like("`$field`", $_GET['q'], 'after');
            
            if(!empty($where)) {

                foreach($where as $w){

                    $this->db->or_like("`$w`", $_GET['q'], 'after');
                    
                }
            }
        }

        return $this->db->select("id, ucase(`$field`)")->get($table)->result_array();
    
    }


    public function vdata($param)
    {
    
        $where = [];

        $field = array_shift($param);

        $chunks = array_chunk($param,2);

        foreach($chunks as $ch){

            if(count($ch) == 2){ 

                $where[$ch[0]] = $ch[1];
            }
        }

        
        return  $this->db
                        ->where($where)
                        
                        ->select('id, ucase('.$field.') b')
                        
                        ->get('vdata')
                        
                        ->result_array();
    
    }

    public function cTable($param)
    {
    
        $where = [];

        $table = array_shift($param);

        $field = array_shift($param);

        $chunks = array_chunk($param,2);

        foreach($chunks as $ch){

            if(count($ch) == 2){ 

                $where[$ch[0]] = $ch[1];
            }
        }

        
        return  $this->db
                        ->where($where)
                        
                        ->select('id, '.$field)
                        
                        ->get($table)
                        
                        ->result_array();
    
    }


    public function tabloPrinter()
    {
    
        $contents = current($_POST);
    
        $dom = new DOMDocument;

        $dom->loadHTML($contents);

        $items = $dom->getElementsByTagName('tr');

           foreach ($items as $node) {
               
               foreach($node->childNodes as $th){ 

                   $ths[] = $th->nodeValue;

               }
               $tr[] = $ths; $ths= [];
           }


       $titles = array_filter(array_shift($tr));

       $body = array_map(function($data) use ($titles) {
           return  current(array_chunk($data,count($titles)));
       },$tr);

       $body = array_merge([$titles],$body); 
      
       $_SESSION['tablePrint'] = $body; 
    
    }


    public function customPrinter()
    {
    
        $args = func_get_args();

        $view = array_pop($args);
        
        $data = array();
        
        if(!empty($args)){
            
            $method = current($args);
            
            if(method_exists(self::class, $method)){
                
                $method = array_shift($args);
                
                $data = $this->$method(empty($args) ? null : implode(',',$args));
                
            }
            
        }
        
        $data['data'] = empty($data)? $args : $data;

        $this->load->view('print/header');
        
        $this->load->view("custom_print/".$view, $data);
        
        $this->load->view('print/footer');
 
    
    }


    public function qList()
    {

        $users = array_map(function($data){ 

        $name = rx($data->first_name." ".$data->last_name);
        
        $groups = array_map(function($g){
            
            return '('.rx($g->name).')';

        }, $this->ion_auth->get_users_groups($data->id)->result());
        
            return (Object)["id"=>$data->id, "names"=>$name." ".implode(" ",$groups)];

        },$this->ion_auth->users()->result());

        return $users;
    
    }
}