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
class Categorias_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    public function obtener($vcBuscar = '', $limit = 0, $offset = 9999999) {
        $sql = 'SELECT *
            FROM rosobe_view_categorias
            WHERE nombreCategoria LIKE ? 
            ORDER BY nombreCategoria ASC  
            limit ? offset ? ;';
        return $this->db->query($sql, array('%' . strtolower((string) $vcBuscar) . '%', (double) $offset, (double) $limit))->result_array();
    }
    public function numRegs($vcBuscar, $area=1, $cargo=0) {
        $sql = 'SELECT count(idCategoria) AS inCant FROM rosobe_view_categorias WHERE lower(nombreCategoria) LIKE ? ';
        $result = $this->db->query($sql, array(strtolower('%' . strtolower($vcBuscar) . '%')))->result_array();
        return $result[0]['inCant'];
    }
    public function obtenerUno($id) {
        $sql = 'SELECT * FROM rosobe_view_categorias WHERE idCategoria = ?;';
        return array_shift($this->db->query($sql, array($id))->result_array());
    }
    public function guardar($aParms) {
        $sql = 'SELECT rosobe_sp_categorias_guardar(?, ?) AS result;';
        $result = $this->db->query($sql, $aParms)->result_array();
        return $result[0]['result'];
    }

    public function eliminar($id) {
        $sql = 'SELECT ufn30tsisprovinciasborrar(?) AS result;';
        $result = $this->db->query($sql, array($id))->result_array();
        return $result[0]['result'];
    }
    
    public function obtenerCategoriasProducto($idProducto = 0) {
        $sql = 'SELECT c.idCategoria, c.nombreCategoria, IF(cp.idCategoriaProducto IS NULL, 0, 1) AS checked, cp.idProducto
                FROM rosobe_categorias c
                LEFT JOIN rosobe_categorias_productos cp ON c.idCategoria = cp.idCategoria AND cp.idProducto = ?;';
        return $this->db->query($sql, (int) $idProducto)->result_array();
    }

    public function eliminarCategoriasProducto($idProducto) {
        $sql = 'DELETE FROM rosobe_categorias_productos WHERE idProducto = ?;';
        $this->db->query($sql, (int) $idProducto);
        return $this->db->affected_rows();
    }

    public function guardarCategoriasProducto($aParms) {
        $sql = 'INSERT INTO rosobe_categorias_productos(idCategoria, idProducto) VALUES (?, ?);';
        $this->db->query($sql, $aParms);
        return $this->db->affected_rows();
    }
}

// EOF provincias_model.php