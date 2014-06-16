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
                    , publicadoGaleria) 
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
        $sql = 'DELETE FROM hits_galeria WHERE idGaleria = ?;';
        $result = $this->db->query($sql, array($id));
        return TRUE;
    }
    public function cambiarEstado($aParms) {
        $sql = 'UPDATE hits_galeria SET publicadoGaleria = ? WHERE idGaleria = ?;';
        $result = $this->db->query($sql, $aParms);
        return TRUE;   
    }
}