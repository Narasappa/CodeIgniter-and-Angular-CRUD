<?php
class Contact extends CI_Controller {

      public function __construct(){
            parent::__construct();
            $this->load->model('contact_model');
       }



	public function index(){
		$this->load->view('index');
		//echo "hi";
	}
   public function save_contact(){
        $get = file_get_contents('php://input');
        $json_decode = json_decode($get,true);
        //log_message("info",json_encode($json_decode));
        foreach ($json_decode as $key => $value) {
            $data[$key] = $value;
        }

        $status=$this->contact_model->save($data);
       $data['id'] = $status;
      echo json_encode($data);
}

public function get_all_conatcts(){
    $data=$this->contact_model->get_contacts();
    log_message("info",json_encode($data));
    //return  json_encode($data);

     echo json_encode($data);
 }

   public  function edit_contact(){

        $get = file_get_contents('php://input');
        $json_decode = json_decode($get,true);
        log_message("info",json_encode($json_decode));
        foreach ($json_decode as $key => $value) {
            $data[$key] = $value;
        }
         //log_message("info",$data);
        $this->contact_model->update_entry($data);
        $status=array('status'=>'true');
        echo json_encode($status);


   }

   public function delete(){
        $get = file_get_contents('php://input');
        $json_decode = json_decode($get,true);
        log_message("info",json_encode($json_decode));
        foreach ($json_decode as $key => $value) {
            $data[$key] = $value;
        }

   $this->contact_model->delete_entry( $data);
      $status=array('status'=>'true');
        echo json_encode($status);

   }


}


?>
