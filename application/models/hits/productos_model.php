<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Productos Model
 * 
 * @package Industrias Ro.So.Be.
 * @copyright Industrias Ro.So.Be. 2014
 * @version MySql 1.0.0
 * 
 */
class Productos_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    public function obtener($vcBuscar = '', $limit = 0, $offset = 9999999) {
        $sql = 'SELECT *, IF(publicadoProducto=1, "Publicado", "Sin Publicar") as publicadoProducto
            FROM hits_view_productos
            WHERE nombreProducto LIKE ? 
            GROUP BY idProducto
            ORDER BY nombreProducto ASC 
            limit ? offset ? ;';
        return $this->db->query($sql, array('%' . strtolower((string) $vcBuscar) . '%', (double) $offset, (double) $limit))->result_array();
    }

    public function numRegs($vcBuscar) {
        $sql = 'SELECT count(idProducto) AS inCant FROM hits_productos 
        WHERE lower(nombreProducto) LIKE ? ';
        $result = $this->db->query($sql, array(strtolower('%' . strtolower($vcBuscar) . '%')))->result_array();
        return $result[0]['inCant'];
    }

    public function obtenerUno($id) {
        $sql = 'SELECT * FROM hits_view_productos WHERE idProducto = ?;';
        return array_shift($this->db->query($sql, array($id))->result_array());
    }

    public function obtenerUnoSlug($slug) {
        $sql = 'SELECT * FROM hits_view_productos WHERE uriProducto = ?;';
        return array_shift($this->db->query($sql, array($slug))->result_array());
    }
    

    /*public function guardar($aParms) {
        $sql = 'SELECT rosobe_sp_productos_guardar(?, ?, ?, ?) AS result;';
        $result = $this->db->query($sql, $aParms)->result_array();
        return $result[0]['result'];
    }*/

    public function guardar($aParms) {
        if($aParms[0] == 'NULL' || $aParms[0] == 0) {
            $sql = 'INSERT INTO hits_productos
                    (nombreProducto
                    , codigoProducto
                    , precioProducto
                    , descripcionProducto
                    , uriProducto
                    , novedadProducto
                    , ofertaProducto
                    , publicadoProducto
                    , estadoProducto) 
                    VALUES
                    ("'.$aParms[1].'"
                    , "'.$aParms[2].'"
                    , '.$aParms[3].'
                    , "'.$aParms[4].'"
                    , "'.$aParms[5].'"
                    , '.$aParms[6].'
                    , '.$aParms[7].'
                    , 1
                    , 1);';
            $type = 1;
        }
        else {
            $sql = 'UPDATE hits_productos SET 
                    nombreProducto = "'.$aParms[1].'"
                    , codigoProducto = "'.$aParms[2].'"
                    , precioProducto = '.$aParms[3].'
                    , descripcionProducto = "'.$aParms[4].'"
                    , uriProducto = "'.$aParms[5].'"
                    , novedadProducto = '.$aParms[6].'
                    , ofertaProducto = '.$aParms[7].'
                    WHERE idProducto = '.$aParms[0].';';
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

    public function obtenerImagenes($id) {
        $sql = 'SELECT * FROM hits_productos_imagenes WHERE idProducto = ?;';
        return $this->db->query($sql, (int) $id)->result_array();
    }
    public function obtenerUnaImagen($id) {
        $sql = 'SELECT * FROM hits_productos_imagenes WHERE idProductoImagen = ?;';
        return $this->db->query($sql, (int) $id)->result_array();
    }
    public function eliminarImagen($idProductoImagen) {
        $sql = 'DELETE FROM hits_productos_imagenes WHERE idProductoImagen = ?;';
        $this->db->query($sql, (int) $idProductoImagen);
        return $this->db->affected_rows();
    }

    public function guardarImagen($aParms) {
        if($aParms[0] == 'NULL' || $aParms[0] == 0) {
            $sql = 'INSERT INTO hits_productos_imagenes
                    (idProducto
                    , pathProductoImagen
                    , detailProductoImagen
                    , thumbProductoImagen
                    , thumbdetailProductoImagen
                    , checkProductoImagen) 
                    VALUES
                    ('.$aParms[1].'
                    , "'.$aParms[2].'"
                    , "'.$aParms[3].'"
                    , "'.$aParms[4].'"
                    , "'.$aParms[5].'"
                    , '.$aParms[6].');';
        }
        /*else {
            $sql = 'UPDATE hits_productos_imagenes SET 
                    checkProductoImagen = 0
                    WHERE idProducto = '.$aParms[1].';';
            $result = $this->db->query($sql);
            $sql = 'UPDATE hits_productos_imagenes SET 
                    checkProductoImagen = 1
                    WHERE idProductoImagen = '.$aParms[0].';';
        }*/
        $result = $this->db->query($sql, $aParms);
        return $this->db->insert_id();
    }

    public function checkImagen($idProducto, $idProductoImagen) {
        $sql = 'UPDATE hits_productos_imagenes SET checkProductoImagen = 0 WHERE idProducto = ?';
        $result = $this->db->query($sql, (int) $idProducto);
        $sql = 'UPDATE hits_productos_imagenes SET checkProductoImagen = 1 WHERE idProductoImagen = ?';
        $result = $this->db->query($sql, (int) $idProductoImagen);
        return true;
    }

    public function obtenerColores($idProducto=0) {
        $sql = 'SELECT c.idColor, c.nombreColor FROM hits_colores c
        LEFT JOIN hits_productos_colores pc ON c.idColor = pc.idColor
        GROUP BY c.idColor';
        return $this->db->query($sql)->result_array();
    }
    public function obtenerColoresProducto($idColor, $idProducto = 0) {
        $sql = 'SELECT count(c.idColor) as inCant
                FROM hits_colores c
                INNER JOIN hits_productos_colores pc ON pc.idColor = ? AND pc.idProducto = ?;';
        $result = $this->db->query($sql, array((int) $idColor, (int) $idProducto))->result_array();
        return $result[0]['inCant'];
    }
    public function eliminarColoresProducto($idProducto) {
        $sql = 'DELETE FROM hits_productos_colores WHERE idProducto = ?;';
        $this->db->query($sql, (int) $idProducto);
        return $this->db->affected_rows();
    }

    public function guardarColoresProducto($aParms) {
        $sql = 'INSERT INTO hits_productos_colores(idColor, idProducto) VALUES (?, ?);';
        $this->db->query($sql, $aParms);
        return $this->db->affected_rows();
    }

    public function eliminar($id) {
        $sql = 'DELETE FROM hits_productos WHERE idProducto = ?';
        $result = $this->db->query($sql, array($id));
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

    public function cambiarEstado($aParms) {
        $sql = 'UPDATE hits_productos SET publicadoProducto = ? WHERE idProducto = ?;';
        $result = $this->db->query($sql, $aParms);
        return TRUE;   
    }
}

// EOF provincias_model.php