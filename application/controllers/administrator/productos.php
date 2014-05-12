<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Productos extends Ext_crud_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('hits/productos_model', 'productos');
        $this->load->model('hits/categorias_model', 'categorias');
        $this->load->library('gridview');
        $this->load->library('Messages');
        $this->load->helper('utils_helper');
        $this->_aReglas = array(
            array(
                'field'   => 'idProducto',
                'label'   => 'Codigo de Producto',
                'rules'   => 'trim|max_length[80]|xss_clean'
            )
            ,array(
                'field'   => 'nombreProducto',
                'label'   => 'Nombre del Producto',
                'rules'   => 'trim|xss_clean|required|strtoupper'
            )
            ,array(
                'field'   => 'codigoProducto',
                'label'   => 'Código del Producto',
                'rules'   => 'trim|xss_clean|required'
            )
            ,array(
                'field'   => 'precioProducto',
                'label'   => 'Precio de Producto',
                'rules'   => 'trim|xss_clean|decimal'
            )
            ,array(
                'field'   => 'descripcionProducto',
                'label'   => 'Descripcion del Producto',
                'rules'   => 'trim|xss_clean|required'
            )
            ,array(
                'field'   => 'categoriaProducto[]',
                'label'   => 'Categoria',
                'rules'   => 'trim|xss_clean|required'
            )
            ,array(
                'field'   => 'colorProducto[]',
                'label'   => 'Color del Producto',
                'rules'   => 'trim|xss_clean'
            )
        );
    }
    protected function _inicReg($boIsPostBack=false, $idProducto=0) {
        $this->_reg = array(
            'idProducto' => null
            ,'nombreProducto' => null
            ,'codigoProducto' => null
            ,'precioProducto' => null
            , 'descripcionProducto' => null
        );
        $id = ($this->input->post('idProducto')!==false)? $this->input->post('idProducto'):$idProducto;
        if($id!=0 && !$boIsPostBack) {
            $this->_reg = $this->productos->obtenerUno($id);
        } 
        else {
            $this->_reg = array(
                'idProducto' => $id
                , 'nombreProducto' => set_value('nombreProducto')
                , 'codigoProducto' => set_value('codigoProducto')
                , 'precioProducto' => set_value('precioProducto')
                , 'descripcionProducto' => set_value('descripcionProducto')
            );          
        }
        return $this->_reg;
    }
    protected function _inicReglas() {
        $val = $this->form_validation->set_rules($this->_aReglas);
    }
    function index() {
        $this->_vcContentPlaceHolder = $this->load->view('administrator/hits/productos/principal', array(), true);
        parent::index();
    }
    public function listado() {
        $vcBuscar = ($this->input->post('vcBuscar') === FALSE) ? '' : $this->input->post('vcBuscar');
        $this->gridview->initialize(
                array(
                    'sResponseUrl' => 'administrator/productos/listado'
                    , 'iTotalRegs' => $this->productos->numRegs($vcBuscar)
                    , 'iPerPage' => ($this->input->post('per_page')==FALSE)? 10: $this->input->post('per_page')
                    , 'border' => FALSE
                    , 'sFootProperties' => 'class="paginador"'
                    , 'titulo' => 'Listado de Productos'
                    , 'identificador' => 'idProducto'
                )
        );
        $this->gridview->addColumn('idProducto', '#', 'int');
        $this->gridview->addColumn('codigoProducto', 'Código', 'text');
        $this->gridview->addColumn('nombreProducto', 'Nombre', 'text');
        $this->gridview->addColumn('descripcionProducto', 'Descripcion', 'tinyText');
        $this->gridview->addColumn('precioProducto', 'Precio', 'double');
        $this->gridview->addColumn('publicadoProducto', 'Publicación', 'text');
        $this->gridview->addParm('vcBuscar', $this->input->post('vcBuscar'));
        $editar = '<a href="administrator/productos/formulario/{idProducto}" title="Editar {nombreProducto}" 
        class="btn-accion" rel="{\'idProducto\': {idProducto}}">&nbsp;<span class="glyphicon glyphicon-pencil"></span>&nbsp;</a>';
        $estado = '<a href="administrator/productos/publicacion/{idProducto}" title="Editar {nombreProducto}" 
        class="btn-accion" rel="{\'idProducto\': {idProducto}}">&nbsp;<span class="glyphicon glyphicon-refresh"></span>&nbsp;</a>';
        $eliminar = '<a href="administrator/productos/formulario/{idProducto}" title="Mostrar detalle de {nombreProducto}" class="btn-accion" rel="{\'idProducto\': {idProducto}}">&nbsp;<span class="glyphicon glyphicon-trash"></span>&nbsp;</a>';
        $controles = $editar.$estado.$eliminar;
        $this->gridview->addControl('inIdFaqCtrl', array('face' => $controles, 'class' => 'acciones'));
        $this->_rsRegs = $this->productos->obtener($vcBuscar, $this->gridview->getLimit1(), $this->gridview->getLimit2());
        $this->load->view('administrator/hits/productos/listado'
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
    function formulario($idProducto=0) {
        $aData['Reg'] = $this->_inicReg($this->input->post('vcForm'));    
        if(!$this->_reg['idProducto'] && $idProducto != 0) {
            $aData['Reg'] = $this->_inicReg(false, $idProducto);    
        }
        $aData['vcFrmAction'] = 'administrator/productos/guardar';
        $aData['vcMsjSrv'] = $this->_aEstadoOper['message'];
        $aData['vcAccion'] = ($this->_reg['idProducto'] > 0) ? 'Modificar' : 'Agregar';
        if($this->_reg['idProducto'] > 0) {
            $aData['imagenes'] = $this->productos->obtenerImagenes($this->_reg['idProducto']);
            $aData['categorias'] = $this->categorias->obtenerCategorias();
        }
        else {
            $aData['imagenes'] = FALSE;
            $aData['categorias'] = $this->categorias->obtenerCategorias();
        }
        $this->load->view('administrator/hits/productos/formulario', $aData);
    }
    function guardar() {
        antibotCompararLlave($this->input->post('vcForm'));
        $this->_inicReglas();
        if ($this->_validarReglas()) {
            $this->_inicReg((bool) $this->input->post('vcForm'));
            $this->_aEstadoOper['status'] = $this->productos->guardar(
                array(
                    ($this->_reg['idProducto'] != '' && $this->_reg['idProducto'] != 0)? $this->_reg['idProducto'] : 0
                    , $this->_reg['nombreProducto']
                    , $this->_reg['codigoProducto']
                    , ($this->_reg['precioProducto'])? $this->_reg['precioProducto']:0.00
                    , $this->_reg['descripcionProducto']
                    , url_title(strtolower($this->_reg['nombreProducto']))
                )
            );
            if($this->_aEstadoOper['status'] > 0) {
                $this->_aEstadoOper['message'] = 'El registro fue guardado correctamente.';
                if($_FILES['userfile']['name'][0] != '') {
                    $config = array(
                        'cantidad_imagenes' => count($_FILES['userfile']['name'])
                        , 'upload_path' => 'assets/images/productos/'
                        , 'allowed_types' => 'jpg'
                        , 'max_size' => 3000
                        , 'create_thumb' => true
                        , 'thumbs' => array(
                            array('thumb_marker' => '_detail', 'width' => 472)
                            , array('thumb_marker' => '_thumb', 'width' => 193)
                            , array('thumb_marker' => '_thumb_detail', 'width' => 80)
                        )
                    );
                    $this->load->library('hits/uploads', array(), 'uploads');
                    $data = $this->uploads->do_upload($config);
                    $band = true;
                    for($i=0; $i<$config['cantidad_imagenes']; $i++) {
                        $this->productos->guardarImagen(
                            array(
                                0
                                , ($this->_reg['idProducto'] != '' && $this->_reg['idProducto'] != 0)? $this->_reg['idProducto'] : $this->_aEstadoOper['status']
                                , $config['upload_path'].$data[$i]['file_name']
                                , $data[$i]['thumbnails'][0]['pathThumbnail']
                                , $data[$i]['thumbnails'][1]['pathThumbnail']
                                , $data[$i]['thumbnails'][2]['pathThumbnail']
                                , ($band)? 1:0
                                //, 1
                            )
                        );
                        $band = false;    
                    }
                }
            } 
            else {
                $this->_aEstadoOper['message'] = $this->_obtenerMensajeErrorDB($this->_aEstadoOper['status']);
            }
            $this->_reg['idProducto'] = ($this->_reg['idProducto'] != '' && $this->_reg['idProducto'] != 0)? $this->_reg['idProducto'] : $this->_aEstadoOper['status'];
            $this->categorias->eliminarCategoriasProducto($this->_reg['idProducto']);
            foreach ($this->input->post('categoriaProducto') as $categoria) {                 
                $this->categorias->guardarCategoriasProducto(
                    array(
                        $categoria
                        , $this->_reg['idProducto']
                    )
                );
            }
            $this->productos->eliminarColoresProducto($this->_reg['idProducto']);
            if($this->input->post('colorProducto')) {
                foreach ($this->input->post('colorProducto') as $color) {                 
                    $this->productos->guardarColoresProducto(
                        array(
                            $color
                            , $this->_reg['idProducto']
                        )
                    );
                }    
            }
        }
        else {
            $this->_aEstadoOper['status'] = 0;
            $this->_aEstadoOper['message'] = validation_errors();
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

    function eliminarImagen($idProductoImagen) {
        $imagen = $this->productos->obtenerUnaImagen($idProductoImagen);
        if($imagen) {
            $this->_aEstadoOper['status'] = $this->productos->eliminarImagen($idProductoImagen);
        }
        if($this->_aEstadoOper['status']) {
            $this->_aEstadoOper['message'] = 'Se elimino la imagen correctamente.';
        }
        else {
            $this->_aEstadoOper['message'] = 'No se pudo eliminar la imagen.';   
        }
        $this->_aEstadoOper['message'] = $this->messages->do_message(array('message' => $this->_aEstadoOper['message'], 'type' => ($this->_aEstadoOper['status'] > 0) ? 'success' : 'alert'));
        $this->formulario($imagen[0]['idProducto']);
    }
    function checkImagen($idProductoImagen) {
        $imagen = $this->productos->obtenerUnaImagen($idProductoImagen);
        if($imagen) {
            $this->_aEstadoOper['status'] = $this->productos->checkImagen($imagen[0]['idProducto'], $idProductoImagen);
        }
        if($this->_aEstadoOper['status']) {
            $this->_aEstadoOper['message'] = 'Se modificó la imagen predeterminada.';
        }
        else {
            $this->_aEstadoOper['message'] = 'No se pudo modificar la imagen predeterminada.';   
        }
        $this->_aEstadoOper['message'] = $this->messages->do_message(array('message' => $this->_aEstadoOper['message'], 'type' => ($this->_aEstadoOper['status'] > 0) ? 'success' : 'alert'));
        $this->formulario($imagen[0]['idProducto']);
    }
    public function publicacion($noticia) {
        $noticia = $this->productos->obtenerUno($noticia);
        ($noticia['publicadoProducto'] == 0)? $estado=1 : $estado=0;
        $this->_aEstadoOper['status'] = $this->productos->cambiarEstado(
            array(
                $estado
                , $noticia['idProducto']
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