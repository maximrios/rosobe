<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Productos extends Ext_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('layout_model', 'layout');
		$this->load->library('Messages');
        $this->load->helper('utils_helper');
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
		$aData['breadcrumb'] = '<a href="#">Inicio</a> > Productos';
		$aData['busqueda'] = $this->input->post('busqueda');
		$aData['categoria'] = '';
		$aData['categorias'] = $this->layout->obtenerCategorias();
		$aData['destacados'] = $this->layout->obtenerDestacados(3);
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
        elseif ($busqueda != '' && $this->layout->obtenerProductos($busqueda)) {
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
			$aData['destacados'] = $this->layout->obtenerDestacados(3);
			$aData['productos'] = $this->layout->obtenerProductos($busqueda, 0, $config['per_page'], $page);
			$this->_vcContentPlaceHolder = $this->load->view('productos', $aData, true);
			parent::index();
        //}
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
	public function producto($id, $slug) {
		$aData = array();
		$aData['producto'] = $this->layout->obtenerUnoProducto($id, $slug);
		$aData['breadcrumb'] = '<a href="#">Inicio</a> > <a href="productos">Productos</a> > '.$aData['producto']['nombreProducto'];
		if(!$aData['producto']) {
			redirect('inicio/no_producto');
		}
		else {
			$aData['imagenes'] = $this->layout->obtenerImagenes($aData['producto']['idProducto']);
		}
		$aData['destacados'] = $this->layout->obtenerDestacados(4);
		$this->_SiteInfo['title'] .= ' - '.$aData['producto']['nombreProducto'];
		$this->_menu = 'productos';
		$this->_vcContentPlaceHolder = $this->load->view('producto', $aData, true);
		parent::index();
	}
	public function no_producto() {
		echo "no existe";
	}
}
?>