<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HubPago extends CI_Controller {

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
		
		if(!@$this->session->userdata('cliente')){
            $d = array();
            $this->Msecurity->url_and_lan($d);
            redirect($d['url']."?m=Usted tiene que iniciar session !!!");
		}
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

	public function pago_rapido()
	{	
		$d = array();
		$this->Msecurity->url_and_lan($d);
		
		//echo "hola mundo ";
		$id_cliente=$this->session->userdata('cliente');
		$d['rubros']=$this->servicios->get_list_rubros($id_cliente);
		$d['region']=$this->servicios->get_list_regiones($id_cliente);
		$d['perfilfrecuente']=$_SESSION['PerfilFrecuente'];
 
	/*	$ip = '181.114.102.117'; // Esto contendrá la ip de la solicitud.
		// Puedes usar un método más sofisticado para recuperar el contenido de una página web con PHP usando una biblioteca o algo así
		// Vamos a recuperar los datos rápidamente con file_get_contents
		$dataArray = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
		
		var_dump($dataArray);
		
		echo "Hola visitante desde: ".$dataArray["geoplugin_countryName"];*/	
	$this->load->view('pago_rapido/index', $d);
	
	}
	public function CargarCriterios()
	{
        
		$d = array();
		$this->Msecurity->url_and_lan($d);
        $datos=$this->input->post("datos");
		$tnEmpresa = $datos['Empresa'];
		$loServicioGetCriterios=$this->servicios->getcriteriobusquedahub($tnEmpresa);
        if( !is_null($loServicioGetCriterios)  && $loServicioGetCriterios->error==0  && !is_null($loServicioGetCriterios->values)   )
        {
            $d['criterios']=$loServicioGetCriterios->values;
        }else{
            echo "ha ocurrido un error ";
        }

        
		
        $this->load->view('hubpago/listacriterios', $d);

	}
	public function filtro_empresas_by_tipo_region()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		$region_id=$datos['region_id'];
		$rubro_id=$datos['rubro_id'];
		$id_cliente=$this->session->userdata('cliente');
		$d['empresas']=$this->servicios->get_list_empresas_by_tipo_region($rubro_id,$region_id,$id_cliente);
		$_SESSION['todaslasempresas']=$d['empresas'];
		
		//		echo json_encode($empresas);
		/*echo "<pre>";
		print_r($d);
		echo "</pre>";*/
		$this->load->view('pago_rapido/lista_empresas', $d);
		


	}


	public function cargarloghub($Mensajeerror)
    {
      $logFile = fopen("loghub.txt", 'a') or die("Error creando archivo");
      fwrite($logFile, "\n".date("d/m/Y H:i:s").$Mensajeerror) or die("Error escribiendo en el archivo");
      fclose($logFile);
    }
	
	/**/
}