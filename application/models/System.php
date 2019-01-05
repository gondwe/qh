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
}