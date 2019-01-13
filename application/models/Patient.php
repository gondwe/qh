<?php 

class Patient extends CI_Model {


    
    public function info($id)
    {
    
         return $this->db->where('id',$id)->get('patients')->row(); 
    
    }


    public function savediagnosis($id)
    {
        $data = [
            'doc_id' => $this->session->user_id,
            'pid' => $id,
            'symptom' => $this->input->post('symptoms'),
            'notes' => $this->input->post('notes'),
        ];

        // pf($data);
        return $this->db->insert('diagnosis',$data);
    }


    public function rx($id)
    {
    
        $rx = $this->db
            ->where("pid",$id)
            ->select("r.id, p.name, p.units unit, r.qty, r.rate, r.duration, date(r.updated_at) date")
            ->from("rx r")
            ->join("products p",'r.product = p.id','left')
            ->get()
            ->result();

        $dates = array_unique(array_column($rx,'date'));

        $ry = [];
        
        foreach($dates as $date){
            foreach($rx as $k=>&$x){
                if($x->date == $date){ $ry[$date][] = $x; unset($rx[$k]); }
            }
        }

        return $ry;
    
    }

}