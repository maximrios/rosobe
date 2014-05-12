<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Maximiliano Ezequiel Rios
 * @version 1.0.0
 * @copyright 2014
 * @package Sabandijas Rodados
 */
class Contactos extends Ext_crud_Controller {
	function __construct() {
		parent::__construct();
        $this->load->model('sabandijas/contactos_model', 'contactos');
        $this->load->library('gridview');
        $this->load->library('Messages');
        $this->load->helper('utils_helper');
		$this->_aReglas = array(
			array(
	            'field'   => 'idContacto',
	            'label'   => 'Codigo de la Categoria',
	            'rules'   => 'trim|max_length[80]|xss_clean'
	        )
	        ,array(
	            'field'   => 'nombreContacto',
	            'label'   => 'Nombre de la Categoria',
	            'rules'   => 'trim|xss_clean'
	        )
		);
	}
	protected function _inicReg($boIsPostBack=false) {
		$this->_reg = array(
			'idContacto' => null
			,'nombreContacto' => null
			, 'telefonoContacto' => null
			, 'emailContacto' => null
			, 'mensajeContacto' => null
		);
		$id = ($this->input->post('idContacto')!==false)? $this->input->post('idContacto'):0;
		if($id!=0 && !$boIsPostBack) {
			$this->_reg = $this->contactos->obtenerUno($id);
		} 
		else {
			$this->_reg = array(
				'idContacto' => $id
				, 'nombreContacto' => set_value('nombreContacto')
				, 'telefonoContacto' => set_value('telefonoContacto')
				, 'emailContacto' => set_value('emailContacto')
				, 'mensajeContacto' => set_value('mensajeContacto')
			);			
		}
		return $this->_reg;
	}
	protected function _inicReglas() {
        $val = $this->form_validation->set_rules($this->_aReglas);
    }
	function index() {
		$this->_vcContentPlaceHolder = $this->load->view('administrator/sabandijas/contactos/principal', array(), true);
        parent::index();
	}
	public function listado() {
        $vcBuscar = ($this->input->post('vcBuscar') === FALSE) ? '' : $this->input->post('vcBuscar');
        $this->gridview->initialize(
                array(
                    'sResponseUrl' => 'administrator/contactos/listado'
                    , 'iTotalRegs' => $this->contactos->numRegs($vcBuscar)
                    , 'iPerPage' => ($this->input->post('per_page')==FALSE)? 10: $this->input->post('per_page')
                    , 'border' => FALSE
                    , 'sFootProperties' => 'class="paginador"'
                    , 'titulo' => 'Listado de Contactos'
                    , 'identificador' => 'idContacto'
                )
        );
        $this->gridview->addColumn('idContacto', '#', 'int');
        $this->gridview->addColumn('nombreContacto', 'Nombre', 'text');
        $this->gridview->addColumn('telefonoContacto', 'Telefono', 'text');
        $this->gridview->addColumn('emailContacto', 'Email', 'text');
        $this->gridview->addColumn('mensajeContacto', 'Mensaje', 'tinyText');
        $this->gridview->addColumn('fechaContacto', 'Fecha', 'datetime');
        $this->gridview->addParm('vcBuscar', $this->input->post('vcBuscar'));
        $ver = '<a href="administrator/contactos/formulario/{idContacto}" title="Mostrar mensaje de {nombreContacto}" class="btn-accion" rel="{\'idContacto\': {idContacto}}">&nbsp;<span class="glyphicon glyphicon-search"></span>&nbsp;</a>';
        $eliminar = '<a href="administrator/contactos/eliminar/{idContacto}" title="Eliminar mensaje de {nombreContacto}" class="btn-accion" rel="{\'idContacto\': {idContacto}}">&nbsp;<span class="glyphicon glyphicon-trash"></span>&nbsp;</a>';
        $controles = $ver.$eliminar;
        $this->gridview->addControl('inIdFaqCtrl', array('face' => $controles, 'class' => 'acciones'));
        $this->_rsRegs = $this->contactos->obtener($vcBuscar, $this->gridview->getLimit1(), $this->gridview->getLimit2());
        $this->load->view('administrator/sabandijas/contactos/listado'
            , array(
                'vcGridView' => $this->gridview->doXHtml($this->_rsRegs)
                , 'vcMsjSrv' => $this->_aEstadoOper['message']
                , 'txtvcBuscar' => $vcBuscar
            )
        );
    }
    function consulta() {
        echo "macondo";
    }
	function buscador() {
		$aData['Reg'] = $this->_inicReg($this->input->post('vcForm'));
        $aData['vcFrmAction'] = 'administrator/productos/guardar';
        $aData['vcMsjSrv'] = $this->_aEstadoOper['message'];
        $aData['vcAccion'] = ($this->_reg['idproducto'] > 0) ? 'Modificar' : 'Agregar';
        $this->load->view('administrator/sigep/productos/buscador', $aData);
	}
	function formulario() {
		$aData['Reg'] = $this->_inicReg($this->input->post('vcForm'));
        $aData['vcFrmAction'] = 'administrator/contactos/guardar';
        $aData['vcMsjSrv'] = $this->_aEstadoOper['message'];
        $aData['vcAccion'] = ($this->_reg['idContacto'] > 0) ? 'Modificar' : 'Agregar';
        $this->load->view('administrator/sabandijas/contactos/formulario', $aData);
	}
	function guardar() {
		antibotCompararLlave($this->input->post('vcForm'));
        $this->_inicReglas();
        if ($this->_validarReglas()) {
            $this->_inicReg((bool) $this->input->post('vcForm'));
			$this->_aEstadoOper['status'] = $this->con->guardar(
				array(
					($this->_reg['idCategoria'] != '' && $this->_reg['idCategoria'] != 0)? $this->_reg['idCategoria'] : 0
					, $this->_reg['nombreCategoria']
				)
			);
			if($this->_aEstadoOper['status'] > 0) {
				$this->_aEstadoOper['message'] = 'El registro fue guardado correctamente.';
			} 
			else {
				$this->_aEstadoOper['message'] = $this->_obtenerMensajeErrorDB($this->_aEstadoOper['status']);
			}
        }
        else {
            $this->_aEstadoOper['status'] = 0;
            $this->_aEstadoOper['message'] = validation_errors();
        }
		
		$this->_aEstadoOper['message'] = $this->messages->do_message(array('message'=>$this->_aEstadoOper['message'],'type'=> ($this->_aEstadoOper['status'] > 0)?'success':'alert'));
		if($this->_aEstadoOper['status'] >= 0) {
			$this->listado();
		} 
		else {
			$this->formulario();
		}
	}
	public function eliminar() {
		antibotCompararLlave($this->input->post('vcForm'));
    	$this->_aEstadoOper['status'] = $this->contactos->eliminar($this->input->post('idContacto'));
	   	if($this->_aEstadoOper['status'] > 0) {
			$this->_aEstadoOper['message'] = 'El registro fue eliminado con exito.';
	   	} 
	   	else {
			$this->_aEstadoOper['message'] = $this->_obtenerMensajeErrorDB($this->_aEstadoOper['status']);
	   	}
		$this->_aEstadoOper['message'] = $this->messages->do_message(array('message'=>$this->_aEstadoOper['message'],'type'=> ($this->_aEstadoOper['status'] > 0)?'success':'alert'));		
       	$this->listado();
	}
	function obtener() {
        $data = $this->productos->obtenerUno($this->input->post('idProducto'));
        echo json_encode($data);
	}
}

/* End of file personas.php */
/* Location: ./application/controllers/administrator/personas.php */