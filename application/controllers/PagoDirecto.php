<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PagoDirecto extends CI_Controller {

	public function __construct(){
		//header('Access-Control-Allow-Origin: *');
		//header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		date_default_timezone_set("America/La_Paz"); 
        parent::__construct();
        //cargamos la base de datos por defecto
      //  $this->load->database('default');
        
        //cargamos los agentes para los dispositivos
		$this->load->library('user_agent');
		$this->load->library('servicios');
		$this->load->library('facebook');

		//cargamos el helper url y el helper form
        $this->load->helper(array('url', 'language'));
        
        //cargamamos la libreria del lenguaje
        $this->lang->load('welcome');

        //cargamos los modelos
		$this->load->model(array('Msecurity'));
		
	
    }


	public function index()
	{	
		$d = array();
		$this->Msecurity->url_and_lan($d);

    // destroy session
		//$this->session->sess_destroy();
	/*	$d['datossession']=$this->session->userdata();
		echo "<pre>";
		print_r($d);
		echo "</pre>";
	*/
		$this->load->view('index', $d);
	
	}
    public function Pay($lan,$tcCommerceId= 0 ,$codigo_fijo = 0 )
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		try {
			//code...
			if(!@$this->session->userdata('cliente')){
				$resultado=$this->servicios->loginpagofacil("invitado",md5("invitado") );
				$data = get_object_vars($resultado->values);
				$_SESSION['user'] = $resultado;
				$this->session->set_userdata($data);
			}
			$loServicioBusquedaEmpresa=$this->servicios->getempresasbytoken($tcCommerceId,1);
			if($loServicioBusquedaEmpresa->error == 0 &&   !is_null($loServicioBusquedaEmpresa->values) )
			{
				$tnEmpresa=$loServicioBusquedaEmpresa->values[0]->Empresa;
				$loServicioBusquedaClientes=$this->servicios->getBusquedaClienteGeneral($tnEmpresa,$codigo_fijo,1);	 
				$tnIdentificarPestaña = rand(5, 100);
				$_SESSION[$tnIdentificarPestaña.'idempresa']=$tnEmpresa;
				$_SESSION[$tnIdentificarPestaña.'clientesbusqueda']=$loServicioBusquedaClientes->values;
				$d["tnIdentificarPestaña"]=$tnIdentificarPestaña;
				$d["tnEmpresa"]=$tnEmpresa;
				$d["tcUrlImagen"]=$loServicioBusquedaEmpresa->values[0]->UrlImagen;
				$d["tcNombreEmpresa"]=$loServicioBusquedaEmpresa->values[0]->Descripcion;
				$d["cliente"]=9;
		
				$this->load->view('pagodirecto/index', $d);
			}else{
				echo "la empresa no existe ";
				echo '<pre>'; 
				print_r($loServicioBusquedaEmpresa );
				echo '</pre>' ;
			}

		} catch (\Throwable $th) {
			//throw $th;
		}
	
		
		
       // $this->load->view('pagodirecto/index', $d);https://pagofacil.com.bo/online/es/pay/d4735e3a265e16eee03f59718b9b5d03019c07d8b6c51f90da3a666eec13ab35/21385

    }


	
	/**/
}