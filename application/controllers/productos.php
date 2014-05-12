<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Nombre de métodos y variables respetando la notacion camel case en minúsculas. pe acercaDe()
 * Nombre de variables publicas de la clase indique el prefijo del tipo de datos. pe $inIdNoticia
 * Nombre de variables privadas de la clase indique un _ antes del prefijo del tipo de datos. pe $_inIdNoticia
 */
class Productos extends Ext_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('layout_model', 'layout');
		$this->load->library('Messages');
		
        $this->load->helper('utils_helper');
		$this->_aReglas = array(
			array(
	        	'field'   => 'txtnombre',
	            'label'   => 'Nombre',
	            'rules'   => 'trim|max_length[80]|xss_clean|required'
			)
			, array(
	        	'field'   => 'txttelefono',
	            'label'   => 'Telefono',
	            'rules'   => 'trim|max_length[1]|xss_clean|required'
			)
		);
	}
	protected function _inicReg($boIsPostBack=false) {
        $this->_reg = array(
            'txtnombre' => null
            ,'txttelefono' => null
            , 'txtemail' => null
            , 'txtmensaje' => null
        );
        $id = ($this->input->post('idProducto')!==false)? $this->input->post('idProducto'):0;
        if($id!=0 && !$boIsPostBack) {
            $this->_reg = $this->productos->obtenerUno($id);
        } 
        else {
            $this->_reg = array(
                'idProducto' => $id
                , 'nombreProducto' => set_value('nombreProducto')
                , 'descripcionProducto' => set_value('descripcionProducto')
            );          
        }
        return $this->_reg;
    }
	protected function _inicReglasWeb() {
        $val = $this->form_validation->set_rules($this->_aReglas);
    }
	public function index() {
		$aData = array();
		$config['base_url'] = 'productos';
		$config['total_rows'] = $this->layout->numRegsProductos();
		$config['per_page'] = 8;
		$config['per_page_options'] = 8;
		$config['uri_segment'] = 2;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = 5;
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active">';
		$config['cur_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$this->load->library('pagination', $config);
		$page = ($this->uri->segment(2))? $this->uri->segment(2):0;
		$aData = array();
		$aData['paginacion'] = $this->pagination->create_links();
		$this->_SiteInfo['title'] .= ' - Productos';
		$this->_menu = 'productos';
		$aData['breadcrumb'] = 'Home / Productos';
		$aData['busqueda'] = $this->input->post('busqueda');
		$aData['categoria'] = '';
		$aData['categorias'] = $this->layout->obtenerCategorias();
		$aData['productos'] = $this->layout->obtenerProductos();	
		$this->_vcContentPlaceHolder = $this->load->view('productos', $aData, true);
		parent::index();
	}
	function categoria($idCategoria) {
		$categoria = $this->layout->obtenerCategoriaId($idCategoria);
		if($categoria) {
			$aData = array();
        	$config['base_url'] = 'productos';
			$config['total_rows'] = $this->layout->numRegsProductos('', $categoria['idCategoria']);
			$config['per_page'] = 8;
			$config['per_page_options'] = 8;
			$config['uri_segment'] = 4;
			$config['use_page_numbers'] = TRUE;
			$config['num_links'] = 5;
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active">';
			$config['cur_tag_close'] = '</li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$this->load->library('pagination', $config);
			$aData["paginacion"] = $this->pagination->create_links();
			$page = ($this->uri->segment(4))? $this->uri->segment(4):0;
			$this->_SiteInfo['title'] .= ' - Productos';
			$this->_menu = 'productos';
			$aData['breadcrumb'] = 'Home / Productos /'.$categoria['nombreCategoria'];
			$aData['busqueda'] = '';
			$aData['categoria'] = $categoria;
			$aData['categorias'] = $this->layout->obtenerCategorias();
			$aData['productos'] = $this->layout->obtenerProductos($categoria['idCategoria']);
			$this->_vcContentPlaceHolder = $this->load->view('productos', $aData, true);
			parent::index();
		}
		else {
			echo "la categoria no existe";
		}
	}
	public function busqueda($busqueda='') {
		if($this->input->post() && trim($this->input->post('busqueda'))!=''){
            $busqueda = $this->input->post('busqueda');
            redirect('productos/busqueda/'.$busqueda);
        }
        elseif ($busqueda != '' && $this->layout->obtenerProductosFind($busqueda)) {
        	$aData = array();

        	$config['base_url'] = 'productos/busqueda';
			$config['total_rows'] = $this->layout->numRegsProductos($busqueda);
			$config['per_page'] = 8;
			$config['per_page_options'] = 8;
			$config['uri_segment'] = 4;
			$config['use_page_numbers'] = TRUE;
			$config['num_links'] = 5;
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active">';
			$config['cur_tag_close'] = '</li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$this->load->library('pagination', $config);
			$aData["paginacion"] = $this->pagination->create_links();
			$page = ($this->uri->segment(4))? $this->uri->segment(4):0;
		}
		else {
			$config['per_page'] = 99999;
			$page = 0;
			$aData["paginacion"] = '';
		}
			$this->_SiteInfo['title'] .= ' - Productos';
			$this->_menu = 'productos';
			$aData['breadcrumb'] = 'Home / Productos';
			$aData['busqueda'] = $busqueda;
			$aData['categoria'] = '';
			$aData['categorias'] = $this->layout->obtenerCategorias();
			$aData['productos'] = $this->layout->obtenerProductosFind($busqueda, 0, $config['per_page'], $page);
			$this->_vcContentPlaceHolder = $this->load->view('productos', $aData, true);
			parent::index();
        //}
	}
	public function login() {
		$aData = array();
		$this->_SiteInfo['title'] .= ' - Clientes - Iniciar Sesión';
		$aData['breadcrumb'] = 'Home / Clientes / Iniciar Sesión';
		$this->_menu = '';
		$this->_vcContentPlaceHolder = $this->load->view('clientes/login', $aData, true);
		parent::index();
	}
	public function productos($uriCategoria=null) {
		$aData = array();
		$this->_SiteInfo['title'] .= ' - Productos';
		$this->_menu = 'productos';
		$categoria = $this->layout->obtenerCategoriaSlug($uriCategoria);
		$aData['breadcrumb'] = 'Home / Productos / '.$categoria['nombreCategoria'];
		$aData['categorias'] = $this->layout->obtenerCategorias();
		$aData['productos'] = $this->layout->obtenerProductos();
		$this->_vcContentPlaceHolder = $this->load->view('productos', $aData, true);
		parent::index();
	}
	public function producto($slug) {
		$aData = array();
		$aData['producto'] = $this->layout->obtenerProductoSlug($slug);
		$aData['breadcrumb'] = 'Home / Productos / Categoria';
		if(!$aData['producto']) {
			redirect('inicio/no_producto');
		}
		else {
			$aData['imagenes'] = $this->layout->obtenerImagenes($aData['producto']['idProducto']);
		}
		$aData['colores'] = $this->layout->dropdownProductosColores($aData['producto']['idProducto']);
		$this->_SiteInfo['title'] .= ' - '.$aData['producto']['nombreProducto'];
		$this->_menu = 'productos';
		$this->_vcContentPlaceHolder = $this->load->view('producto', $aData, true);
		parent::index();
	}
	public function no_producto() {
		echo "no existe";
	}
	public function servicios() {
		$aData = array();
		$this->_SiteInfo['title'] .= ' - Servicios';
		$this->_menu = 'servicios';
		$this->_vcContentPlaceHolder = $this->load->view('servicios', $aData, true);
		parent::index();
	}
	public function envios() {
		$aData = array();
		$aData['formaspagos'] = $this->layout->obtenerFormasPagos();
		$this->_SiteInfo['title'] .= ' - Pagos y Envíos';
		$aData['breadcrumb'] = 'Home / Pagos y Envíos';
		$this->_menu = 'envios';
		$this->_vcContentPlaceHolder = $this->load->view('envios', $aData, true);
		parent::index();
	}
	public function novedades() {
		$aData = array();
		$config['base_url'] = 'novedades';
		$config['total_rows'] = $this->layout->numRegsNoticias();
		$config['per_page'] = 3;
		$config['per_page_options'] = 3;
		$config['uri_segment'] = 2;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = 100;
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active">';
		$config['cur_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$this->load->library('pagination', $config);
		//$this->pagination->initialize($config);
		$page = ($this->uri->segment(2))? $this->uri->segment(2):0;
		$this->_SiteInfo['title'] .= ' - Novedades';
		$this->_menu = 'novedades';
		$aData['breadcrumb'] = 'Home / Novedades';
		$aData['noticias'] = $this->layout->obtenerNoticias($config['per_page'], $page);
		$aData["paginacion"] = $this->pagination->create_links();
		$this->_vcContentPlaceHolder = $this->load->view('noticias', $aData, true);
		parent::index();
	}
	public function novedad($slug) {
		$aData = array();
		$aData['noticia'] = $this->layout->obtenerNoticiaSlug($slug);
		$aData['breadcrumb'] = 'Home / Novedades / '.$aData['noticia']['tituloNoticia'];
		if(!$aData['noticia']) {
			redirect('inicio/no_producto');
		}
		$this->_SiteInfo['title'] .= ' - '.$aData['noticia']['tituloNoticia'];
		$this->_menu = 'novedades';
		$this->_vcContentPlaceHolder = $this->load->view('noticia', $aData, true);
		parent::index();
	}
	public function contacto() {
		$this->load->library('hits/googlemaps');
		$config = array();
		$config['center'] = '-31.2992526,-64.2889189';
		$config['zoom'] = 14;
		$config['directions'] = TRUE;
		$config['map_height'] = 230;
		
		//$config['directionsStart'] = '-24.782889,-65.41174';
		//$config['directionsStart'] = '-24.847344,-65.46155';
		//$config['directionsEnd'] = '-24.859007,-65.452682';
		//$config['directionsDivID'] = 'prueba';
		
		$this->googlemaps->initialize($config);
		$marker = array();
		$marker['position'] = '-31.2992526,-64.2889189';
		$marker['title'] = 'Sabandijas Rodados';
		$marker['infowindow_content'] = 'Sabandijas Rodados | TE: 03543 43-5608';
		$this->googlemaps->add_marker($marker);
		$aData['map'] = $this->googlemaps->create_map();
		$aData['Reg'] = $this->_inicReg($this->input->post('vcForm'));
        $aData['vcFrmAction'] = 'contacto';
		$aData['vcMsjSrv'] = $this->_aEstadoOper['message'];
		$this->_SiteInfo['title'] .= ' - Contacto';
		$this->_menu = 'contacto';
		if($this->input->post('form')) {
			echo "aca andamio";
			die();
			$this->_inicReglasWeb();
        	if ($this->_validarReglas()) {
	        	$aData['vcMsjSrv'] = 'Se envio con exito';
        	}
        	else {
	        	$this->_aEstadoOperWeb['status'] = 0;
            	$this->_aEstadoOperWeb['message'] = validation_errors();
            	$aData['vcMsjSrv'] = $this->_aEstadoOperWeb['message'];
        	}
		}
		$aData['breadcrumb'] = 'Home / Contacto';
		$this->_vcContentPlaceHolder = $this->load->view('contacto', $aData, true);
		parent::index();
	}
	public function consultar() {
		$this->_inicReglasWeb();
        if ($this->_validarReglas()) {
        	echo "si paso";
        }
        else {
        	$this->_aEstadoOperWeb['status'] = 0;
            $this->_aEstadoOperWeb['message'] = validation_errors();
        }
        if($this->_aEstadoOperWeb['status'] > 0) {
			$this->listado();
		} else {
			//redirect('contacto');
			$this->contacto();
		}
	}
	function buscar() {
		
	}
}
?>