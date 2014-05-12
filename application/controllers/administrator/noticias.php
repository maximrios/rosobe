<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Maximiliano Ezequiel Rios
 * @version 1.0.0
 * @copyright 2014
 * @package Sabandijas Rodados
 */
class Noticias extends Ext_crud_controller {
    private $_aTemas = array();
    private $_rsRegs = array();
    function __construct() {
        parent::__construct();
        $this->load->model('hits/noticias_model', 'noticias');
        $this->load->library('gridview');
        $this->load->library('Messages');
        $this->load->library('hits/uploads', array(), 'uploads');
        $this->load->helper('utils_helper');
        $this->load->helper('ckeditor_helper');
        $this->capa = array(
            'id'    =>  'descripcionNoticia',
            'path'  =>  'assets/libraries/ckeditor',
            'config' => array(
                'toolbar'   =>  "Full",     //Using the Full toolbar
                'width'     =>  "100%",    //Setting a custom width
                'height'    =>  '300px',    //Setting a custom height
 
            ),
        );
        $this->_aReglas = array(
            array(
                'field' => 'idNoticia',
                'label' => 'Noticia',
                'rules' => 'trim|xss_clean'
            ),
            array(
                'field' => 'tituloNoticia',
                'label' => 'Título',
                'rules' => 'trim|required|min_length[5]|max_length[300]|xss_clean'
            ),
            array(
                'field' => 'epigrafeNoticia',
                'label' => 'Epígrafe',
                'rules' => 'trim|required|min_length[5]|max_length[100]|xss_clean'
            ),
            array(
                'field' => 'descripcionNoticia',
                'label' => 'Descripción',
                'rules' => 'trim|required|min_length[5]|max_length[5000]|xss_clean'
            ),
            array(
                'field' => 'inicioNoticia',
                'label' => 'Fecha de Inicio',
                'rules' => 'trim|xss_clean|required'
            ),
            array(
                'field' => 'vencimientoNoticia',
                'label' => 'Fecha de Vencimiento',
                'rules' => 'trim|xss_clean'
            ),
            array(
                'field' => 'userfile[]',
                'label' => 'Imagenes',
                'rules' => 'trim|xss_clean'
            ),
        );
    }

    public function index() {
        //
        $this->_vcContentPlaceHolder = $this->load->view('administrator/hits/noticias/principal', array(), true);
        //       
        parent::index();
    }

