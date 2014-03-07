<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Lib_Ubicacion Class
 * 
 * Libreria de ubicacion de usuarios, complemento para determinar la ubicacion del usuario dentro de una estructura organizativa del sistema.
 *
 * @package		base
 * @subpackage	Libraries
 * @category	Autenticacion
 * @author		Marcelo Gutierrez
 * @link		
 */
class Lib_Ubicacion{
	protected $_vcMensajeError;
	public $_keysDesignacion = array('idDesignacion', 'estadoDesignacion', 'idEstructura', 'nombreEstructura');
	
	
	public function __construct()
	{
		$this->_vcMensajeError = '';
		$this->ci =& get_instance();
		$this->ci->load->library('Session');
		$this->ci->load->database();
		
		$this->ci->load->model($this->ci->db->dbdriver.'/lib_ubicacion/usuariosorganismos_model');
		$this->ci->load->model('sigep/cuadrocargosagentes_model', 'ubicaciones');
		$this->ci->load->model('sigep/designaciones_model', 'designaciones');
	}
	
	protected function _setSession($data, $keys=array('idOrganismo','nombreOrganismo')) {
		// este proceso inicializa luego de tener una sesion establecida previamente
		$session_id = $this->ci->session->userdata('session_id');
		if($session_id===FALSE) {
			return FALSE;
		}
		$dataUsr = array();
		foreach ($keys as $key) {
			$dataUsr[$key] = $data[$key];
		}
		// agregar a la sesion solo los datos del organismo, hasta el momento
		$this->ci->session->set_userdata('Lib_Ubi_Organismo',$dataUsr);	
	}
	public function _setSessionDesignacion($data, $keys=array()) {
		$session_id = $this->ci->session->userdata('session_id');
		if($session_id===FALSE) {
			return FALSE;
		}
		$dataUsr = array();
		foreach ($keys as $key) {
			$dataUsr[$key] = $data[$key];
		}
		// agregar a la sesion solo los datos del organismo, hasta el momento
		$this->ci->session->set_userdata('designacion', $dataUsr);
	}
	protected function _unsetSession($keys=array('inIdOrganismo','vcOrgDescripcion'))
	{
		$session_id = $this->ci->session->userdata('session_id');
		if($session_id!==FALSE)
		{
			return FALSE;
		}
		$dataUsr = array();
		foreach ($keys as $key) {
			$dataUsr[$key] = '';
		}
		$this->ci->session->set_userdata('Lib_Ubi_Organismo',$dataUsr);
	}
	
	public function mensajeError()
	{
		return $this->_vcMensajeError;
	}
	
	public function id()
	{
		$rg = $this->organismo();
		if(!$rg)
			return FALSE;
		return $rg['inIdOrganismo'];
	}
	
	public function descripcion()
	{
		$rg = $this->organismo();
		
		
		if(!$rg)
			return FALSE;
		return $rg['vcOrgDescripcion'];
	}
	
	public function organismo()
	{
		return $this->ci->session->userdata('Lib_Ubi_Organismo');
	}
	
	public function organismosDisponibles($inIdUsuario)
	{
		
		return $this->ci->usuariosorganismos_model->obtOrganismos($inIdUsuario);
	}

	public function organismosDisponiblesArray($inIdUsuario)
	{
		
		return $this->ci->usuariosorganismos_model->obtOrganismosArray($inIdUsuario);
	}
	
	public function caminoOrganismo() {
		return array(array('inIdOrganismo'=>'1',''));
	}
	
	public function ingresar($inIdOrganismo, $inIdUsuario)
	{
		if($this->organismo())
		{
			$this->salir();
		}
		$rs = $this->ci->usuariosorganismos_model->obtOrganismo($inIdOrganismo, $inIdUsuario);
		$boResult = (bool)(sizeof($rs)>0);
		if($boResult)
		{
			$this->_setSession($rs);
		}
		else 
		{
			$this->_vcMensajeError = 'El usuario carece de ubicaciones (dependencias) activas para ingresar.';	
		}
		return $boResult;
	}
	
	public function salir()
	{
		$this->ci->session->unset_userdata(array('Lib_Ubi_Organismo'=>''));
	}
}
?>