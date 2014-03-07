<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Agentes Model
 * 
 * @package sigep
 * @copyright 2013
 * @version MySql 1.0.0
 * 
 */
class Lineas_model extends CI_Model {

    function __construct() {
        parent::__construct();
        //$this->load->model('sigep/estructuras_model', 'estructura');
    }

    public function obtener($pedido='', $vcBuscar = '', $limit = 0, $offset = 9999999) {
        $sql = 'SELECT *
            FROM diario_view_lineas
            WHERE idPedido = ? AND nombreProducto LIKE ? 
            ORDER BY nombreProducto ASC
            limit ? offset ? ;';
        return $this->db->query($sql, array((int) $pedido, '%' . strtolower((string) $vcBuscar) . '%', (double) $offset, (double) $limit))->result_array();
    }

    public function numRegs($pedido='', $vcBuscar) {
        $sql = 'SELECT count(idLinea) AS inCant FROM diario_view_lineas WHERE idPedido = ? AND lower(nombreProducto) LIKE ? ';
        $result = $this->db->query($sql, array((int) $pedido, strtolower('%' . strtolower($vcBuscar) . '%')))->result_array();
        return $result[0]['inCant'];
    }

    public function obtenerUno($id) {
        $sql = 'SELECT * FROM diario_view_lineas WHERE idLinea = ?;';
        return array_shift($this->db->query($sql, array($id))->result_array());
    }

    public function obtenerUnoPedido($id) {
        $sql = 'SELECT * FROM diario_view_lineas WHERE idPedido = ?;';
        return array_shift($this->db->query($sql, array($id))->result_array());
    }

    public function obtenerDni($dni) {
        $sql = 'SELECT * FROM sigep_view_agentes WHERE dniPersona = ?;';
        return array_shift($this->db->query($sql, array($dni))->result_array());
    }

    public function obtenerAgentePersona($id) {
        $sql = 'SELECT * FROM sigep_view_agentes WHERE idPersona = ?;';
        return array_shift($this->db->query($sql, array($id))->result_array());
    }

    public function guardar($aParms) {
        $sql = 'SELECT diario_sp_lineas_guardar(?, ?, ?, ?, ?, ?, ?) AS result;';
        $result = $this->db->query($sql, $aParms)->result_array();
        return $result[0]['result'];
    }
    public function guardarLinea($aParms) {
        $sql = 'SELECT diario_sp_linea_guardar(?, ?, ?, ?, ?, ?, ?) AS result;';
        $result = $this->db->query($sql, $aParms)->result_array();
        return $result[0]['result'];
    }

    public function eliminar($id) {
        $sql = 'SELECT ufn30tsisprovinciasborrar(?) AS result;';
        $result = $this->db->query($sql, array($id))->result_array();
        return $result[0]['result'];
    }

    public function obtenerAutocompleteAgentes($vcBuscar) {
        $sql = 'SELECT p.idPersona, p.nombrePersona, p.apellidoPersona, concat_ws(", ", p.apellidoPersona, p.nombrePersona) as nombreCompletoPersona, a.idAgente
            FROM hits_personas p
            INNER JOIN sigep_agentes a ON p.idPErsona = a.idPersona
            WHERE nombrePersona LIKE ? OR apellidoPersona LIKE ? ';
        $query = $this->db->query($sql, array('%' . strtolower((string) $vcBuscar) . '%', '%' . strtolower((string) $vcBuscar) . '%'));
        if($query->num_rows > 0){
                $new_row['label']= 'VACANTE';
                $new_row['value']= 'VACANTE';
                $new_row['id']= 0;
                $row_set[] = $new_row;
            foreach ($query->result_array() as $row){
                $new_row['label']=stripslashes($row['nombreCompletoPersona']);
                $new_row['value']=stripslashes($row['nombreCompletoPersona']);
                $new_row['id']=htmlentities(stripslashes($row['idAgente']));
                $row_set[] = $new_row;
            }
            echo json_encode($row_set);
        }
    }
}

// EOF provincias_model.php