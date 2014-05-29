<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Nombre de métodos y variables respetando la notacion camel case en minúsculas. pe acercaDe()
* Nombre de variables publicas de la clase indique el prefijo del tipo de datos. pe $inIdNoticia
* Nombre de variables privadas de la clase indique un _ antes del prefijo del tipo de datos. pe $_inIdNoticia
*/
class Inicio extends Ext_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('rosobe/rosobe_model', 'layout');
		$this->load->library('Messages');
        $this->load->helper('utils_helper');
		$this->_aReglas = array(
			array(
				'field' => 'txtnombre',
				'label' => 'Nombre',
				'rules' => 'trim|max_length[80]|xss_clean|required'
			)
			, array(
				'field' => 'txttelefono',
				'label' => 'Telefono',
				'rules' => 'trim|max_length[1]|xss_clean|required'
			)
		);
	}
	protected function _inicReglasWeb() {
        $val = $this->form_validation->set_rules($this->_aReglas);
    }
	public function index() {
		$aData = array();
		$aData['slider'] = $this->layout->obtenerSlider();
		$aData['productos'] = $this->layout->obtenerDestacados();
		$aData['breadcrumb'] = '<a href="#">Inicio</a>';
		$this->_SiteInfo['title'] .= ' - Inicio';
		$this->_menu = 'inicio';
		$this->_vcContentPlaceHolder = $this->load->view('inicio', $aData, true);
		parent::index();
	}
	public function nosotros() {
		$aData = array();
		$this->_SiteInfo['title'] .= ' - Nosotros';
		$this->_menu = 'nosotros';
		$aData['breadcrumb'] = '<a href="#">Inicio</a>  >  <a href="nosotros">Nosotros</a>';
		$this->_vcContentPlaceHolder = $this->load->view('nosotros', $aData, true);
		parent::index();
	}
	public function mayoristas() {
		$aData = array();
		$this->_SiteInfo['title'] .= ' - Mayoristas';
		$this->_menu = 'mayoristas';
		$this->_vcContentPlaceHolder = $this->load->view('productos', $aData, true);
		parent::index();
	}
	public function servicios() {
		$aData = array();
		$this->_SiteInfo['title'] .= ' - Servicios';
		$this->_menu = 'servicios';
		$this->_vcContentPlaceHolder = $this->load->view('servicios', $aData, true);
		parent::index();
	}
	public function galeria() {
		$aData = array();
		$aData['galeria'] = $this->layout->obtener_galeria();
		$aData['breadcrumb'] = '<a href="#">Inicio</a>  >  <a href="galeria">Galeria</a>';
		$this->_SiteInfo['title'] .= ' - Galería';
		$this->_menu = 'galeria';
		$this->_vcContentPlaceHolder = $this->load->view('galeria', $aData, true);
		parent::index();
	}
}
?>