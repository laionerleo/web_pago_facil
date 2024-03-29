<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
        
        parent::__construct();
 
        
		$this->load->library('user_agent');
		$this->load->library('servicios');

		//cargamos el helper url y el helper form
        $this->load->helper(array('url', 'language'));
        
        //cargamamos la libreria del lenguaje
        $this->lang->load('welcome');
    // Load facebook library
	$this->load->library('facebook');
	//$this->load->library('google');
		      
        //cargamos los modelos
	   $this->load->model(array('Msecurity'));
	/*
	   if(isset($_SESSION['cliente'] ) ){
		$d = array();
		$this->Msecurity->url_and_lan($d);
		redirect($d['url']."pagorapido");
		}
		*/
		
	

    }


	public function index()
	{	
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$d['authURL'] =  $this->facebook->login_url();
		//$d['loginURL'] = $this->google->loginURL();
		
	   if(isset($_SESSION['cliente'] ) ){
		$d = array();
		$this->Msecurity->url_and_lan($d);
		
		redirect($d['url']."pagorapido");
		
		}else{
			$this->load->view('auth/login', $d);	
		}
		
		
	
    }

	
	public function login2()
	{	
		$d = array();
		$this->Msecurity->url_and_lan($d);
		//$d['authURL'] =  $this->facebook->login_url();
		//$d['loginURL'] = $this->google->loginURL();
		$this->load->view('auth/login2', $d);	
	
    }

    //este es el metodo que ocupare para loguearse al inicio con el servicio de pago facil 
    public function loginusuario()
	{
		parse_str($this->input->post("datos"), $nuevodato);
		
		$usuario=  $nuevodato['usuario'];
		$contraseña=md5($nuevodato['contraseña']);
        
        $resultado=$this->servicios->loginpagofacil($usuario,$contraseña);
        
     //  /print_r($data);
	 
      
       if($resultado->error  == 0)
		{
			$data = get_object_vars($resultado->values);
           $_SESSION['user'] = $resultado;
           $this->session->set_userdata($data);
      
			$respuesta=0;
			echo $respuesta;
		}
		if($resultado->error == 23)
		{
			$respuesta=11;
            //ho json_decode($respuesta);
            echo $respuesta;
		}
	
	}
	public function loginregistro()
	{
		parse_str($this->input->post("datos"), $nuevodato);
		$nombre=$nuevodato['inpnombre'];
		$apellido=$nuevodato['inpapellido'];
		
		$numero=$nuevodato['inpnumero'];
		
		$correo=$nuevodato['inpcorreo'];
		
		$login=  $nuevodato['usuario'];
		$contraseña=md5($nuevodato['contraseña']);
	
		

		$resultado=$this->servicios->registropagofacil($nombre,$apellido,$correo,$numero,$login,$contraseña);
        
      //*/ print_r($data);
      
	   
	   if($resultado->error  == 0)
		{
			$data = get_object_vars($resultado->values);
           $_SESSION['user'] = $resultado;
           $this->session->set_userdata($data);
      
			$respuesta=0;
			echo $respuesta;
		}
		if($resultado->error == 23)
		{
			$respuesta=11;
            //ho json_decode($respuesta);
            echo $respuesta;
		}
		
	}

    public function  logout()
	{
		
            $_SESSION = array();
            $this->session->sess_destroy();
			session_destroy();
			redirect(base_url().'es/');
		
		/**/
	}


	public function error404($lan='es')
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$this->load->view('error404', $d);
	
	}

	/**/

	public function error($lan='es')
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$this->load->view('error403', $d);
	
	}

	/**/

	public function error403($lan='es')
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$this->load->view('error403', $d);
	
	}

	/**/
}