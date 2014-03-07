<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Galerias extends Ext_crud_Controller {
	public function __construct() {
		parent::__construct();
        $this->load->model('rosobe/galerias_model', 'galerias');
        $this->load->library('gridview');
        $this->load->library('Messages');
        $this->load->helper('utils_helper');
		$this->_aReglas = array(
			array(
	            'field'   => 'idGaleria',
	            'label'   => 'Codigo de Producto',
	            'rules'   => 'trim|max_length[80]|xss_clean'
	        )
	        ,array(
	            'field'   => 'nombreGaleria',
	            'label'   => 'Nombre del Producto',
	            'rules'   => 'trim|xss_clean|required'
	        )
            ,array(
                'field'   => 'descripcionGaleria',
                'label'   => 'Descripcion del Producto',
                'rules'   => 'trim|xss_clean'
            )
            ,array(
                'field'   => 'pathGaleria',
                'label'   => 'Path',
                'rules'   => 'trim|xss_clean|required'
            )
	        ,array(
	            'field'   => 'estadoGaleria',
	            'label'   => 'Estado',
	            'rules'   => 'trim|xss_clean'
	        )
		);
	}
	protected function _inicReg($boIsPostBack=false) {
		$this->_reg = array(
			'idGaleria' => null
			,'nombreGaleria' => null
			, 'descripcionGaleria' => null
            , 'pathGaleria' => null
            , 'estadoGaleria' => null
		);
		$id = ($this->input->post('idGaleria')!==false)? $this->input->post('idGaleria'):0;
		if($id!=0 && !$boIsPostBack) {
			$this->_reg = $this->galerias->obtenerUno($id);
		} 
		else {
			$this->_reg = array(
				'idGaleria' => $id
				, 'nombreGaleria' => set_value('nombreGaleria')
				, 'descripcionGaleria' => set_value('descripcionGaleria')
                , 'pathGaleria' => set_value('pathGaleria')
                , 'estadoGaleria' => set_value('estadoGaleria')
			);			
		}
		return $this->_reg;
	}
	protected function _inicReglas() {
        $val = $this->form_validation->set_rules($this->_aReglas);
    }
	function index() {
		$this->_vcContentPlaceHolder = $this->load->view('administrator/rosobe/galerias/principal', array(), true);
        parent::index();
	}
	public function listado() {
        $vcBuscar = ($this->input->post('vcBuscar') === FALSE) ? '' : $this->input->post('vcBuscar');
        $this->gridview->initialize(
                array(
                    'sResponseUrl' => 'administrator/galerias/listado'
                    , 'iTotalRegs' => $this->galerias->numRegs($vcBuscar)
                    , 'iPerPage' => ($this->input->post('per_page')==FALSE)? 10: $this->input->post('per_page')
                    , 'border' => FALSE
                    , 'sFootProperties' => 'class="paginador"'
                    , 'titulo' => 'Galeria de Imagenes'
                    , 'identificador' => 'idGaleria'
                )
        );
        $this->gridview->addColumn('idGaleria', '#', 'int');
        $this->gridview->addColumn('nombreGaleria', 'Titulo', 'text');
        $this->gridview->addColumn('descripcionGaleria', 'Descripcion', 'text');
        $this->gridview->addColumn('estadoGaleria', 'Estado', 'text');
        $this->gridview->addParm('vcBuscar', $this->input->post('vcBuscar'));
        $controles = '&nbsp;<a href="administrator/productos/formulario/{idGaleria}" title="Editar {nombreGaleria}" 
        class="btn-accion" rel="{\'idGaleria\': {idGaleria}}">&nbsp;<span class="glyphicon glyphicon-search"></span>&nbsp;</a>';
        $controles .= '&nbsp;<a href="administrator/galerias/publicacion/{idGaleria}" title="Cambiar estado de {nombreGaleria}" 
        class="btn-accion" rel="{\'idGaleria\': {idGaleria}}">&nbsp;<span class="glyphicon glyphicon-refresh"></span>&nbsp;</a>';
        $controles .= '<a href="administrator/galerias/formulario/{idGaleria}" title="Mostrar detalle de {nombreGaleria}" class="btn-accion" rel="{\'idGaleria\': {idGaleria}}">&nbsp;<span class="glyphicon glyphicon-pencil"></span>&nbsp;</a>';
        $controles .= '<a href="administrator/productos/formulario/{idGaleria}" title="Mostrar detalle de {nombreGaleria}" class="btn-accion" rel="{\'idGaleria\': {idGaleria}}">&nbsp;<span class="glyphicon glyphicon-trash"></span>&nbsp;</a>';
        $this->gridview->addControl('inIdFaqCtrl', array('face' => $controles, 'class' => 'acciones', 'style' => 'width:90px;'));
        $this->_rsRegs = $this->galerias->obtener($vcBuscar, $this->gridview->getLimit1(), $this->gridview->getLimit2());
        $this->load->view('administrator/rosobe/galerias/listado'
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
        $aData['vcFrmAction'] = 'administrator/galerias/guardar';
        $aData['vcMsjSrv'] = $this->_aEstadoOper['message'];
        $aData['vcAccion'] = ($this->_reg['idGaleria'] > 0) ? 'Modificar' : 'Agregar';
        $this->load->view('administrator/rosobe/galerias/formulario', $aData);
	}
	function guardar() {
        print_r($_POST);
        print_r($_FILES);
		antibotCompararLlave($this->input->post('vcForm'));
        $this->_inicReglas();
        if ($this->_validarReglas()) {
            $this->_inicReg((bool) $this->input->post('vcForm'));
			$this->_aEstadoOper['status'] = $this->galerias->guardar(
				array(
					($this->_reg['idGaleria'] != '' && $this->_reg['idGaleria'] != 0)? $this->_reg['idGaleria'] : 0
					, $this->_reg['nombreGaleria']
                    , $this->_reg['descripcionGaleria']
					, $this->_reg['pathGaleria']
                    , $this->_reg['thumbGaleria']
                    , $this->_reg['estadoGaleria']
				)
			);
        }
        else {
            $this->_aEstadoOper['status'] = 0;
            $this->_aEstadoOper['message'] = validation_errors();
        }
		if($this->_aEstadoOper['status'] > 0) {
			$this->_aEstadoOper['message'] = 'El registro fue guardado correctamente.';
		} 
		else {
			$this->_aEstadoOper['message'] = $this->_obtenerMensajeErrorDB($this->_aEstadoOper['status']);
		}
		$this->_aEstadoOper['message'] = $this->messages->do_message(array('message'=>$this->_aEstadoOper['message'],'type'=> ($this->_aEstadoOper['status'] > 0)?'success':'alert'));
		if($this->_aEstadoOper['status'] > 0) {
			$this->listado();
		} else {
			$this->formulario();
		}
	}
	function obtener() {
        $data = $this->productos->obtenerUno($this->input->post('idProducto'));
        echo json_encode($data);
	}

	public function publicacion($galeria) {
        $galeria = $this->galerias->obtenerUno($galeria);
        ($galeria['estadoGaleria'] == 'Sin publicar')? $estado=1 : $estado=0;
        $this->_aEstadoOper['status'] = $this->galerias->cambiarEstado(
            array(
                $estado
                , $galeria['idGaleria']
            )
        );
        if ($this->_aEstadoOper['status'] > 0) {
            $this->_aEstadoOper['message'] = 'Se modifico el estado correctamente.';
        } else {
            $this->_aEstadoOper['message'] = $this->_obtenerMensajeErrorDB($this->_aEstadoOper['status']);
        }

        $this->_aEstadoOper['message'] = $this->messages->do_message(array('message' => $this->_aEstadoOper['message'], 'type' => ($this->_aEstadoOper['status'] > 0) ? 'success' : 'alert'));

        if ($this->_aEstadoOper['status'] > 0) {
            $this->listado();
        } else {
            $this->formulario();
        }
    }
}

/* End of file personas.php */
/* Location: ./application/controllers/administrator/personas.php */