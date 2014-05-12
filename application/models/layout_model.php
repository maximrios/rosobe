<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Layout_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	function obtenerSlider() {
		$sql = 'SELECT * FROM hits_slider WHERE activoSlider = 1 AND NOW() BETWEEN vigenciaDesde AND vigenciaHasta';
		return $this->db->query($sql)->result_array();
	}
	function obtenerProductos($categoria=0) {
		($categoria == 0)? $and='':$and='AND idCategoria = '.$categoria;
		$sql = 'SELECT * FROM hits_view_productos WHERE checkProductoImagen = 1 '.$and.' GROUP BY idProducto';
		return $this->db->query($sql)->result_array();
	}
	function obtenerDestacados() {
		$sql = 'SELECT * FROM hits_view_productos GROUP BY idProducto LIMIT 0, 4';
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
}

/* End of file hits_model.php */
/* Location: ./application/models/hits_model.php */