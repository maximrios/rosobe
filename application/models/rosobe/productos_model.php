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
class Productos_model extends CI_Model {
    function __construct() {
        parent::__construct();
        //$this->load->model('sigep/estructuras_model', 'estructura');
    }

    public function obtener($vcBuscar = '', $limit = 0, $offset = 9999999) {
        $sql = 'SELECT *
            FROM rosobe_view_productos
            WHERE nombreProducto LIKE ? 
            GROUP BY idProducto
            ORDER BY nombreProducto ASC 
            limit ? offset ? ;';
        return $this->db->query($sql, array('%' . strtolower((string) $vcBuscar) . '%', (double) $offset, (double) $limit))->result_array();
    }

    public function numRegs($vcBuscar, $area=1, $cargo=0) {
        $sql = 'SELECT count(idProducto) AS inCant FROM rosobe_view_productos WHERE lower(nombreProducto) LIKE ? ';
        $result = $this->db->query($sql, array(strtolower('%' . strtolower($vcBuscar) . '%')))->result_array();
        return $result[0]['inCant'];
    }

    public function obtenerUno($id) {
        $sql = 'SELECT * FROM rosobe_view_productos WHERE idProducto = ?;';
        return array_shift($this->db->query($sql, array($id))->result_array());
    }

    public function obtenerUnoSlug($slug) {
        $sql = 'SELECT * FROM rosobe_view_productos WHERE uriProducto = ?;';
        return array_shift($this->db->query($sql, array($slug))->result_array());
    }
    

    /*public function guardar($aParms) {
        $sql = 'SELECT rosobe_sp_productos_guardar(?, ?, ?, ?) AS result;';
        $result = $this->db->query($sql, $aParms)->result_array();
        return $result[0]['result'];
    }*/

    public function guardar($aParms) {
        if($aParms[0] == 'NULL' || $aParms[0] == 0) {
            $sql = 'INSERT INTO rosobe_productos
                    (nombreProducto
                    , descripcionProducto
                    , uriProducto) 
                    VALUES
                    ('.$aParms[1].'
                    , '.$aParms[2].'
                    , '.$aParms[3].');';
        }
        else {
            $sql = 'UPDATE rosobe_productos SET 
                    nombreProducto = '.$aParms[1].'
                    , descripcionProducto = '.$aParms[2].'
                    , uriProducto = '.$aParms[3].'
                    WHERE idProducto = '.$aParms[0].';';
        }
        $result = $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function obtenerImagenes($id) {
        $sql = 'SELECT * FROM rosobe_productos_imagenes WHERE idProducto = ?;';
        return $this->db->query($sql, (int) $id)->result_array();
    }

    /*public function guardarImagen($aParms) {
        $sql = 'SELECT rosobe_sp_productos_imagenes_guardar(?, ?, ?, ?, ?, ?, ?) AS result;';
        $result = $this->db->query($sql, $aParms)->result_array();
        return $result[0]['result'];
    }*/

    public function guardarImagen($aParms) {
        if($aParms[0] == 'NULL' || $aParms[0] == 0) {
            $sql = 'INSERT INTO rosobe_productos_imagenes
                    (idProducto
                    , pathProductoImagen
                    , thumbProductoImagen
                    , detailProductoImagen
                    , thumbdetailProductoImagen) 
                    VALUES
                    ('.$aParms[1].'
                    , '.$aParms[2].'
                    , '.$aParms[3].'
                    , '.$aParms[4].'
                    , '.$aParms[5].');';
        }
        else {
            $sql = 'UPDATE rosobe_productos_imagenes SET 
                    checkProductoImagen = '.$aParms[6].'
                    WHERE idProductoImagen = pidProductoImagen;';
        }
        $sql = 'SELECT rosobe_sp_productos_imagenes_guardar(?, ?, ?, ?, ?, ?, ?) AS result;';
        $result = $this->db->query($sql, $aParms)->result_array();
        return $result[0]['result'];
    }

    public function eliminar($id) {
        $sql = 'SELECT ufn30tsisprovinciasborrar(?) AS result;';
        $result = $this->db->query($sql, array($id))->result_array();
        return $result[0]['result'];
    }
    public function dropdownProductos() {
        $sql = 'SELECT * FROM diario_view_productos';
        $query = $this->db->query($sql)->result();
        $subgrupos[0] = 'Seleccione un producto ...';
        foreach($query as $row) {
            $subgrupos[$row->idProducto] = $row->nombreProducto;
        }
        return $subgrupos;
    }
}

// EOF provincias_model.php