<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rosobe_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	function obtener_galeria() {
		$sql = 'SELECT * FROM hits_galeria WHERE estadoGaleria = 1';
		return $this->db->query($sql)->result_array();
	}
}

/* End of file rosobe_model.php */
/* Location: ./application/models/rosobe_model.php */