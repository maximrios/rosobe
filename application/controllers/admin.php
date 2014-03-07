<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Ext_AutController {
	function __construct() {
		parent::__construct();
		$this->load->library('hits/googlemaps');
	}
	public function index() {
		$aData = array();
		$this->_SiteInfo['title'] .= ' - Dashboard';
		/*$config = array();
		$config['center'] = '-24.865125, -65.474766';
		$config['zoom'] = 14;
		$config['directions'] = FALSE;
		$this->googlemaps->initialize($config);
		$marker = array();
		$marker['position'] = '-24.865125, -65.474766';
		$marker['title'] = 'INDUSTRIAS Y SERVICIOS Ro.So.Be';
		$marker['infowindow_content'] = 'Estamos aca Ro.So.Be';
		$this->googlemaps->add_marker($marker);
		$aData['map'] = $this->googlemaps->create_map();*/
		$this->_vcContentPlaceHolder = $this->load->view('administrator/dashboard',$aData,true);
		parent::index();
	}
	public function novedades($id=0) {
		$this->load->model($this->db->dbdriver.'/lib_autenticacion/novedadesrol_model','_oModel');
		$this->_SiteInfo['title'] .= ' Novedades';
		$aData = array();
        $aData['aNovedades'] = $this->_oModel->leer('', $this->lib_autenticacion->idRol(), 0, 1);
        $aData['itemNovedad'] = $this->_oModel->obtenerUno($id);
		$this->_vcContentPlaceHolder = $this->load->view('contenido-novedades',$aData,true);
		parent::index();
	}
	public function vermas($pageNovedades=0) {
		$this->load->model($this->db->dbdriver.'/lib_autenticacion/novedadesrol_model','_oModel');
		$aData = array();
        $aData['pageNovedades'] = $pageNovedades;
        $aData['aNovedades'] = $this->_oModel->leer('', $this->lib_autenticacion->idRol(), $pageNovedades, 5);
        $NovedadesNumRegs = $this->_oModel->numRegs('', $this->lib_autenticacion->idRol(), $pageNovedades, 5);
        $aData['esViaAjax'] = $NovedadesNumRegs > ($pageNovedades * 5);
		$this->load->view('contenido-novedades-vermas',$aData);
	}
	public function demo() {
		$this->_SiteInfo['title'] .= ' Demo';
		$aData = array();
		$this->_vcContentPlaceHolder = $this->load->view('contenido-demo',$aData,true);
		parent::index();
	}
	public function acercaDe() {
		parent::index();
	}
	public function contacto() {
		parent::index();
	}
}
?>