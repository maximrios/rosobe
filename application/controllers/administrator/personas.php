<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Personas extends Ext_crud_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('hits/personas_model', 'persona');
		$this->load->library('gridview');
		$this->load->library('Messages');
        $this->load->helper('utils_helper');
		$this->estados = $this->persona->dropdownEstadoCivil();
		$this->sexos = $this->persona->dropdownSexo();
		$this->_aReglas = array(
			array(
	        	'field'   => 'nombrePersona',
	            'label'   => 'Nombre',
	            'rules'   => 'trim|max_length[50]|min_length[7]|xss_clean|required'
	        )
	        ,array(
	        	'field'   => 'domicilioPersona',
	            'label'   => 'Domicilio de la Persona',
	            'rules'   => 'trim|xss_clean|max_length[80]'
	        ) 
	        ,array(
	        	'field'   => 'telefonoPersona',
	            'label'   => 'Numero de telefono de la Persona',
	            'rules'   => 'trim|xss_clean|is_numeric'
	        )
			,array(
	        	'field'   => 'celularPersona',
	            'label'   => 'Numero de celular de la Persona',
	            'rules'   => 'trim|xss_clean|is_numeric'
	        )
	        ,array(
	        	'field'   => 'emailPersona',
	            'label'   => 'Correo electronico de la Persona',
	            'rules'   => 'trim|xss_clean|valid_email|required'
	        )
	        ,array(
	        	'field'   => 'ciudadPersona',
	            'label'   => 'Ciudad de la Persona',
	            'rules'   => 'trim|xss_clean|required'
	        )
		);
		$this->_aBuscar = array(
	    	array(
	        	'field'   => 'vcBuscar',
	            'label'   => 'Buscar por texto',
	            'rules'   => 'trim|required|xss_clean|min_length[3]|max_length[50]|callback_onlySearch'
	        )
        );
	}
	protected function _inicReg($boIsPostBack=false) {
		$this->_reg = array(
			'idPersona' => null
			, 'nombrePersona' => null
			, 'domicilioPersona' => null
			, 'telefonoPersona' => null
			, 'celularPersona' => null
			, 'emailPersona' => null
			, 'ciudadPersona' => null
		);
		$id = ($this->input->post('idPersona')!==false)? $this->input->post('idPersona'):0;
		if($id!=0 && !$boIsPostBack) {
			$this->_reg = $this->persona->obtenerPersonaId($id);
		} 
		else {
			$this->_reg = array(
				'idPersona' => $id
				, 'nombrePersona' => set_value('nombrePersona')
				, 'domicilioPersona' => set_value('domicilioPersona')
				, 'telefonoPersona' => set_value('telefonoPersona')
				, 'celularPersona' => set_value('celularPersona')
				, 'emailPersona' => set_value('emailPersona')
				, 'ciudadPersona' => set_value('ciudadPersona')
			);			
		}
		return $this->_reg;
	}
	protected function _inicReglas() {
        $val = $this->form_validation->set_rules($this->_aReglas);
    }
	function index() {
		$this->_vcContentPlaceHolder = $this->load->view('administrator/hits/personas/principal', array(), true);
        parent::index();
	}
	public function listado() {
		$this->form_validation->set_rules($this->_aBuscar);
        if($this->form_validation->run()==FALSE) {
            $vcBuscar = '';
        } else {
            $vcBuscar = ($this->input->post('vcBuscar')==FALSE)?'': $this->input->post('vcBuscar');
        }
        $vcBuscar = ($this->input->post('vcBuscar') === FALSE) ? '' : $this->input->post('vcBuscar');
        $this->gridview->initialize(
                array(
                    'sResponseUrl' => 'administrator/personas/listado'
                    , 'iTotalRegs' => $this->persona->numRegs($vcBuscar)
                    , 'iPerPage' => ($this->input->post('per_page')==FALSE)? 10: $this->input->post('per_page')
                    , 'border' => FALSE
                    , 'sFootProperties' => 'class="paginador"'
                    , 'titulo' => 'Listado de Personas'
                    , 'identificador' => 'idPersona'
                )
        );
        $this->gridview->addColumn('idPersona', '#', 'int');
        $this->gridview->addColumn('nombrePersona', 'Nombre Persona', 'text');
        $this->gridview->addColumn('domicilioPersona', 'Domicilio', 'text');
        $this->gridview->addColumn('telefonoPersona', 'Telefono', 'text');
        $this->gridview->addColumn('celularPersona', 'Celular', 'text');
        $this->gridview->addColumn('emailPersona', 'Email', 'text');
        $this->gridview->addColumn('ciudadPersona', 'Ciudad', 'text');
        $this->gridview->addParm('vcBuscar', $this->input->post('vcBuscar'));
        $controles = '<a href="administrator/personas/formulario/{idPersona}" title="Editar {nombrePersona}" 
        class="btn-accion" rel="{\'idPersona\': {idPersona}}">&nbsp;<span class="glyphicon glyphicon-pencil"></span>&nbsp;</a>';
        $this->gridview->addControl('inIdFaqCtrl', array('face' => $controles, 'class' => 'acciones'));
        $this->_rsRegs = $this->persona->obtener($vcBuscar, $this->gridview->getLimit1(), $this->gridview->getLimit2());
        $this->load->view('administrator/hits/personas/listado'
            , array(
                'vcGridView' => $this->gridview->doXHtml($this->_rsRegs)
                , 'vcMsjSrv' => $this->_aEstadoOper['message']
                , 'txtvcBuscar' => $vcBuscar
            )
        );
    }
	function formulario() {
		$aData['Reg'] =  $this->_inicReg(FALSE);
        $aData['vcFrmAction'] = 'administrator/personas/guardar';
        $aData['vcMsjSrv'] = $this->_aEstadoOper['message'];
        $aData['vcAccion'] = 'Agregar';
		$this->load->view('administrator/hits/personas/formulario', $aData);
	}
	function guardar() {
		antibotCompararLlave($this->input->post('vcForm'));
        $this->_inicReglas();
        if ($this->_validarReglas()) {
           	$this->_inicReg((bool) $this->input->post('vcForm'));
            $this->_aEstadoOper['status'] = $this->persona->guardar(
				array(
					$this->_reg['idPersona']
					, $this->_reg['nombrePersona']
					, $this->_reg['domicilioPersona']
					, $this->_reg['telefonoPersona']
					, $this->_reg['celularPersona']
					, $this->_reg['emailPersona']
					, $this->_reg['ciudadPersona']
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
		//Lo que sigue a continuacion deberia de ir dentro de un if que controle las validaciones
		
		$this->_aEstadoOper['message'] = $this->messages->do_message(array('message'=>$this->_aEstadoOper['message'],'type'=> ($this->_aEstadoOper['status'] > 0)?'success':'alert'));

		if($this->_aEstadoOper['status'] > 0) {
			$this->listado();
		} else {
			$this->formulario();
		}
	}
	function buscar() {
		$registro = $this->_inicReg(false);
		
		if($this->input->post('buscar_persona')) {

		}
		else {
			redirect('administrator/home');
		}
	}
	function consulta($id) {
		echo "por aca andamio";
	}
	public function obtenerAutocompletePersonas() {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->persona->obtenerAutocompletePersonas($q);
        }
    }
    function formacion() {
    	$this->load->view('administrator/hits/personas/formulario-academico');
    }
    public function onlySearch($str) {
        $regex = "/^[0-9a-zA-ZáéíóúüñÁÉÍÓÚÜÑ]+[0-9a-zA-ZáéíóúüñÁÉÍÓÚÜÑ\ \-\_\.\@\']*[0-9a-zA-ZáéíóúüñÁÉÍÓÚÜÑ]+$/";
        return ($str=='' or preg_match($regex, $str));
    }
    public function export() {
    	$this->load->library('hits/excelmanager');
    	$personas = $this->persona->obtenerExport();
    	$config = array(
    		'header' => array(
    			'ID'
    			, 'Nombre Completo'
    			, 'Domicilio'
    			, 'Telefono'
    			, 'Celular'
    			, 'Email'
    			, 'Ciudad'
    		)
    		,'title' => 'Lista Personas'
    	);
    	//print_r($personas);
    	$this->excelmanager->export($config, $personas);
    }
}

/* End of file personas.php */
/* Location: ./application/controllers/administrator/personas.php */