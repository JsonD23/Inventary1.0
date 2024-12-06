<?php

require APPPATH . 'libraries/REST_Controller.php';

class Mobiliario extends REST_Controller {

   public function __construct() {
      parent::__construct();
      $this->load->database();
   }

   public function index_get($id = 0) {
      try {
         if (!empty($id)) {
            $data = $this->db->get_where("mobiliario", array('id_mobiliario' => $id))->row_array();
            if (!$data) {
               throw new Exception("Mobiliario no encontrado");
            }
         } else {
            $data = $this->db->get("mobiliario")->result();
         }

         $response = array(
            "status"    => "ok",
            "message"   => "Mobiliario recuperados",
            "data"      => $data
         );
         $this->response($response, REST_Controller::HTTP_OK);

      } catch (Exception $e) {
         $this->response(array(
            "status" => "error",
            "message" => $e->getMessage()
         ), REST_Controller::HTTP_BAD_REQUEST);
      }
   }

   public function index_post() {
      try {
         $json = $this->input->raw_input_stream;
         $mobiliario = json_decode($json, true);

         if (!$this->db->insert('mobiliario', $mobiliario)) {
            throw new Exception("Error al insertar mobiliario");
         }

         $response = array(
            "status"    => "ok",
            "message"   => "Mobiliario agregado"
         );
         $this->response($response, REST_Controller::HTTP_OK);

      } catch (Exception $e) {
         $this->response(array(
            "status" => "error",
            "message" => $e->getMessage()
         ), REST_Controller::HTTP_BAD_REQUEST);
      }
   }

   public function index_put($id) {
      try {
         $input = $this->put();
         
         if (empty($id)) {
            throw new Exception("ID de mobiliario no proporcionado");
         }

         if (!$this->db->update('mobiliario', $input, array('id_mobiliario' => $id))) {
            throw new Exception("Error al actualizar mobiliario");
         }

         $response = array(
            "status"    => "ok",
            "message"   => "Mobiliario actualizado"
         );
         $this->response($response, REST_Controller::HTTP_OK);

      } catch (Exception $e) {
         $this->response(array(
            "status" => "error",
            "message" => $e->getMessage()
         ), REST_Controller::HTTP_BAD_REQUEST);
      }
   }

   public function index_delete($id) {
      try {
         if (empty($id)) {
            throw new Exception("ID de mobiliario no proporcionado");
         }

         if (!$this->db->delete('mobiliario', array('id_mobiliario' => $id))) {
            throw new Exception("Error al eliminar el mobiliario");
         }

         $response = array(
            "status"    => "ok",
            "message"   => "Mobiliario eliminado"
         );
         $this->response($response, REST_Controller::HTTP_OK);

      } catch (Exception $e) {
         $this->response(array(
            "status" => "error",
            "message" => $e->getMessage()
         ), REST_Controller::HTTP_BAD_REQUEST);
      }
   }

}
