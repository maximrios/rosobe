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
	                              	'field'   => 'txtnombre',
	                              	'label'   => 'Nombre',
	                              	'rules'   => 'trim|max_length[80]|xss_clean|required'
	                          	)
		);
	}
	protected function _inicReglasWeb() {
        $val = $this->form_validation->set_rules($this->_aReglas);
    }
	public function index() {
		$aData = array();
		$aData['slider'] = $this->layout->obtenerSlider();
		$this->_SiteInfo['title'] .= ' - Inicio';
		$this->_menu = 'inicio';
		$this->_vcContentPlaceHolder = $this->load->view('inicio', $aData, true);
		parent::index();
	}

	public function novedades($id=0)
	{
		$this->load->model($this->db->dbdriver.'/lib_autenticacion/novedadesrol_model','_oModel');

		$this->_SiteInfo['title'] .= ' Novedades';
		$aData = array();

        $aData['aNovedades'] = $this->_oModel->leer('', $this->lib_autenticacion->idRol(), 0, 1);
        $aData['itemNovedad'] = $this->_oModel->obtenerUno($id);

		$this->_vcContentPlaceHolder = $this->load->view('contenido-novedades',$aData,true);
		
		parent::index();
	}

	public function vermas($pageNovedades=0)
	{
		$this->load->model($this->db->dbdriver.'/lib_autenticacion/novedadesrol_model','_oModel');
		$aData = array();
        $aData['pageNovedades'] = $pageNovedades;
        $aData['aNovedades'] = $this->_oModel->leer('', $this->lib_autenticacion->idRol(), $pageNovedades, 5);
        $NovedadesNumRegs = $this->_oModel->numRegs('', $this->lib_autenticacion->idRol(), $pageNovedades, 5);
        $aData['esViaAjax'] = $NovedadesNumRegs > ($pageNovedades * 5);

		// $conntent = 
		
		$this->load->view('contenido-novedades-vermas',$aData);
		
		// $conntent .= print_r($this->lib_autenticacion->filtrarXHtml($conntent));
		
		// $this->output->set_output($conntent);
	}

	public function demo()
	{
		$this->_SiteInfo['title'] .= ' Demo';
				
		$aData = array();

		$this->_vcContentPlaceHolder = $this->load->view('contenido-demo',$aData,true);
		
		parent::index();
	}
	
	public function acercaDe()
	{
		parent::index();
	}

	public function nosotros() {
		$aData = array();
		$this->_SiteInfo['title'] .= ' - Nosotros';
		$this->_menu = 'nosotros';
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
	
	public function productos() {
		$aData = array();
		$this->_SiteInfo['title'] .= ' - Productos';
		$this->_menu = 'productos';
		$aData['productos'] = $this->layout->obtenerProductos();
		$this->_vcContentPlaceHolder = $this->load->view('productos', $aData, true);
		parent::index();
	}

	public function producto($slug) {
		$this->load->model('rosobe/productos_model', 'productos');
		$producto = $this->productos->obtenerUnoSlug($slug);
		if(!$producto) {
			redirect('inicio/no_producto');
		}
		$aData = array();
		$this->_SiteInfo['title'] .= ' - Busqueda';
		$this->_menu = 'productos';
		echo $slug;
		$this->_vcContentPlaceHolder = $this->load->view('productos', $aData, true);
		parent::index();
	}

	public function no_producto() {
		echo "no existe";
	}

	public function servicios() {
		$aData = array();
		$this->_SiteInfo['title'] .= ' - Servicios';
		$this->_menu = 'servicios';
		$this->_vcContentPlaceHolder = $this->load->view('productos', $aData, true);
		parent::index();
	}

	public function galeria() {
		$aData = array();
		$aData['galeria'] = $this->layout->obtener_galeria();
		$this->_SiteInfo['title'] .= ' - Galería';
		$this->_menu = 'galeria';
		$this->_vcContentPlaceHolder = $this->load->view('galeria', $aData, true);
		parent::index();
	}

	public function contacto() {
		$this->load->library('hits/googlemaps');
		$config = array();
		$config['center'] = '-24.859007,-65.452682';
		$config['zoom'] = 14;
		$config['directions'] = TRUE;
		
		//$config['directionsStart'] = '-24.782889,-65.41174';
		//$config['directionsStart'] = '-24.847344,-65.46155';
		//$config['directionsEnd'] = '-24.859007,-65.452682';
		//$config['directionsDivID'] = 'prueba';
		
		$this->googlemaps->initialize($config);
		$marker = array();
		$marker['position'] = '-24.859007,-65.452682';
		$marker['title'] = 'INDUSTRIAS y SERVICIOS Ro.So.Be';
		$marker['infowindow_content'] = 'Industrias y Servicios Ro.So.Be';
		$this->googlemaps->add_marker($marker);
		$aData['map'] = $this->googlemaps->create_map();
		$aData['vcMsjSrv']='';
		$this->_SiteInfo['title'] .= ' - Contacto';
		$this->_menu = 'contacto';
		if($this->input->post('form')) {
			$this->_inicReglasWeb();
        	if ($this->_validarReglasWeb()) {
	        	$aData['vcMsjSrv'] = 'Se envio con exito';
        	}
        	else {
	        	$this->_aEstadoOperWeb['status'] = 0;
            	$this->_aEstadoOperWeb['message'] = validation_errors();
            	$aData['vcMsjSrv'] = $this->_aEstadoOperWeb['message'];
        	}
		}
		$this->_vcContentPlaceHolder = $this->load->view('contacto', $aData, true);
		parent::index();
	}
	public function consultar() {
		$this->_inicReglasWeb();
        if ($this->_validarReglasWeb()) {
        	echo "si paso";
        }
        else {
        	$this->_aEstadoOperWeb['status'] = 0;
            $this->_aEstadoOperWeb['message'] = validation_errors();
        }
        if($this->_aEstadoOperWeb['status'] > 0) {
			$this->listado();
		} else {
			redirect('home/contacto');
			//$this->contacto();
		}
	}
}
?>