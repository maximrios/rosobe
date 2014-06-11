<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Layout_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	function obtenerSlider() {
		$sql = 'SELECT * FROM hits_slider WHERE activoSlider = 1 AND NOW() BETWEEN vigenciaDesde AND vigenciaHasta';
		return $this->db->query($sql)->result_array();
	}
	function numRegsProductos($vcBuscar = '', $categoria = 0) {
        $and = ($categoria == 0)? '':' AND idCategoria = '.$categoria;
        $sql = 'SELECT count(DISTINCT(cp.idProducto)) AS inCant 
        FROM hits_productos p
        INNER JOIN hits_categorias_productos cp ON p.idProducto = cp.idProducto
        WHERE lower(nombreProducto) LIKE ? 
        AND publicadoProducto = 1 AND estadoProducto = 1
        '.$and.' ';
        $result = $this->db->query($sql, array(strtolower('%' . strtolower($vcBuscar) . '%')))->result_array();
        if($result)
            return $result[0]['inCant'];
        else
            return false;
    }
    function obtenerUnoProducto($id, $slug) {
		$sql = 'SELECT * FROM hits_view_productos 
		WHERE idProducto = ? AND uriProducto = ? AND publicadoProducto = 1 AND checkProductoImagen = 1 
		GROUP BY idProducto';
		$result = $this->db->query($sql, array((int) $id, $slug))->result_array();
		return array_shift($result);
	}
	function obtenerProductos($buscar='', $categoria=0) {
		($categoria == 0)? $and='':$and='AND idCategoria = '.$categoria;
		$sql = 'SELECT * FROM hits_view_productos 
        WHERE nombreProducto LIKE ? AND publicadoProducto = 1 AND checkProductoImagen = 1 '.$and.' GROUP BY idProducto';
		return $this->db->query($sql, array(strtolower('%' . strtolower($buscar) . '%')))->result_array();
	}
	function obtenerDestacados() {
		$sql = 'SELECT * FROM hits_view_productos WHERE novedadProducto = 1 GROUP BY idProducto ORDER BY RAND() LIMIT 0, 3';
		return $this->db->query($sql)->result_array();
	}
	function obtenerRelacionados($producto=0) {
		$sql = 'SELECT * FROM hits_view_productos GROUP BY idProducto LIMIT 0, 3';
		return $this->db->query($sql)->result_array();
	}
	function obtener_galeria() {
		$sql = 'SELECT * FROM hits_galeria WHERE estadoGaleria = 1';
		return $this->db->query($sql)->result_array();
	}
	public function obtenerImagenes($id) {
        $sql = 'SELECT * FROM hits_productos_imagenes WHERE idProducto = ? ORDER BY checkProductoImagen DESC;';
        return $this->db->query($sql, (int) $id)->result_array();
    }
	/*
	 * Categorias
	 */
	public function obtenerCategorias($idCategoria=0, $limit = 0, $offset = 9999999) {
        $categorias = ($idCategoria==0)? ' WHERE c.idCategoria NOT IN (select idSubcategoria from hits_categorias_relaciones)':' INNER JOIN hits_categorias_relaciones cr ON c.idCategoria = cr.idSubcategoria AND cr.idCategoria = '.$idCategoria;
        $limite = ($limit==0)? '': 'limit '.$limit.' offset '.$offset.' ';
        $sql = 'SELECT c.idCategoria, c.nombreCategoria, c.pathCategoria, c.uriCategoria
                FROM hits_categorias c
                '.$categorias.'
                ORDER BY nombreCategoria
                '.$limite.';';
        return $this->db->query($sql)->result_array();
    }
    public function guardarContacto($aParms) {
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
}

/* End of file hits_model.php */
/* Location: ./application/models/hits_model.php */