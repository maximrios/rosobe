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
class Galerias_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    public function obtener($vcBuscar = '', $limit = 0, $offset = 9999999) {
        $sql = 'SELECT *
            FROM hits_view_galeria
            WHERE nombreGaleria LIKE ? 
            ORDER BY nombreGaleria ASC  
            limit ? offset ? ;';
        return $this->db->query($sql, array('%' . strtolower((string) $vcBuscar) . '%', (double) $offset, (double) $limit))->result_array();
    }
    public function numRegs($vcBuscar, $area=1, $cargo=0) {
        $sql = 'SELECT count(idGaleria) AS inCant FROM hits_view_galeria WHERE lower(nombreGaleria) LIKE ? ';
        $result = $this->db->query($sql, array(strtolower('%' . strtolower($vcBuscar) . '%')))->result_array();
        return $result[0]['inCant'];
    }
    public function obtenerUno($id) {
        $sql = 'SELECT * FROM hits_galeria WHERE idGaleria = ?;';
        return array_shift($this->db->query($sql, array($id))->result_array());
    }
    public function guardar($aParms) {
        if($aParms[0] == 'NULL' || $aParms[0] == 0) {
            $sql = 'INSERT INTO hits_galeria
                    (nombreGaleria
                    , descripcionGaleria
                    , pathGaleria
                    , thumbGaleria
                    , estadoGaleria) 
                    VALUES
                    ("'.$aParms[1].'"
                    , "'.$aParms[2].'"
                    , "'.$aParms[3].'"
                    , "'.$aParms[4].'"
                    , 1);';
            $type = 1;
        }
        else {
            $sql = 'UPDATE hits_galeria SET 
                    nombreGaleria = "'.$aParms[1].'"
                    , descripcionGaleria = "'.$aParms[2].'"
                    , pathGaleria = '.$aParms[3].'
                    , thumbGaleria = "'.$aParms[4].'"
                    WHERE idGaleria = '.$aParms[0].';';
            $type = 2;
        }
        $result = $this->db->query($sql);
        if($type==1){
            return $this->db->insert_id();
        }
        else {
            return true;
        }
    }

    public function eliminar($id) {
        $sql = 'SELECT ufn30tsisprovinciasborrar(?) AS result;';
        $result = $this->db->query($sql, array($id))->result_array();
        return $result[0]['result'];
    }

    public function cambiarEstado($aParms) {
        $sql = 'UPDATE rosobe_galeria SET estadoGaleria = ? WHERE idGaleria = ?;';
        $result = $this->db->query($sql, $aParms);
        return TRUE;   
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