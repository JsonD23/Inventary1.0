<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Item extends REST_Controller {
    
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
         $data = $this->db->get_where("items", array('id_usuario' => $id))->row_array();
      }else{
         $data = $this->db->get("items")->result();
      }
      $data = array(
         "status"    => "ok",
         "message"   => "Items recuperados",
         "data"      => $data
      );
      $this->response($data, REST_Controller::HTTP_OK);
	}

   public function index_post()
   {
      $json = $this->input->raw_input_stream;
      $usuario = json_decode($json);
      $this->db->insert('items',$usuario);
      $data = array(
         "status"    => "ok",
         "message"   => "Item agregado"
      );
      $this->response($data, REST_Controller::HTTP_OK);
   }

   public function index_put($id)
   {
      $input = $this->put();
      $this->db->update('items', $input, array('id_item'=>$id));
      $data = array(
         "status"    => "ok",
         "message"   => "Item actualizado"
      );
      $this->response($data, REST_Controller::HTTP_OK);
   }

   public function index_delete($id)
   {
      $this->db->delete('items', array('id_item'=>$id));
      $data = array(
         "status"    => "ok",
         "message"   => "Item eliminado"
      );
      $this->response($data, REST_Controller::HTTP_OK);
   }

}