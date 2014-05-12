<?php
class Upload extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Loader
        $this->load->helper('url');
        $this->load->config('application');
    }
    public function index() {
        $this->load->view('index');
    }
    public function do_upload() {
        echo "si llega ";
        die();
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
 
    private function resizePhoto($name)
    {
        # Load library
        $this->load->library('image_lib');
 
        // Achicamos a 1024x768
        $config['image_library']        = 'gd2';
        $config['source_image']     = $this->config->item('upload_path') . $name;
        $config['new_image']        = $this->config->item('upload_path') . '1024x768/' . $name;
        $config['maintain_ratio']       = TRUE;
        $config['width']            = 1024;
        $config['height']           = 768;
 
        $this->image_lib->initialize($config);
        if ( ! $this->image_lib->resize()){
            $error = TRUE;
        }
         
        /*
 
        // Le ponemos watermark, tenemos que utilizar otra configuracion, puesto que vamos a trabajar
        // con el thumbnail y vamos a ponerle watermark
        $config2['image_library']       = 'gd2';
        $config2['source_image']        = $this->config->item('upload_path') . '1024x768/' . $name;
        $config2['wm_type']         = 'overlay';
        $config2['wm_overlay_path']     = $this->config->item('watermark');
        $config2['wm_vrt_alignment']        = 'middle';
        $config2['wm_hor_alignment']    = 'center';
 
        # Watermark
        $this->image_lib->initialize($config2);
        if ( ! $this->image_lib->watermark()){
            $error = TRUE;
        }
         
        */
 
        // Achicamos a 800x600
        $config['source_image']     = $this->config->item('upload_path') . '1024x768/' . $name;
        $config['new_image']        = $this->config->item('upload_path') . '800x600/' . $name;
        $config['width']            = 800;
        $config['height']           = 600;
 
        $this->image_lib->initialize($config);
        if ( ! $this->image_lib->resize()){
            $error = TRUE;
        }
 
        // Achicamos a 400x300
        $config['source_image']     = $this->config->item('upload_path') . '1024x768/' . $name;
        $config['new_image']        = $this->config->item('upload_path') . '400x300/' . $name;
        $config['width']            = 400;
        $config['height']           = 300;
 
        $this->image_lib->initialize($config);
        if ( ! $this->image_lib->resize()){
            $error = TRUE;
        }
 
        # Error ?
        if (isset($error) and $error === TRUE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
 
    private function deletePhoto($id, $image)
    {
        # Delete from the DB
        if ($id !== NULL) {
            $this->photos_model->delete($id);
        }
 
        if ($image !== NULL) {
            # Borramos todas las imagenes (si existen). Evitamos warnings con el @ adelante
            @unlink($this->config->item("upload_path") . $image);
            @unlink($this->config->item('upload_path') . '1024x768/' . $image);
            @unlink($this->config->item('upload_path') . '800x600/' . $image);
            @unlink($this->config->item('upload_path') . '400x300/' . $image);
        }
    }
 
}