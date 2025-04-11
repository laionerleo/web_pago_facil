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
		$this->load->library('google');
		      
        //cargamos los modelos
	   $this->load->model(array('Msecurity'));
	
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Credentials: true ");
		header("Access-Control-Allow-Methods: OPTIONS, GET, POST");
    }


	public function index()
	{	
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$d['authURL'] =  $this->facebook->login_url();
		$d['loginURL'] = $this->google->loginURL();
		
		
	   if(isset($_SESSION['cliente'] ) ){
		$d = array();
		$this->Msecurity->url_and_lan($d);
		
		redirect($d['url']."pagorapido");
		
		}else{
			
			$this->load->view('auth/login', $d);	
		}
	
    }

	public function LoginAndroid()
	{	
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$d['authURL'] =  $this->facebook->login_url();
		$d['loginURL'] = $this->google->loginURL();
		
	   if(isset($_SESSION['cliente'] ) ){
		$d = array();
		$this->Msecurity->url_and_lan($d);
		
		redirect($d['url']."pagorapido");
		
		}else{
			$this->load->view('auth/loginandroid', $d);	
		}
		
	
    }

	
	public function login2()
	{	
		$d = array();
		$this->Msecurity->url_and_lan($d);
		//$d['authURL'] =  $this->facebook->login_url();
		//$d['loginURL'] = $this->google->loginURL();
		if(isset($_SESSION['cliente'] ) ){
			$d = array();
			$this->Msecurity->url_and_lan($d);
			
			redirect($d['url']."pagorapido");
			
			}else{
				//$this->load->view('auth/login2', $d);		
			}
		
	
    }

    //este es el metodo que ocupare para loguearse al inicio con el servicio de pago facil 
    public function loginusuario()
	{
		parse_str($this->input->post("datos"), $nuevodato);
		
		$usuario=  $nuevodato['usuario'];
		$contraseña=md5($nuevodato['contraseña']);
        
        $resultado=$this->servicios->loginpagofacil($usuario,$contraseña);

      
       if($resultado->error  == 0)
		{
			$data = get_object_vars($resultado->values);
           $_SESSION['user'] = $resultado;
           $this->session->set_userdata($data);
		   $taDatos=array('mensaje' => "Exito", 'tipo' => 1 , 'values' =>"datos" );	

		}
		if($resultado->error == 23)
		{
			$respuesta=11;
            //ho json_decode($respuesta);
			$taDatos=array('mensaje' => "usted no se encuentra registrado", 'tipo' => 2  );	
            //echo $respuesta;
		}
		if($resultado->error == 24)
			{
				$taDatos=array('mensaje' =>$resultado->message, 'tipo' => 3  );	
			}
		echo   trim(json_encode($taDatos));
	
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
		if($resultado->error == 24)
			{
				$respuesta=11;
				echo $resultado->message;
				
			}
		
	}

	 //este es el metodo que ocupare para loguearse como invitdo  al inicio con el servicio de pago facil 
	 public function logininvitado()
	 {
		 $usuario= "invitado";
		 $contraseña=md5("invitado");
		 
		 $resultado=$this->servicios->loginpagofacil($usuario,$contraseña);
		
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
			 echo $respuesta;
		 }
	 
	 }

	  //este es el metodo que ocupare para loguearse como invitdo  al inicio con el servicio de pago facil 
	  public function logininvitadov2()
	  {
		  $usuario= "invitado";
		  $contraseña=md5("invitado");
		  
		  $resultado=$this->servicios->loginpagofacil($usuario,$contraseña);
		 
		 if($resultado->error  == 0)
		  {
			 $data = get_object_vars($resultado->values);
			 $_SESSION['user'] = $resultado;
			 $this->session->set_userdata($data);
			 redirect($d['url']."pagorapido");
		  }
		  if($resultado->error == 23)
		  {
			  $respuesta=11;
			  echo $respuesta;
		  }
	  
	  }

	 public function cambiarcontraseñawhatsapp()
	 {
		 parse_str($this->input->post("datos"), $nuevodato);
		 $telefono	=$nuevodato['inpnumero3'];
		 $correo		=$nuevodato['inpcorreo3'];
		  
		 
		  $resultado=$this->servicios->CambiarContraseñaWhatsapp($correo	,$telefono);
		  echo json_encode($resultado) ;
		  return ;
	 
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


	public function obtenerpiningreso()
	{
		parse_str($this->input->post("datos"), $nuevodato);
		$telefono	=$nuevodato['inpnumero'];
		$correo		=$nuevodato['inpcorreo'];
		 
		
		 $resultado=$this->servicios->obtenerpiningreso($correo	,$telefono);
		 $laRespuesta = array();
		 if(isset($resultado->error ) && $resultado->error== 0  )
		 {
			$_SESSION['PinServidor'] = $resultado->values->Pin;
			$_SESSION['DatosCliente'] = $resultado->values->DatosUsuario;
			$laRespuesta["mensaje"]=$resultado->message ;
			$laRespuesta["estado"]=0;
			echo json_encode($laRespuesta) ;
		 }else{
			$laRespuesta["mensaje"]=$resultado->message  ;
			$laRespuesta["estado"]=1;
			echo json_encode($laRespuesta) ;
		 }
		 
		 return ;
	
	}

	public function verificarpin()
	{
		parse_str($this->input->post("datos"), $nuevodato);
		$numero	=$nuevodato['inpnumero'];
		$laRespuesta = array();
		if(is_null($_SESSION['PinServidor']))
		{
			$laRespuesta["mensaje"]="No existe pin " ;
			$laRespuesta["estado"]=1;
		}else{
			if($_SESSION['PinServidor'] == $numero )
			{
				$laRespuesta["mensaje"]="verificacion de pin exitoso " ;
				$laRespuesta["estado"]=0;
				$data = get_object_vars($_SESSION['DatosCliente'][0] );
				$_SESSION['user'] = $_SESSION['DatosCliente'][0];
				$this->session->set_userdata($data);
			}else{
				
				
				$laRespuesta["mensaje"]="Pin invalido  " ;
				$laRespuesta["estado"]=1;
			}
		}
		echo json_encode($laRespuesta) ;
		 return ;
	}


	/**/
}