    protected function _inicReg($boIsPostBack=false) {
        $this->_reg = array(
            'idNoticia' => null
            , 'inicioNoticia' => null
            , 'vencimientoNoticia' => null
            , 'tituloNoticia' => ''
            , 'epigrafeNoticia' => ''
            , 'descripcionNoticia' => ''
            , 'idTipoNoticia' => null
            , 'publicadoNoticia' => null
            , 'thumbImagenNoticia' => null
        );
        $inId = ($this->input->post('idNoticia') !== false) ? $this->input->post('idNoticia') : 0;
        if ($inId != 0 && !$boIsPostBack) {
            $this->_reg = $this->noticias->obtenerUno($inId);
            $this->_reg['inicioNoticia'] = GetDateFromISO($this->_reg['inicioNoticia'], FALSE);
            $this->_reg['vencimientoNoticia'] = GetDateFromISO($this->_reg['vencimientoNoticia'], FALSE);
        } else {
            $this->_reg = array(
                'idNoticia' => $inId
                , 'inicioNoticia' => ($this->input->post('inicioNoticia') === FALSE) ? GetToday('d/m/Y') : set_value('inicioNoticia')
                , 'vencimientoNoticia' => ($this->input->post('vencimientoNoticia') === FALSE) ? GetToday('d/m/Y') : set_value('vencimientoNoticia')
                , 'idTipoNoticia' => $this->input->post('idTipoNoticia')
                , 'tituloNoticia' => set_value('tituloNoticia')
                , 'epigrafeNoticia' => set_value('epigrafeNoticia')
                , 'descripcionNoticia' => set_value('descripcionNoticia')
                , 'publicadoNoticia' => ((bool)(set_value('publicadoNoticia')))
                , 'thumbImagenNoticia' => null
            );
        }
        return $this->_reg;
    }
    protected function _inicReglas() {
        $val = $this->form_validation->set_rules($this->_aReglas);
    }
    public function listado($idNoticia = 0) {

        $vcBuscar = ($this->input->post('vcBuscar') === FALSE) ? '' : $this->input->post('vcBuscar');

        $this->gridview->initialize(
                array(
                    'sResponseUrl' => 'administrator/noticias/listado'
                    , 'iTotalRegs' => $this->noticias->numRegs($vcBuscar)
                    , 'iPerPage' => ($this->input->post('per_page')==FALSE)? 10: $this->input->post('per_page')
                    , 'bOrder' => FALSE
                    , 'sFootProperties' => 'class="paginador"'
                    , 'titulo' => 'Listado de Novedades'
                    , 'identificador' => 'idNoticia'
                )
        );

        

        $this->gridview->addColumn('idNoticia', '#', 'int');
        $this->gridview->addColumn('tituloNoticia', 'Titulo', 'text');
        $this->gridview->addColumn('epigrafeNoticia', 'Epígrafe', 'text');
        $this->gridview->addColumn('inicioNoticia', 'Inicio', 'date');
        $this->gridview->addColumn('estadoNoticia', 'Estado', 'text');
        $this->gridview->addParm('vcBuscar', $this->input->post('vcBuscar'));
        $editar = '<a href="administrator/noticias/formulario/{idNoticia}" title="Editar {tituloNoticia}" 
        class="btn-accion" rel="{\'idNoticia\': {idNoticia}}">&nbsp;<span class="glyphicon glyphicon-pencil"></span>&nbsp;</a>';
        $estado = '<a href="administrator/noticias/publicacion/{idNoticia}" title="Cambiar estado de {tituloNoticia}" 
        class="btn-accion" rel="{\'idNoticia\': {idNoticia}}">&nbsp;<span class="glyphicon glyphicon-refresh"></span>&nbsp;</a>';
        $controles = $editar.$estado;
        $this->gridview->addControl('inIdFaqCtrl', array('face' => $controles, 'class' => 'acciones'));
        $this->_rsRegs = $this->noticias->obtener($vcBuscar, $this->gridview->getLimit1(), $this->gridview->getLimit2());
        $this->load->view('administrator/hits/noticias/listado'
            , array(
                'vcGridView' => $this->gridview->doXHtml($this->_rsRegs)
                , 'vcMsjSrv' => $this->_aEstadoOper['message']
                , 'txtvcBuscar' => $vcBuscar
            )
        );
    }
    public function formulario() {
        $aData['ckeditor_texto'] = $this->capa;
        $aData['Reg'] = $this->_inicReg($this->input->post('vcForm'));
        $aData['vcFrmAction'] = 'administrator/noticias/guardar';
        $aData['vcMsjSrv'] = $this->_aEstadoOper['message'];
        $aData['vcAccion'] = ($this->_reg['idNoticia'] > 0) ? 'Modificar' : 'Agregar';
        $this->load->view('administrator/hits/noticias/formulario', $aData);
    }
    public function consulta() {
        $this->load->view('lib_autenticacion/frm-faq-borrar'
                , array(
            'Reg' => $this->_inicReg($this->input->post('vcForm'))
            , 'vcFrmAction' => 'autenticacion/faq/eliminar'
            , 'vcMsjSrv' => $this->_aEstadoOper['message']
            , 'vcAccion' => ($this->_reg['inIdFaq'] > 0) ? 'Eliminar' : ''
                )
        );
    }
    function ver($noticia) {
        $aData['noticia'] = $this->noticia->obtenerUno($noticia);
        if($aData['noticia']) {
            $this->_SiteInfo['title'] .= ' - '.$aData['noticia']['tituloNoticia'];
            $aData['comentarios'] = $this->noticia->obtenerComentarios($aData['noticia']['idNoticia']);
            $this->_vcContentPlaceHolder = $this->load->view('administrator/hits/noticias/ver', $aData, true);
            parent::index();
            //$this->load->view('administrator/hits/noticias/ver', $aData);
        }
        else {

        }
    }
    public function comentar() {
        $this->_aEstadoOper['status'] = $this->noticia->guardarComentario(
            array(
                $this->input->post('idComentario')
                , $this->input->post('idNoticia')
                , $this->input->post('textoNoticiaComentario')
                , $this->input->post('idPersona')
            )
        );
        $comentario = $this->noticia->obtenerComentario($this->_aEstadoOper['status']);
        $comentario['fechaNoticiaComentario'] = GetDateTimeFromISO($comentario['fechaNoticiaComentario']);
        echo json_encode($comentario);
        /*if ($this->_aEstadoOper['status'] > 0) {
            $this->_aEstadoOper['message'] = 'El registro fue guardado correctamente.';
        } else {
            $this->_aEstadoOper['message'] = $this->_obtenerMensajeErrorDB($this->_aEstadoOper['status']);
        }*/
    }
    public function guardar() {
        antibotCompararLlave($this->input->post('vcForm'));
        $this->_inicReglas();
        if ($this->_validarReglas()) {
            $this->_inicReg((bool) $this->input->post('vcForm'));
            $this->_aEstadoOper['status'] = $this->noticias->guardar(
                array(
                    $this->_reg['idNoticia']
                    , $this->_reg['tituloNoticia']
                    , $this->_reg['epigrafeNoticia']
                    , $this->_reg['descripcionNoticia']
                    , GetDateTimeFromFrenchToISO($this->_reg['inicioNoticia'])
                    , GetDateTimeFromFrenchToISO($this->_reg['vencimientoNoticia'])
                    , url_title(strtolower($this->_reg['tituloNoticia']))
                    , 1
                )
            );
            if ($this->_aEstadoOper['status'] > 0) {
                $this->_aEstadoOper['message'] = 'El registro fue guardado correctamente.';
                if($_FILES['userfile']['name'][0] != '') {
                    $config = array(
                        'cantidad_imagenes' => count($_FILES['userfile']['name'])
                        , 'upload_path' => 'assets/images/noticias/'
                        , 'allowed_types' => 'jpg'
                        , 'max_size' => 3000
                        , 'create_thumb' => true
                        , 'thumbs' => array(
                            array('thumb_marker' => '_thumb', 'width' => 300)
                            , array('thumb_marker' => '_detail', 'width' => 600)
                        )
                    );
                    $data = $this->uploads->do_upload($config);
                    $this->noticias->guardarImagen(
                        array(
                            ($this->_reg['idNoticia'] != '' && $this->_reg['idNoticia'] != 0)? $this->_reg['idNoticia'] : $this->_aEstadoOper['status']
                            , $data[0]['thumbnails'][0]['pathThumbnail']
                            , $data[0]['thumbnails'][1]['pathThumbnail']
                        )
                    );    
                }
                
            } else {
                $this->_aEstadoOper['message'] = $this->_obtenerMensajeErrorDB($this->_aEstadoOper['status']);
            }
        } 
        else {
            $this->_aEstadoOper['status'] = 0;
            $this->_aEstadoOper['message'] = validation_errors();
        }

        $this->_aEstadoOper['message'] = $this->messages->do_message(array('message' => $this->_aEstadoOper['message'], 'type' => ($this->_aEstadoOper['status'] > 0) ? 'success' : 'alert'));

        if ($this->_aEstadoOper['status'] > 0) {
            echo '<script>delete CKEDITOR.instances["descripcionNoticia"]</script>';
            $this->listado();
        } else {
            
            $this->formulario();
            
        }
    }

