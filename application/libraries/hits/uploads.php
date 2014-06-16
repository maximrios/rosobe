<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Uploads {
	function __construct() {
		
	}
	public function do_upload($config_user) {
		$ci = &get_instance();
		$data = array();
    	$config['upload_path'] = $config_user['upload_path'];
        $config['allowed_types'] = $config_user['allowed_types'];
        $config['max_size'] = $config_user['max_size'];
        $ci->load->library('upload', $config);
        $ci->load->library('image_lib');
        $upload_files = $_FILES;
        for($i = 0; $i < $config_user['cantidad_imagenes']; $i++) {
//            $ci->load->library('upload', $config);
            $_FILES['userfile'] = array(
                'name' => $upload_files['userfile']['name'][$i],
                'type' => $upload_files['userfile']['type'][$i],
                'tmp_name' => $upload_files['userfile']['tmp_name'][$i],
                'error' => $upload_files['userfile']['error'][$i],
                'size' => $upload_files['userfile']['size'][$i]
            );
            if (!$ci->upload->do_upload()) {
                $error = array('error' => $ci->upload->display_errors());
                //$ci->_aEstadoOper['message'] = $error;
            } 
            else {
                $data[$i] = $ci->upload->data();
                if($config_user['create_thumb']) {
                    foreach ($config_user['thumbs'] as $thumb) {
                        $configa['create_thumb'] = $config_user['create_thumb'];
                        $configa['maintain_ratio'] = TRUE;
                        $configa['new_image'] = $config_user['upload_path'];
                        $configa['source_image'] = $config_user['upload_path'].$data[$i]['file_name'];
                        $configa['thumb_marker'] = $thumb['thumb_marker'];
                        $configa['width'] = $thumb['width'];
                        $configa['height'] = 1;
                        $configa['master_dim'] = 'width';
                        $ci->image_lib->initialize($configa);
                        if($ci->image_lib->resize()) {
                            $nombreThumbnail = $data[$i]['raw_name'].$thumb['thumb_marker'].$data[$i]['file_ext'];
                            $data[$i]['thumbnails'][] = array('nombreThumbnail' => $nombreThumbnail, 'pathThumbnail' => $config_user['upload_path'].$nombreThumbnail);
                        }
                        else {
                            //$data['thumbnails'][] = array_merge($this->errors, array($image->error->string));
                        }
                        $configa = array();
                        $ci->image_lib->clear();
                    }
                    $ci->image_lib->clear();
                }
            }
        }
        return $data;
	}
    public function delete_image($path) {
        if(unlink($path)) {
            $msg = 'Se ha eliminado la imagen correctamente';
        }
        else {
            $msg = 'No se ha podido eliminar la imagen';
        }
        return $msg;
    }
}
?>