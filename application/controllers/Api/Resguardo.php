<?php

require APPPATH . 'libraries/REST_Controller.php';

class Resguardo extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    
    public function index_get($id = 0){
        if(!empty($id)){
            $data = $this->db->get_where("resguardo", array('id_resguardo' => $id))->row_array();
        } else {
            $data = $this->db->get("resguardo")->result();
        }
        $response = array(
            "status"    => "ok",
            "message"   => "Resguardo(s) recuperado(s)",
            "data"      => $data
        );
        $this->response($response, REST_Controller::HTTP_OK);
    }

   
    public function index_post()
    {
      
        $json = $this->input->raw_input_stream;
       
        $resguardo = json_decode($json, true);

        
        if (isset($resguardo['id_persona'], $resguardo['id_mobiliario'], $resguardo['fecha_asignacion'])) {
      
            $this->db->insert('resguardo', $resguardo);
            $insert_id = $this->db->insert_id(); 

            $response = array(
                "status" => "ok",
                "message" => "Resguardo agregado",
                "data" => array(
                    "id_resguardo" => $insert_id
                )
            );
            $this->response($response, REST_Controller::HTTP_OK);
        } else {
  
            $this->response(array(
                "status" => "error",
                "message" => "Campos faltantes en el resguardo"
            ), REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_put($id)
    {
    
        $json = $this->input->raw_input_stream;

        $resguardo = json_decode($json, true);

   
        if (!empty($id) && isset($resguardo['id_persona'], $resguardo['id_mobiliario'], $resguardo['fecha_asignacion'])) {
            $this->db->update('resguardo', $resguardo, array('id_resguardo' => $id));
            $response = array(
                "status"    => "ok",
                "message"   => "Resguardo actualizado"
            );
            $this->response($response, REST_Controller::HTTP_OK);
        } else {
            // Respuesta de error si faltan campos o el ID es incorrecto
            $this->response(array(
                "status" => "error",
                "message" => "ID incorrecto o campos faltantes"
            ), REST_Controller::HTTP_BAD_REQUEST);
        }
    }

   
    public function index_delete($id)
    {
        if (!empty($id)) {
            $this->db->delete('resguardo', array('id_resguardo' => $id));
            $response = array(
                "status"    => "ok",
                "message"   => "Resguardo eliminado"
            );
            $this->response($response, REST_Controller::HTTP_OK);
        } else {
    
            $this->response(array(
                "status" => "error",
                "message" => "ID faltante o incorrecto"
            ), REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
