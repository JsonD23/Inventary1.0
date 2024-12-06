<?php

require APPPATH . 'libraries/REST_Controller.php';

class Personas extends REST_Controller {

   public function __construct() {
      parent::__construct();
      $this->load->database();
   }

   public function index_get($id = 0) {
      try {
         if (!empty($id)) {
            $data = $this->db->get_where("personas", array('id_persona' => $id))->row_array();
            if (!$data) {
               throw new Exception("Persona no encontrada");
            }
         } else {
            $data = $this->db->get("personas")->result();
         }

         $response = array(
            "status"    => "ok",
            "message"   => "PERSONAS recuperadas",
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
         $persona = json_decode($json, true);

         if (!$this->db->insert('personas', $persona)) {
            throw new Exception("Error al insertar persona");
         }

         $id = $this->db->insert_id();
         $response = array(
            "status" => "ok",
            "message" => "Persona agregada",
            "data" => array(
               "id_persona" => $id
            )
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
         $json = $this->input->raw_input_stream;
         $persona = json_decode($json, true);

         if (empty($id)) {
            throw new Exception("ID de persona no proporcionado");
         }

         if (!$this->db->update('personas', $persona, array('id_persona' => $id))) {
            throw new Exception("Error al actualizar la persona");
         }

         $response = array(
            "status"    => "ok",
            "message"   => "Persona actualizada"
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
            throw new Exception("ID de persona no proporcionado");
         }

         if (!$this->db->delete('personas', array('id_persona' => $id))) {
            throw new Exception("Error al eliminar la persona");
         }

         $response = array(
            "status"    => "ok",
            "message"   => "Persona eliminada"
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
