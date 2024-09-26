<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Mobiliario extends REST_Controller {
    
	/**
   * Get All Data from this method.
   *
   * @return Response
   */
   
   public function __construct() {
      parent::__construct();
      $this->load->database();
   }

   public function index_get($id = 0){
      if(!empty($id)){
         $data = $this->db->get_where("mobiliario", array('id_mobiliario' => $id))->row_array();
      }else{
         $data = $this->db->get("mobiliario")->result();
      }
      $data = array(
         "status"    => "ok",
         "message"   => "mobiliario recuperados",
         "data"      => $data
      );
      $this->response($data, REST_Controller::HTTP_OK);
	}

   public function index_post()
   {
      $json = $this->input->raw_input_stream;
      $mobiliario = json_decode($json);
      $this->db->insert('mobiliario',$mobiliario);
      $data = array(
         "status"    => "ok",
         "message"   => "mobi agregado"
      );
      $this->response($data, REST_Controller::HTTP_OK);
   }

   public function index_put($id)
   {
      $input = $this->put();
      $this->db->update('mobiliario', $input, array('id_mobiliario'=>$id));
      $data = array(
         "status"    => "ok",
         "message"   => "mobiliario actualizado"
      );
      $this->response($data, REST_Controller::HTTP_OK);
   }

   public function index_delete($id)
   {
      $this->db->delete('mobiliario', array('id_mobiliario'=>$id));
      $data = array(
         "status"    => "ok",
         "message"   => "mobi eliminado"
      );
      $this->response($data, REST_Controller::HTTP_OK);
   }

}