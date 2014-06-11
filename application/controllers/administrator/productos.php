<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Productos extends Ext_crud_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('hits/productos_model', 'productos');
        $this->load->model('hits/categorias_model', 'categorias');
        $this->load->library('gridview');
        $this->load->library('Messages');
        $this->load->helper('utils_helper');
        $this->load->helper('ckeditor_helper');
        $this->capa = array(
            'id'    =>  'descripcionProducto',
            'path'  =>  'assets/libraries/ckeditor',
            'config' => array(
                'toolbar'   =>  "Full",
                'width'     =>  "100%",
                'height'    =>  '100px',
 
            ),
        );
        $this->_aReglas = array(
            array(
                'field'   => 'idProducto',
                'label'   => 'Codigo de Producto',
                'rules'   => 'trim|max_length[80]|xss_clean'
            )
            ,array(
                'field'   => 'nombreProducto',
                'label'   => 'Nombre del Producto',
                'rules'   => 'trim|xss_clean|required'
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
                'field'   => 'novedadProducto',
                'label'   => 'Producto como novedad',
                'rules'   => 'trim|xss_clean'
            )
            ,array(
                'field'   => 'ofertaProducto',
                'label'   => 'Producto como oferta',
                'rules'   => 'trim|xss_clean'
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
            , 'novedadProducto' => 0
            , 'ofertaProducto' => 0
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
                , 'novedadProducto' => set_value('novedadProducto')
                , 'ofertaProducto' => set_value('ofertaProducto')
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
        $eliminar = '<a href="administrator/productos/eliminar/{idProducto}" title="Eliminar {nombreProducto}" class="btn-accion" rel="{\'idProducto\': {idProducto}}">&nbsp;<span class="glyphicon glyphicon-trash"></span>&nbsp;</a>';
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
        $this->load->view('administrator/sigep/productos/buscador', $aData);
    }
    function formulario($idProducto=0) {
        $aData['ckeditor'] = $this->capa;
        $aData['Reg'] = $this->_inicReg($this->input->post('vcForm'));    
        if(!$this->_reg['idProducto'] && $idProducto != 0) {
            $aData['Reg'] = $this->_inicReg(false, $idProducto);    
        }
        $aData['vcFrmAction'] = 'administrator/productos/guardar';
        $aData['vcMsjSrv'] = $this->_aEstadoOper['message'];
        $aData['vcAccion'] = ($this->_reg['idProducto'] > 0) ? 'Modificar' : 'Agregar';
        if($this->_reg['idProducto'] > 0) {
            $aData['imagenes'] = $this->productos->obtenerImagenes($this->_reg['idProducto']);
            //$aData['colores'] = $this->productos->obtenerColores();
            $aData['categorias'] = $this->categorias->obtenerCategorias();
        }
        else {
            $aData['imagenes'] = FALSE;
            //$aData['colores'] = $this->productos->obtenerColores();
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
                    , ($this->_reg['novedadProducto'] == true)? 1:0
                    , ($this->_reg['ofertaProducto'] == true)? 1:0
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
            /*$this->productos->eliminarColoresProducto($this->_reg['idProducto']);
            if($this->input->post('colorProducto')) {
                foreach ($this->input->post('colorProducto') as $color) {                 
                    $this->productos->guardarColoresProducto(
                        array(
                            $color
                            , $this->_reg['idProducto']
                        )
                    );
                }    
            }*/
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

    /*function do_upload($config_user) {
        $config['upload_path'] = $config_user['upload_path'];
        $config['allowed_types'] = $config_user['allowed_types'];
        $config['max_size'] = $config_user['max_size'];
        $this->load->library('upload', $config);
        $this->load->library('image_lib');
        $upload_files = $_FILES;
        for($i = 0; $i < $config_user['cantidad_imagenes']; $i++) {
            $_FILES['userfile'] = array(
                'name' => $upload_files['userfile']['name'][$i],
                'type' => $upload_files['userfile']['type'][$i],
                'tmp_name' => $upload_files['userfile']['tmp_name'][$i],
                'error' => $upload_files['userfile']['error'][$i],
                'size' => $upload_files['userfile']['size'][$i]
            );
            if (!$this->upload->do_upload()) {
                $error = array('error' => $this->upload->display_errors());
                $this->_aEstadoOper['message'] = $error;
            } 
            else {
                $data = $this->upload->data();
                if($config_user['create_thumb']) {
                    foreach ($config_user['thumbs'] as $thumb) {
                        $configa['create_thumb'] = $config_user['create_thumb'];
                        $configa['maintain_ratio'] = TRUE;
                        $configa['new_image'] = $config_user['upload_path'];
                        $configa['source_image'] = $config_user['upload_path'].$data['file_name'];
                        $configa['thumb_marker'] = $thumb['thumb_marker'];
                        $configa['width'] = $thumb['width'];
                        $configa['height'] = 1;
                        $configa['master_dim'] = 'width';
                        $this->image_lib->initialize($configa);
                        if($this->image_lib->resize()) {
                            $nombreThumbnail = $data['raw_name'].$thumb['thumb_marker'].$data['file_ext'];
                            $data['thumbnails'][] = array('nombreThumbnail' => $nombreThumbnail, 'pathThumbnail' => $config_user['upload_path'].$nombreThumbnail);
                        }
                        else {
                            $data['thumbnails'][] = array_merge($this->errors, array($image->error->string));
                        }
                        $configa = array();
                    }
                    $this->image_lib->clear();
                }
            }
        }
        return $data;
    }
    function _create_thumbnail($filename, $width, $height){
        $config['image_library'] = 'gd2';
        //CARPETA EN LA QUE ESTÁ LA IMAGEN A REDIMENSIONAR
        $config['source_image'] = 'assets/images/productos/'.$filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        //CARPETA EN LA QUE GUARDAMOS LA MINIATURA
        $config['new_image']='assets/images/productos/';
        $config['width'] = $width;
        $config['height'] = $height;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }*/
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
    public function eliminar($idProducto) {
        if($idProducto) {
            $this->_aEstadoOper['status'] = $this->productos->eliminar($idProducto);
            if($this->_aEstadoOper['status']) {
                $this->_aEstadoOper['message'] = 'Se elimino el producto correctamente.';
            }
            else {
                $this->_aEstadoOper['message'] = 'No se pudo eliminar el producto.';   
            }
        }
        $this->_aEstadoOper['message'] = $this->messages->do_message(array('message' => $this->_aEstadoOper['message'], 'type' => ($this->_aEstadoOper['status'] > 0) ? 'success' : 'alert'));
        $this->listado();
    }
}

/* End of file personas.php */
/* Location: ./application/controllers/administrator/personas.php */