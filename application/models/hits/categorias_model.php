<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Categorias_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    public function obtener($vcBuscar = '', $limit = 0, $offset = 9999999) {
        $sql = 'SELECT *
            FROM hits_categorias
            WHERE nombreCategoria LIKE ? 
            ORDER BY nombreCategoria ASC  
            limit ? offset ? ;';
        return $this->db->query($sql, array('%' . strtolower((string) $vcBuscar) . '%', (double) $offset, (double) $limit))->result_array();
    }
    public function numRegs($vcBuscar, $area=1, $cargo=0) {
        $sql = 'SELECT count(idCategoria) AS inCant FROM hits_categorias WHERE lower(nombreCategoria) LIKE ? ';
        $result = $this->db->query($sql, array(strtolower('%' . strtolower($vcBuscar) . '%')))->result_array();
        return $result[0]['inCant'];
    }
    public function obtenerUno($id) {
        $sql = 'SELECT * FROM hits_view_categorias WHERE idCategoria = ?;';
        return array_shift($this->db->query($sql, array($id))->result_array());
    }
    public function guardar($aParms) {
        if($aParms[0] == 'NULL' || $aParms[0] == 0) {
            $sql = 'INSERT INTO hits_categorias
                    (nombreCategoria
                    , uriCategoria
                    , pathCategoria) 
                    VALUES
                    ("'.$aParms[1].'"
                    , "'.$aParms[2].'"
                    , "'.$aParms[3].'");';
            $type = 1;
        }
        else {
            $imagen = ($aParms[3] != '')? ', pathCategoria = "'.$aParms[3].'"' : '';
            $sql = 'UPDATE hits_categorias SET 
                    nombreCategoria = "'.$aParms[1].'"
                    , uriCategoria = "'.$aParms[2].'"
                    '.$imagen.'
                    WHERE idCategoria = '.$aParms[0].';';
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

    public function obtenerCategoriasRelacion($idCategoria, $idSubcategoria=0) {
        $sql = 'SELECT cr.idCategoriaRelacion, cr.idCategoria
            FROM hits_categorias_relaciones cr
            WHERE idCategoria = ? AND idSubcategoria = ?';
        return $this->db->query($sql, array((int) $idCategoria, (int) $idSubcategoria))->result_array();
    }
    public function eliminarCategoriasRelacion($idProducto) {
        $sql = 'DELETE FROM hits_categorias_relaciones WHERE idSubcategoria = ?;';
        $this->db->query($sql, (int) $idProducto);
        return $this->db->affected_rows();
    }
    public function guardarCategoriasRelacion($aParms) {
        $sql = 'INSERT INTO hits_categorias_relaciones(idCategoria, idSubcategoria) VALUES (?, ?);';
        $this->db->query($sql, $aParms);
        return $this->db->affected_rows();
    }
    
    

    public function obtenerCategorias($idCategoria=0, $limit = 0, $offset = 9999999) {
        $categorias = ($idCategoria==0)? ' WHERE c.idCategoria NOT IN (select idSubcategoria from hits_categorias_relaciones)':' INNER JOIN hits_categorias_relaciones cr ON c.idCategoria = cr.idSubcategoria AND cr.idCategoria = '.$idCategoria;
        $limite = ($limit==0)? '': 'limit '.$limit.' offset '.$offset.' ';
        $sql = 'SELECT c.idCategoria, c.nombreCategoria, c.pathCategoria, c.uriCategoria
                FROM hits_categorias c
                '.$categorias.'
                ORDER BY c.nombreCategoria ASC
                '.$limite.';';
        return $this->db->query($sql)->result_array();
    }

    public function obtenerCategoriasProducto($idCategoria, $idProducto = 0) {
        $sql = 'SELECT count(c.idCategoria) as inCant
                FROM hits_categorias c
                INNER JOIN hits_categorias_productos cp ON cp.idCategoria = ? AND cp.idProducto = ?;';
        $result = $this->db->query($sql, array((int) $idCategoria, (int) $idProducto))->result_array();
        return $result[0]['inCant'];
    }

    public function eliminarCategoriasProducto($idProducto) {
        $sql = 'DELETE FROM hits_categorias_productos WHERE idProducto = ?;';
        $this->db->query($sql, (int) $idProducto);
        return $this->db->affected_rows();
    }

    public function guardarCategoriasProducto($aParms) {
        $sql = 'INSERT INTO hits_categorias_productos(idCategoria, idProducto) VALUES (?, ?);';
        $this->db->query($sql, $aParms);
        return $this->db->affected_rows();
    }
}