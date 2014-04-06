<?php
class Contact_model extends CI_Model{
   function __construct()
    {
        // Call the Model constructor
        parent::__construct();

    }
    public function save($data){


    	$this->db->insert('contact',$data);
        return  $this->db->insert_id();

    }

    public function get_contacts(){
    	$query=$this->db->get('contact');
        return $query->result();
    }

   function update_entry($data)
    {
        $this->name   = $data['name']; // please read the below note
        $this->email = $data['email'];
        $this->phone = $data['phone'];
       // $this->date    = time();
        $this->db->update('contact', $this, array('id' => $data['id']));
    }

     function delete_entry($id)
    {
        $this->db->delete('contact', $id);
    }




}
?>
