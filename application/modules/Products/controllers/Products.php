<?php 


class Products extends MX_Controller {

    public function __construct()
    {
        
    }

    public function detail($id)
    {
    
        $i['details'] = $this->db->where('id',$id)->get('products')->row();;
        
        $this->load->view('product_detail',$i);
    
    }

    public function rxStrip()
    {
    
        $this->load->view('rxstrip', ['data'=>$this->rxStripData()]);
    
    }


    public function jsondata($id)
    {
    
        $data = $this->db->where('id',$id)->get('products')->row(); 
        
        echo json_encode($data);
        // return $data;
    
    }

    public function rxStripData()
    {
    
        $data = (explode('&',current($_GET)));
        
        foreach($data as $k=>&$v){
        
            $a = explode("=",$v);
        
            $data2[$a[0]] = $a[1];

        } 

        return (Object)$data2;
    
    }





    public function price($id,$qty=1)
    {
    
        echo $this->db->where('id',$id)->get('products')->row('unit_price') * $qty;
    
    }
}