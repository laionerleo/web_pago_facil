<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios extends CI_Controller {

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

    public function get_metodo_pago2($lan,$id_empresa,$id_cliente)
	{	$url = 'http://serviciopagofacil.syscoop.com.bo/api/Empresa/listarMetodosPagoPorEmpresa2';
		$data = array('tnEmpresa' => $id_empresa , 'tnIdAccion' => '18'  ,'tnCliente' => $id_cliente );
	 
		$header = array(
			"Content-Type: application/x-www-form-urlencoded",
			"Content-Length: ".strlen( http_build_query($data))
			);
			
		// use key 'http' even if you send the request to https://...
		$options = array('http' => array(
			'method'  => 'POST',
			'header' => implode("\r\n", $header),
			'content' => http_build_query($data) 
		)
						);
	
	
	
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		  $resultado =json_decode($result);
		  echo "<pre>";
		  print_r( $resultado);
		  echo "</pre>";
		//return $resultado;


    }
    

    public function get_filtro_list_empresas()
    {

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