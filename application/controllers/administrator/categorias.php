<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Categorias extends Ext_crud_Controller {
	public function __construct() {
		parent::__construct();
        $this->load->model('hits/categorias_model', 'categorias');
        $this->load->library('gridview');
        $this->load->library('Messages');
        $this->load->helper('utils_helper');
		$this->_aReglas = array(
			array(
	            'field'   => 'idCategoria',
	            'label'   => 'Codigo de la Categoria',
	            'rules'   => 'trim|xss_clean'
	        )
	        ,array(
	            'field'   => 'nombreCategoria',
	            'label'   => 'Nombre de Categoria',
	            'rules'   => 'trim|xss_clean|max_length[30]|required'
	        )
	        ,array(
	            'field'   => 'categoriaPadre[]',
	            'label'   => 'Categorias disponibles',
	            'rules'   => 'trim|xss_clean'
	        )
		);
	}
	protected function _inicReg($boIsPostBack=false) {
		$this->_reg = array(
			'idCategoria' => null
			,'nombreCategoria' => null
			,'pathCategoria' => null
		);
		$id = ($this->input->post('idCategoria')!==false)? $this->input->post('idCategoria'):0;
		if($id!=0 && !$boIsPostBack) {
			$this->_reg = $this->categorias->obtenerUno($id);
		} 
		else {
			$this->_reg = array(
				'idCategoria' => $id
				, 'nombreCategoria' => set_value('nombreCategoria')
				, 'pathCategoria' => set_value('pathCategoria')
			);			
		}
		return $this->_reg;
	}
	protected function _inicReglas() {
        $val = $this->form_validation->set_rules($this->_aReglas);
    }
	function index() {
		$this->_vcContentPlaceHolder = $this->load->view('administrator/hits/categorias/principal', array(), true);
        parent::index();
	}
	public function listado() {
        $vcBuscar = ($this->input->post('vcBuscar') === FALSE) ? '' : $this->input->post('vcBuscar');
        $this->gridview->initialize(
                array(
                    'sResponseUrl' => 'administrator/categorias/listado'
                    , 'iTotalRegs' => $this->categorias->numRegs($vcBuscar)
                    , 'iPerPage' => ($this->input->post('per_page')==FALSE)? 10: $this->input->post('per_page')
                    , 'border' => FALSE
                    , 'sFootProperties' => 'class="paginador"'
                    , 'titulo' => 'Listado de Categorias'
                    , 'identificador' => 'idCategoria'
                )
        );
        $this->gridview->addColumn('idCategoria', '#', 'int');
        $this->gridview->addColumn('nombreCategoria', 'Nombre', 'text');
        $this->gridview->addParm('vcBuscar', $this->input->post('vcBuscar'));
        $editar = '<a href="administrator/categorias/formulario/{idCategoria}" title="Editar {nombreCategoria}" 
        class="btn-accion" rel="{\'idCategoria\': {idCategoria}}">&nbsp;<span class="glyphicon glyphicon-pencil"></span>&nbsp;</a>';
        $eliminar = '<a href="administrator/categorias/formulario/{idCategoria}" title="Mostrar detalle de {nombreCategoria}" class="btn-accion" rel="{\'idCategoria\': {idCategoria}}">&nbsp;<span class="glyphicon glyphicon-trash"></span>&nbsp;</a>';
        $controles = $editar.$eliminar;
        $this->gridview->addControl('inIdFaqCtrl', array('face' => $controles, 'class' => 'acciones'));
        $this->_rsRegs = $this->categorias->obtener($vcBuscar, $this->gridview->getLimit1(), $this->gridview->getLimit2());
        $this->load->view('administrator/hits/categorias/listado'
            , array(
                'vcGridView' => $this->gridview->doXHtml($this->_rsRegs)
                , 'vcMsjSrv' => $this->_aEstadoOper['message']
                , 'txtvcBuscar' => $vcBuscar
            )
        );
    }
	function buscador() {
		$aData['Reg'] = $this->_inicReg($this->input->post('vcForm'));
        $aData['vcFrmAction'] = 'administrator/productos/guardar';
        $aData['vcMsjSrv'] = $this->_aEstadoOper['message'];
        $aData['vcAccion'] = ($this->_reg['idproducto'] > 0) ? 'Modificar' : 'Agregar';
        $this->load->view('administrator/hits/productos/buscador', $aData);
	}
	function formulario() {
		$aData['Reg'] = $this->_inicReg($this->input->post('vcForm'));
        $aData['vcFrmAction'] = 'administrator/categorias/guardar';
        $aData['categorias'] = $this->categorias->obtenerCategorias();
        $aData['relaciones'] = $this->categorias->obtenerCategoriasRelacion($this->_reg['idCategoria']);
        $aData['vcMsjSrv'] = $this->_aEstadoOper['message'];
        $aData['vcAccion'] = ($this->_reg['idCategoria'] > 0) ? 'Modificar' : 'Agregar';
        $this->load->view('administrator/hits/categorias/formulario', $aData);
	}
	function guardar() {
		antibotCompararLlave($this->input->post('vcForm'));
        $this->_inicReglas();
        if ($this->_validarReglas()) {
        	$data = array();
            $this->_inicReg((bool) $this->input->post('vcForm'));
            if($_FILES['userfile']['name'][0] != '') {
                $config = array(
                    'cantidad_imagenes' => count($_FILES['userfile']['name'])
                    , 'upload_path' => 'assets/images/categorias/'
                    , 'allowed_types' => 'jpg'
                    , 'max_size' => 3000
                    , 'create_thumb' => true
                    , 'thumbs' => array(
                    	array('thumb_marker' => '_thumb', 'width' => 472)
                    )
                );
                $this->load->library('hits/uploads', array(), 'uploads');
                $data = $this->uploads->do_upload($config);
            }
            else {
            	$data[0]['thumbnails'][0]['pathThumbnail'] = '';
            }
			$this->_aEstadoOper['status'] = $this->categorias->guardar(
				array(
					($this->_reg['idCategoria'] != '' && $this->_reg['idCategoria'] != 0)? $this->_reg['idCategoria'] : 0
					, $this->_reg['nombreCategoria']
					, url_title(strtolower($this->_reg['nombreCategoria']))
					, $data[0]['thumbnails'][0]['pathThumbnail']
				)
			);
			if($this->_aEstadoOper['status'] > 0) {
				$this->_aEstadoOper['message'] = 'El registro fue guardado correctamente.';
            	if($this->input->post('categoriaPadre')) {
            		$this->categorias->eliminarCategoriasRelacion($this->_reg['idCategoria']);
                	foreach ($this->input->post('categoriaPadre') as $categoria) {                 
	                    $this->categorias->guardarCategoriasRelacion(
                        	array(
	                            $categoria
                            	, $this->_reg['idCategoria']
                        	)
                    	);
                	}    
            	}
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
		if($this->_aEstadoOper['status'] > 0) {
			$this->listado();
		} 
		else {
			$this->formulario();
		}
	}
	public function eliminar() {
		antibotCompararLlave($this->input->post('vcForm'));
    	$this->_aEstadoOper['status'] = $this->categorias->eliminar($this->input->post('idCategoria'));
	   	if($this->_aEstadoOper['status'] > 0) {
			$this->_aEstadoOper['message'] = 'El registro fue eliminado con exito.';
	   	} 
	   	else {
			$this->_aEstadoOper['message'] = $this->_obtenerMensajeErrorDB($this->_aEstadoOper['status']);
	   	}
		$this->_aEstadoOper['message'] = $this->messages->do_message(array('message'=>$this->_aEstadoOper['message'],'type'=> ($this->_aEstadoOper['status'] > 0)?'success':'alert'));		
       	$this->listado();
	}
}