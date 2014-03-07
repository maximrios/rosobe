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
class Clientes_model extends CI_Model {

    function __construct() {
        parent::__construct();
        //$this->load->model('sigep/estructuras_model', 'estructura');
    }

    public function obtener($vcBuscar = '', $limit = 0, $offset = 9999999) {
        $sql = 'SELECT *
            FROM diario_view_clientes
            WHERE completoPersona LIKE ? 
            ORDER BY nombrePersona ASC  
            limit ? offset ? ;';
        return $this->db->query($sql, array('%' . strtolower((string) $vcBuscar) . '%', (double) $offset, (double) $limit))->result_array();
    }

    public function numRegs($vcBuscar, $area=1, $cargo=0) {
        $sql = 'SELECT count(idCliente) AS inCant FROM diario_view_clientes WHERE lower(completoPersona) LIKE ? ';
        $result = $this->db->query($sql, array(strtolower('%' . strtolower($vcBuscar) . '%')))->result_array();
        return $result[0]['inCant'];
    }

    public function obtenerUno($id) {
        $sql = 'SELECT * FROM diario_view_clientes WHERE idCliente = ?;';
        return array_shift($this->db->query($sql, array($id))->result_array());
    }

    public function obtenerUnoOrden($orden) {
        $sql = 'SELECT * FROM diario_view_clientes WHERE ordenPedidoCliente = ?;';
        return array_shift($this->db->query($sql, array($orden))->result_array());
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
        $sql = 'SELECT sigep_sp_agentes_guardar(?, ?, ?, ?, ?) AS result;';
        $result = $this->db->query($sql, $aParms)->result_array();
        return $result[0]['result'];
    }

    public function eliminar($id) {
        $sql = 'SELECT ufn30tsisprovinciasborrar(?) AS result;';
        $result = $this->db->query($sql, array($id))->result_array();
        return $result[0]['result'];
    }

    public function dropdownClientes() {
        $sql = 'SELECT * FROM diario_view_clientes';
        $query = $this->db->query($sql)->result();
        $subgrupos[0] = 'Seleccione un cliente ...';
        foreach($query as $row) {
            $subgrupos[$row->idCliente] = $row->idCliente.' '.$row->apellidoPersona.' '.$row->nombrePersona;
        }
        return $subgrupos;
    }
}

// EOF provincias_model.php