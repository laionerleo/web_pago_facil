<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Security extends CI_Controller {
	public function __construct(){
        
        parent::__construct();
 
        //cargamos la base de datos por defecto
        $this->load->database('default');
        
        //cargamos los agentes para los dispositivos
        $this->load->library('user_agent');
		//cargamos el helper url y el helper form
        $this->load->helper(array('url', 'language'));
        
        //cargamamos la libreria del lenguaje
        $this->lang->load('welcome');
        //cargamos los modelos
        $this->load->model(array('Msecurity'));
    }
	/**/
	public function index(){
		
		$post = $this->input->post();
		$d = array();
      	$this->Msecurity->url_and_lan($d);
		
		if($this->Msecurity->is_url()){
			$usuario = $this->Msecurity->getUser($post);
			if(@$usuario->usu_name){
				//session_start(); porque CI ya inicia por defecto
				$_SESSION['user'] = $usuario;
				//print_r($_SESSION); exit;
				//$this->Msecurity->updateDate(@$usuario->usu_id);
				redirect($d['url']."produccion");
			}
			else{
				redirect($d['url']."?m=Usuario o Password incorrectos");
			}
		}
		else
			redirect($d['url']."?m=Ha ocurrido un error ! vuelva a intentarlo");
	}
	/**/
	public function exit(){
		
		$_SESSION = array();
		session_destroy();
		redirect($d['url']);
	}
	/**/
}