    public function publicacion($noticia) {
        $noticia = $this->noticias->obtenerUno($noticia);
        ($noticia['publicadoNoticia'] == 0)? $estado=1 : $estado=0;
        $this->_aEstadoOper['status'] = $this->noticias->cambiarEstado(
            array(
                $estado
                , $noticia['idNoticia']
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


    public function guardarTema() {

        antibotCompararLlave($this->input->post('vcForm'));

        $this->_inicReglasTema();

        if ($this->_validarReglas()) {
            $this->_inicRegTema((bool) $this->input->post('vcForm'));
            if ((bool)$this->_regTema['bActivo'] == true) {
                $bActivo = true;
            } else {
                $bActivo = false;
            }
            $this->_aEstadoOper['status'] = $this->_oModel->guardarTema(
                    array(
                        $this->_regTema['inIdTemaFaq']
                        , $this->_regTema['vcTemaFaq']
                        , $this->_regTema['vcTemaDesc']
                        , ($this->_regTema['inIdOrden'] > 0 ) ? $this->_regTema['inIdOrden'] : 99
                        , (bool)$bActivo
                    )
            );
            if ($this->_aEstadoOper['status'] > 0) {
                $this->_aEstadoOper['message'] = 'El registro fue guardado correctamente.';
            } else {
                $this->_aEstadoOper['message'] = $this->_obtenerMensajeErrorDB($this->_aEstadoOper['status']);
            }
        } else {
            $this->_aEstadoOper['status'] = 0;
            $this->_aEstadoOper['message'] = validation_errors();
        }

        $this->_aEstadoOper['message'] = $this->messages->do_message(array('message' => $this->_aEstadoOper['message'], 'type' => ($this->_aEstadoOper['status'] > 0) ? 'success' : 'alert'));

        if ($this->_aEstadoOper['status'] > 0) {
            $this->listadoTemas();
        } else {
            $this->formularioTema();
        }
    }

    //Guarda los cambios en el orden de los temas modificados y que son enviados viaAjax
    public function guardarTemasEditar() {
        //antibotCompararLlave($this->input->post('vcForm'));
        $aux = $this->input->post('cnct');
        if ($aux != '') {
            $aGrilla = explode("|", $aux);
            $tamGrilla = count($aGrilla);
            foreach ($aGrilla as $fila) {
                $aFila = explode(",", $fila);
                $aTema = $this->_oModel->obtUnTema($aFila[0]);
                $aParam = array(
                    'inIdTemaFaq' => $aTema['inIdTemaFaq']
                    , 'vcTemaFaq' => $aTema['vcTemaFaq']
                    , 'vcTemaDesc' => $aTema['vcTemaDesc']
                    , 'inIdOrden' => $aFila[1]
                    , 'bActivo' => (bool)$aFila[2]
                );
                $this->_aEstadoOper['status'] = $this->_oModel->guardarTema($aParam);
            }
            if ($this->_aEstadoOper['status'] > 0) {
                $this->_aEstadoOper['message'] = 'Los registros fueron actualizados correctamente.';
            } else {
                $this->_aEstadoOper['message'] = $this->_obtenerMensajeErrorDB($this->_aEstadoOper['status']);
            }

            $this->_aEstadoOper['message'] = $this->messages->do_message(array('message' => $this->_aEstadoOper['message'], 'type' => ($this->_aEstadoOper['status'] > 0) ? 'success' : 'alert'));
            //Mostramos la vista
            //$this->listadoTemas();
        } else {
            //Mostramos la vista
            $this->listadoTemasEditar();
        }
    }

//Elimina la pregunta seleccionada
    public function eliminar() {
        antibotCompararLlave($this->input->post('vcForm'));
        $this->_aEstadoOper['status'] = $this->_oModel->eliminar($this->input->post('inIdFaq'));
        if ($this->_aEstadoOper['status'] > 0) {
            $this->_aEstadoOper['message'] = 'El registro fue eliminado con &eacute;xito.';
        } else {
            $this->_aEstadoOper['message'] = $this->_obtenerMensajeErrorDB($this->_aEstadoOper['status']);
        }

        $this->_aEstadoOper['message'] = $this->messages->do_message(array('message' => $this->_aEstadoOper['message'], 'type' => ($this->_aEstadoOper['status'] > 0) ? 'success' : 'alert'));

        $this->listado();
    }

//Elimina el tema selecionado
    public function eliminarTema() {
        antibotCompararLlave($this->input->post('vcForm'));
        $this->_aEstadoOper['status'] = $this->_oModel->eliminarTema($this->input->post('inIdTemaFaq'));
        if ($this->_aEstadoOper['status'] > 0) {
            $this->_aEstadoOper['message'] = 'El registro fue eliminado con &eacute;xito.';
        } else {
            $this->_aEstadoOper['message'] = $this->_obtenerMensajeErrorDB($this->_aEstadoOper['status']);
        }

        $this->_aEstadoOper['message'] = $this->messages->do_message(array('message' => $this->_aEstadoOper['message'], 'type' => ($this->_aEstadoOper['status'] > 0) ? 'success' : 'alert'));

        $this->listadoTemas();
    }

//Funcion que carga la lista de preguntas en el inicio del sistema
    public function verPorLecturas($cantMostrar = 5) {
            $aFaq = ($cantMostrar <= 5) ? $this->_oModel->obtenerPorLecturas(0, $cantMostrar) : $this->_oModel->obtenerPorLecturas();
            $this->_vcContentPlaceHolder = $this->load->view('lib_autenticacion/ver-faq-por-lecturas', array(
                'aFaq' => $aFaq
                , 'esViaAjax' => $cantMostrar > 5
                , 'cantMostrar' => $cantMostrar
                    ));
    }
        
        public function verPorTemas () {
            $this->_aTemas = $this->_oModel->obtTemas();
            $aFaq = $this->_oModel->obtener('');
            $this->_vcContentPlaceHolder = $this->load->view('lib_autenticacion/ver-faq-por-temas', array(
                'aFaq' => $aFaq
                , 'aTemas' => $this->_aTemas
                    ));
        }

    //Cada vez que se lee una pregunta se le suma 1 a la cantidad de veces que fue leida. No se le muestra nada al usuario.
    public function sumarLectura($id=0) {
        if ($id != 0 ) {
            $this->_oModel->sumarLectura($id);
        }
    }

    //Reiniciar el contador de lecturas de la pregunta seleccionada. Solo desde el panel para administradores
    public function reiniciarLecturas($id = 0) {
        if ($id != 0 && $id != null) {
        $this->_aEstadoOper['status'] = $this->_oModel->reiniciarLecturas($id);

        if ($this->_aEstadoOper['status'] > 0) {
            $this->_aEstadoOper['message'] = 'Los registros fueron actualizados correctamente.';
        } else {
            $this->_aEstadoOper['message'] = $this->_obtenerMensajeErrorDB($this->_aEstadoOper['status']);
        }
        $this->_aEstadoOper['message'] = $this->messages->do_message(array('message' => $this->_aEstadoOper['message'], 'type' => ($this->_aEstadoOper['status'] > 0) ? 'success' : 'alert'));
        $this->listado();
        } else {
            $this->listado();
        }
    }

}

?>