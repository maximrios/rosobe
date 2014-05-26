<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Contactos_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    public function obtener($vcBuscar = '', $limit = 0, $offset = 9999999) {
        $sql = 'SELECT *
            FROM hits_contactos
            WHERE mensajeContacto LIKE ? 
            AND estadoContacto = 1
            ORDER BY fechaContacto DESC  
            limit ? offset ? ;';
        return $this->db->query($sql, array('%' . strtolower((string) $vcBuscar) . '%', (double) $offset, (double) $limit))->result_array();
    }
    public function numRegs($vcBuscar) {
        $sql = 'SELECT count(idContacto) AS inCant FROM hits_contactos WHERE lower(mensajeContacto) LIKE ? AND estadoContacto = 1 ';
        $result = $this->db->query($sql, array(strtolower('%' . strtolower($vcBuscar) . '%')))->result_array();
        return $result[0]['inCant'];
    }
    public function obtenerUno($id) {
        $sql = 'SELECT * FROM hits_contactos WHERE idContacto = ?;';
        return array_shift($this->db->query($sql, array($id))->result_array());
    }
    public function guardar($aParms) {
        if($aParms[0] == 'NULL' || $aParms[0] == 0) {
            $sql = 'INSERT INTO hits_contactos
                    (nombreContacto
                    , telefonoContacto
                    , emailContacto
                    , mensajeContacto
                    , fechaContacto
                    , estadoContacto) 
                    VALUES
                    ("'.$aParms[1].'"
                    , '.$aParms[2].'
                    , "'.$aParms[3].'"
                    , "'.$aParms[4].'"
                    , NOW()
                    , 1);';
            $type = 1;
        }
        else {
            $sql = 'UPDATE hits_contactos SET 
                    nombreContacto = "'.$aParms[1].'"
                    , telefonoContacto = '.$aParms[2].'
                    , emailContacto = "'.$aParms[3].'"
                    , mensajeContacto = "'.$aParms[4].'"
                    , fechaContacto = NOW()
                    WHERE idContacto = '.$aParms[0].';';
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
        $sql = 'UPDATE hits_contactos SET estadoContacto = 0 WHERE idContacto = ?;';
        $result = $this->db->query($sql, array($id));
        return TRUE;
    }
}