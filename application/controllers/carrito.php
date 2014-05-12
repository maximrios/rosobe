<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Nombre de métodos y variables respetando la notacion camel case en minúsculas. pe acercaDe()
 * Nombre de variables publicas de la clase indique el prefijo del tipo de datos. pe $inIdNoticia
 * Nombre de variables privadas de la clase indique un _ antes del prefijo del tipo de datos. pe $_inIdNoticia
 */
class Carrito extends Ext_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('layout_model', 'layout');
		$this->load->library('Messages');
        $this->load->helper('utils_helper');
		$this->_aReglas = array(
			array(
	        	'field'   => 'nombrePersona',
	            'label'   => 'Apellido y Nombre',
	            'rules'   => 'trim|max_length[80]|xss_clean|required'
			)
			, array(
	        	'field'   => 'telefonoPersona',
	            'label'   => 'Teléfono',
	            'rules'   => 'trim|min_lenght[10]|max_length[20]|xss_clean|numeric|required'
			)
			, array(
	        	'field'   => 'celularPersona',
	            'label'   => 'Celular',
	            'rules'   => 'trim|min_lenght[10]|max_length[20]|xss_clean|required'
			)
			, array(
	        	'field'   => 'emailPersona',
	            'label'   => 'Email',
	            'rules'   => 'trim|max_length[30]|xss_clean|valid_email|required'
			)
			, array(
	        	'field'   => 'domicilioPersona',
	            'label'   => 'Domicilio',
	            'rules'   => 'trim|max_length[30]|xss_clean'
			)
			, array(
	        	'field'   => 'ciudadPersona',
	            'label'   => 'Ciudad',
	            'rules'   => 'trim|max_length[30]|xss_clean|required'
			)
		);
	}
	protected function _inicReg($boIsPostBack=false) {
		$this->_reg = array(
			'nombrePersona' => null
			,'telefonoPersona' => null
			,'celularPersona' => null
			,'emailPersona' => null
			,'domicilioPersona' => null
			,'ciudadPersona' => null
		);
		$this->_reg = array(
			'nombrePersona' => set_value('nombrePersona')
			, 'telefonoPersona' => set_value('telefonoPersona')
			, 'celularPersona' => set_value('celularPersona')
			, 'emailPersona' => set_value('emailPersona')
			, 'domicilioPersona' => set_value('domicilioPersona')
			, 'ciudadPersona' => set_value('ciudadPersona')
		);			
		return $this->_reg;
	}
	protected function _inicReglas() {
        $val = $this->form_validation->set_rules($this->_aReglas);
    }
	protected function _inicReglasWeb() {
        $val = $this->form_validation->set_rules($this->_aReglas);
    }
	public function index() {
		$aData = array();
		$aData['breadcrumb'] = 'Home / Productos / Compra';
		$this->_menu = 'productos';
		$this->_SiteInfo['title'] .= ' - Mi carrito';
		$aData['productos'] = $this->cart->contents();
		if($this->cart->contents()) {
			$this->_vcContentPlaceHolder = $this->load->view('clientes/carrito_listado', $aData, true);
		}
		else {
			$aData['categorias'] = $this->layout->obtenerCategorias();
			$this->_vcContentPlaceHolder = $this->load->view('clientes/carrito_vacio', $aData, true);
		}
		parent::index();
	}
	public function registro() {
		if(!$this->cart->contents()) {
			redirect('carrito');
		}
		$aData = array();
		$aData['Reg'] = $this->_inicReg($this->input->post('vcForm'));
		$aData['vcMsjSrv'] = $this->_aEstadoOper['message'];
		$aData['productos'] = $this->cart->contents();
		$aData['categorias'] = $this->layout->obtenerCategorias();
		$this->_SiteInfo['title'] .= ' - Datos de envío';
		$aData['breadcrumb'] = 'Home / Carrito / Finalizar Pedido';
		$this->_menu = 'productos';
		$this->_vcContentPlaceHolder = $this->load->view('clientes/formulario', $aData, true);
		parent::index();
	}
	public function finalizar() {
		antibotCompararLlave($this->input->post('vcForm'));
        $this->_inicReglas();
        if ($this->_validarReglas() && $this->cart->contents()) {
        	$this->_inicReg((bool) $this->input->post('vcForm'));
        	$this->load->library('hits/mailer', array(), 'mailer');
        	$this->layout->guardarPersona(
        		array(
        			($this->layout->obtenerPersonaMail($this->_reg['emailPersona']))? 1: 0
        			, $this->_reg['nombrePersona']
        			, $this->_reg['telefonoPersona']
        			, $this->_reg['celularPersona']
        			, $this->_reg['emailPersona']
        			, $this->_reg['domicilioPersona']
        			, $this->_reg['ciudadPersona']
        		)
        	);
        	$aData['productos'] = $this->cart->contents();
        	if($this->mailer->enviarMail('Sabandijas Rodados - Pedido', 'clientes/listado', $aData, array(array('email' => $this->_reg['emailPersona'], 'nombre' => $this->_reg['nombrePersona'])))) {
        		$aData['datos'] = $this->_reg;
        		$this->mailer->enviarMail('Sabandijas Rodados - Pedido', 'clientes/pedido', $aData, array(array('email' => $this->config->config['ext_base_smtp_config_editable']['mail'], 'nombre' => $this->config->config['ext_base_smtp_config_editable']['asunto_mail'])));
        		$this->cart->destroy();
        		/*if($this->_aEstadoOper['message'] != '') {
            		$this->_aEstadoOper['message'] = $this->messages->do_message(array('message'=>$this->_aEstadoOper['message'],'type'=> ($this->_aEstadoOper['status'] > 0)?'success':'alert'));    
        		}*/
        		$this->mensaje(TRUE);
        	}
        	else {
        		$this->mensaje(FALSE);
        	}
        }
        else {
        	if($this->cart->contents()) {
        		$this->_aEstadoOper['status'] = 0;
            	$this->_aEstadoOper['message'] = validation_errors();
            	if($this->_aEstadoOper['message'] != '') {
            		$this->_aEstadoOper['message'] = $this->messages->do_message(array('message'=>$this->_aEstadoOper['message'],'type'=> ($this->_aEstadoOper['status'] > 0)?'success':'alert'));    
        		}
            	$this->registro();
        	}
        	else {
        		redirect('productos');
        	}
        }
        if($this->_aEstadoOper['message'] != '') {
            $this->_aEstadoOper['message'] = $this->messages->do_message(array('message'=>$this->_aEstadoOper['message'],'type'=> ($this->_aEstadoOper['status'] > 0)?'success':'alert'));    
        }
        /*$this->_aEstadoOper['message'] = $this->messages->do_message(array('message'=>$this->_aEstadoOper['message'],'type'=> ($this->_aEstadoOper['status'] > 0)?'success':'alert'));*/
        /*$this->load->library('hits/mailer', array(), 'mailer');
        $aData['productos'] = $this->cart->contents();
        $this->mailer->enviarMail('Probando', 'clientes/listado', $aData, array(array('email' => 'em-rios@hotmail.com', 'nombre' => 'Maximo')));*/
	}
	public function mensaje($band=TRUE) {
		$aData = array();
		$aData['Reg'] = $this->_inicReg($this->input->post('vcForm'));
		$aData['band'] = ($band)? 1:0;
		$aData['vcMsjSrv'] = $this->_aEstadoOper['message'];
		$aData['categorias'] = $this->layout->obtenerCategorias();
		$this->_SiteInfo['title'] .= ' - Compra finalizada';
		$aData['breadcrumb'] = 'Home / Carrito / Compra finalizada';
		$this->_menu = 'productos';
		$this->_vcContentPlaceHolder = $this->load->view('clientes/formulario_completo', $aData, true);
		parent::index();
	}
	public function agregarProducto() {
		$data = array(
               'id'      => $this->input->post('idProducto'),
               'qty'     => $this->input->post('cantidadProducto'),
               'price'   => $this->input->post('precioProducto'),
               'name'    => $this->input->post('nombreProducto'),
               'options' => array('Color' => $this->input->post('colorProducto'))
            );
		$this->cart->insert($data);
		redirect('carrito', 'refresh');
	}
	public function borrarProducto($rowid) {
		$this->cart->update(array('rowid' => $rowid, 'qty' => 0));
		redirect('carrito', 'refresh');
	}
}
?>