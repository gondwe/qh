<?php 

class Lab  extends MX_Controller
{

    public function index()
    {
    
        $data = [];

        serve('dashboard',$data);
    
    }

    public function tests()
    {
    
        $data['recent'] = $this->db->get('labtests')->result();

        serve('tests',$data);
    
    }


    function subcategories($cat)
    {
        $data = $this->db->where(['c'=>$cat,'a'=>'testsubcat'])->select('id, b')->get('vdata')->result();

        // $this->load->view('subcategories',$data);
        echo json_encode($data);
    }


    public function subcategoryTable($param)
    {
    
        $data['info'] = $this->db->query("select vv.*, vw.b category from vdata as vv left join vdata vw on vw.id = vv.c where vv.id = '$param'")->row();

        $this->load->view('subcategorytable',$data);

        $this->load->view('section/parts/print/printing');
    
    }

    public function saveTests($param)
    {

        foreach($_POST['data']['ids'] as $test){

            $data[] = array( 'pid'=>$param, 'docid'=>$this->session->user_id, 'test'=>$test );
            
        }

        $this->db->insert_batch('labtests', $data);
    
    }


    public function newtest()
    {
    
        serve('newtest');
    
    }

    public function results()
    {
    
        serve('results');
    
    }
    
}
