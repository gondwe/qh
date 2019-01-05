<?php 

$this->load->library('pagination');

$u = $this->db->query('select first_name, email from lighthouse.users')->result();

// $this->pagination->paginate($u);

echo $this->pagination->create_links($u);