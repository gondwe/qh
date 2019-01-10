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


}