<?php

require APPPATH . 'libraries/REST_Controller.php';

class Ubicacion extends REST_Controller {

   public function __construct() {
      parent::__construct();
      $this->load->database();
   }

   public function index_get($id = 0){
      try {
         if (!empty($id)) {
            $data = $this->db->get_where("ubicacion", array('id_ubicacion' => $id))->row_array();
            if (!$data) {
               throw new Exception("Ubicación no encontrada");
            }
         } else {
            $data = $this->db->get("ubicacion")->result();
         }

         $response = array(
            "status" => "ok",
            "message" => "Ubicaciones recuperadas",
            "data" => $data
         );
         $this->response($response, REST_Controller::HTTP_OK);

      } catch (Exception $e) {
         $this->response([
            "status" => "error",
            "message" => $e->getMessage()
         ], REST_Controller::HTTP_BAD_REQUEST);
      }
   }

   public function index_post() {
      try {
         $json = $this->input->raw_input_stream;
         $ubicacion = json_decode($json);

         if (!$ubicacion || empty($ubicacion->edificio) || empty($ubicacion->departamento)) {
            throw new Exception("Datos insuficientes para agregar la ubicación");
         }

         $this->db->insert('ubicacion', $ubicacion);

         if ($this->db->affected_rows() == 0) {
            throw new Exception("No se pudo agregar la ubicación");
         }

         $data = array(
            "status" => "ok",
            "message" => "Ubicación agregada"
         );
         $this->response($data, REST_Controller::HTTP_OK);

      } catch (Exception $e) {
         $this->response([
            "status" => "error",
            "message" => $e->getMessage()
         ], REST_Controller::HTTP_BAD_REQUEST);
      }
   }

   public function index_put($id) {
      try {
         $json = $this->input->raw_input_stream;
         $ubicacion = json_decode($json);

         if (!$ubicacion || empty($ubicacion->edificio) || empty($ubicacion->departamento)) {
            throw new Exception("Datos insuficientes para actualizar la ubicación");
         }

         $this->db->update('ubicacion', $ubicacion, array('id_ubicacion' => $id));

         if ($this->db->affected_rows() == 0) {
            throw new Exception("No se pudo actualizar la ubicación o no hay cambios");
         }

         $data = array(
            "status" => "ok",
            "message" => "Ubicación actualizada"
         );
         $this->response($data, REST_Controller::HTTP_OK);

      } catch (Exception $e) {
         $this->response([
            "status" => "error",
            "message" => $e->getMessage()
         ], REST_Controller::HTTP_BAD_REQUEST);
      }
   }

   public function index_delete($id) {
      try {
         $this->db->delete('ubicacion', array('id_ubicacion' => $id));

         if ($this->db->affected_rows() == 0) {
            throw new Exception("No se pudo eliminar la ubicación o no existe");
         }

         $data = array(
            "status" => "ok",
            "message" => "Ubicación eliminada"
         );
         $this->response($data, REST_Controller::HTTP_OK);

      } catch (Exception $e) {
         $this->response([
            "status" => "error",
            "message" => $e->getMessage()
         ], REST_Controller::HTTP_BAD_REQUEST);
      }
   }

}
