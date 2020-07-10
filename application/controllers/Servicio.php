<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicio extends CI_Controller {

	public function __construct(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        
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

		$this->load->view('index', $d);
	
	}

	public function pago_rapido()
	{	
		$d = array();
		$this->Msecurity->url_and_lan($d);

		$this->load->view('pago_rapido/index', $d);
	
	}

	public function recuperarqr($lan,$transaccion)
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$tnCliente= 3859;  //$_SESSION['cliente'];
		$tcNroPago = $transaccion;
		$metodos=$this->servicios->recuperarqr($tnCliente ,$tcNroPago);
		$valor= $metodos->values;
		if(isset($valor))
		{
			$d['imagenqr']=$metodos->values;
			$d['transaccion']=$transaccion;
		
			$this->load->view('vistaqr', $d);
	   
		}else{
			$d['error']=1;
			
			$this->load->view('vistaqr', $d);
			
		}
		

		/*
		$tnCliente= 3859;  //$_SESSION['cliente'];
		$tcNroPago = $numerotransaccion;
		$metodos=$this->servicios->recuperarqr($tnCliente ,$tcNroPago);
		$mensajeerror=$metodos->error ;
		$valor= $metodos->values;
		if(isset($valor))
		{
		header('Content-Disposition: attachment;filename="CodigoQr'.$numerotransaccion.'.png"');
	   header('Content-Type: application/force-download'); 
	   echo base64_decode($valor);
		}else{
			echo "ocurrio un error o no existe la transaccion";
		}
		*/
	
	}

	public function DescargarQr($lan,$numerotransaccion)
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$tnCliente= 3859;  //$_SESSION['cliente'];
		$tcNroPago = $numerotransaccion;
		$metodos=$this->servicios->recuperarqr($tnCliente ,$tcNroPago);
		$mensajeerror=$metodos->error ;
		$valor= $metodos->values;
		if(isset($valor))
		{
		header('Content-Disposition: attachment;filename="PagoFacilBolivia-'.$numerotransaccion.'.png"');
	   header('Content-Type: application/force-download'); 
	   echo base64_decode($valor);
		}else{
		echo "ocurrio un error o no existe la transaccion";
		}
	}
	public function revisarsession()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$d['ultima']=$this->servicios->getultimatransaccion(3859);
		echo "<pre>";
		print_r($d);
		echo "</pre>";
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