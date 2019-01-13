<?php 


class Product extends CI_Model {

    public function all()
    {

        if($this->productCount())
        {

            return $this->db->get('products')->result();

        }else{

            return [];
        }
    }


    public function productCount($param=null)
    {
    
        return $this->db->count_all('products');
    
    }
}