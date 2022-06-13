<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PuntosCobranza extends CI_Controller {

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
    //    $this->load->helper(array('url', 'language'));
        
        //cargamamos la libreria del lenguaje
        $this->lang->load('welcome');

        //cargamos los modelos
		$this->load->model(array('Msecurity'));
		
		$this->cargarlogsession("SESSIONNAME".$_COOKIE[session_name ()]);
		//$_COOKIE[session_name ()];

		  if(!@$this->session->userdata('cliente')){
            $d = array();
            $this->Msecurity->url_and_lan($d);
            redirect($d['url']."?m=Usted tiene que iniciar session !!!");
		}
		
		
		
    }
    public function cargarlogsession($Mensajeerror)
    {
      $logFile = fopen("logsession.txt", 'a') or die("Error creando archivo");
      fwrite($logFile, "\n".date("d/m/Y H:i:s").$Mensajeerror) or die("Error escribiendo en el archivo");
      fclose($logFile);
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
            echo "La empresa no cuenta con  criterios de busquedas";
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
	public function puntocobranza()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$taListadoVisita = $this->servicios->ListadoVisita();
		$loPuntosCobranza = $this->servicios->ListadoPuntoCobranza();
		$d["visitas"]=$taListadoVisita->values;
		$d["puntocobranza"]=$loPuntosCobranza->values;
		$this->load->view('registropuntoscobranza/index', $d);		
	}
	public function NuevoPuntoCobranza()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$tapuntos = $this->servicios->MostrarPuntos();
		$taclientepuntocobranza = $this->servicios->MostrarClientePuntoCobranza();
		$taCliente = $this->servicios->MostrarCliente(1,2,3);
		$taclientebilletera = $this->servicios->MostrarClienteBilletera();
		$taagente = $this->servicios->MostrarAgente();

		$d["puntos"]=$tapuntos->values;
		$d["clientepuntocobranza"]=$taclientepuntocobranza->values;
		$d["clientebilletera"]=$taclientebilletera->values;
		$d["cliente"]=$taCliente->values;
		$d["agente"]=$taagente->values;
		$id_cliente=$this->session->userdata('cliente');
		$ubicaciones=$this->servicios->getubicaciones($id_cliente);

		$d["ubicaciones"]=json_encode($ubicaciones->values);
		$this->load->view('registropuntoscobranza/nuevopuntocobranza', $d);		
	}
	public function MostrarCliente()
    {
        $d = array();
		$this->Msecurity->url_and_lan($d);
		$taCliente = $this->servicios->MostrarCliente($this->input->post('cliente'), $this->input->post('apellido'), $this->input->post('telefono'));
        echo '<pre>';
        print_r($taCliente);
        echo '</pre>';
		echo json_encode($taCliente->values);
    }
	public function InsertarPuntoCobranza()
	{  
		$d = array();
		$this->Msecurity->url_and_lan($d);
		
		$cliente = $this->input->post('cliente');		
		$latitud = $this->input->post('latitud');		
		$longitud = $this->input->post('longitud');
		$direccion = $this->input->post('direccion');
		$estado = 1;		
		$horarioLunVieTurno1 = $this->input->post('horarioLunVieTurno1');		
		$horarioLunVieTurno2 = $this->input->post('horarioLunVieTurno2');
		$horaSabado = $this->input->post('horaSabado');
		$horaDomingo = $this->input->post('horaDomingo');
		$NombreEstablecimiento = $this->input->post('NombreEstablecimiento');
		$NombrePropietario = $this->input->post('nombrePropietario');
		$nroTelefonoProp = $this->input->post('nroTelefonoProp');		
		$horarioProp = $this->input->post('horarioProp');
		$personaQueAtendio = $this->input->post('personaQueAtendio');
		$nroTelefonoPersonaAtendio = $this->input->post('nroTelefonoPersonaAtendio');
		$seEntregoBanner = $this->input->post('txtbanner');
		if($seEntregoBanner == ""){$seEntregoBanner = 0;}
		$aceptoSerPunto = $this->input->post('txtpunto');
		if($aceptoSerPunto == ""){$aceptoSerPunto = 0;}

		$taInsertarVisita = $this->servicios->InsertarPuntoCobranza($cliente, $latitud, $longitud, $direccion, $estado, $horarioLunVieTurno1, $horarioLunVieTurno2, $horaSabado, $horaDomingo, $NombreEstablecimiento, $NombrePropietario, $nroTelefonoProp, $horarioProp, $personaQueAtendio, $nroTelefonoPersonaAtendio, $seEntregoBanner, $aceptoSerPunto);
		echo json_encode($taInsertarVisita);
		//$this->load->view('registropuntocobranza/index', $d);		
	}
	public function DetallePuntoCobranza()
	{
		
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$cliente = $this->input->post('IdCliente');
		$toDetallePuntoCobranza = $this->servicios->ValidarDetallesPuntoCobranza($cliente);
		
		echo json_encode($toDetallePuntoCobranza->values);
	}
	public function validarpuntocobranza()
	{
		
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$cliente = $this->input->post('Cliente');
		$telefonoPro = $this->input->post('TelefonoPro');
		$NombreComercial = $this->input->post('NombreComercial');
		$lcLatitud = $this->input->post('Latitud');
		$lcLongitud = $this->input->post('Longitud');
		$lcNombreAtendio = $this->input->post('NombreAtendio');
		$lnTelefonoAte = $this->input->post('TelefonoAte');
		$loListadoPuntoCobranza = $this->servicios->ValidarPuntoCobranza($cliente, $telefonoPro, 
		                                                                 $NombreComercial, $lcLatitud, 
		                                                                 $lcLongitud, $lcNombreAtendio,
		                                                                 $lnTelefonoAte);   
	
		echo json_encode($loListadoPuntoCobranza->values);		
	}
	public function EditarPuntoCobranza()
	{  
		$d = array();
		$this->Msecurity->url_and_lan($d);
		
		$direccion = $this->input->post('Direccion');
		$estado = $this->input->post('Estado');		
		$horarioLunVieTurno1 = $this->input->post('HoraLunVi');		
		$horarioLunVieTurno2 = $this->input->post('HoraLunVi2');
		$horaSabado = $this->input->post('HoraSabado');
		$horaDomingo = $this->input->post('HoraDomingo');
		$NombreEstablecimiento = $this->input->post('NombreEstablecimiento');
		$NombrePropietario = $this->input->post('NombrePropietario');
		$nroTelefonoProp = $this->input->post('TelefonoPro');		
		$horarioProp = $this->input->post('HoraPro');
		$personaQueAtendio = $this->input->post('PersonaAtendio');
		$nroTelefonoPersonaAtendio = $this->input->post('TelefonoAten');
		
		$seEntregoBanner = $this->input->post('Banner');
		if($seEntregoBanner == ""){$seEntregoBanner = 0;}
		$aceptoSerPunto = $this->input->post('AceptoSerPunto');
		if($aceptoSerPunto == ""){$aceptoSerPunto = 0;}

		$taEditarPuntoCobranza = $this->servicios->EditarPuntoCobranza($direccion, $estado, $horarioLunVieTurno1, $horarioLunVieTurno2, $horaSabado, $horaDomingo, $NombreEstablecimiento, $NombrePropietario, $nroTelefonoProp, $horarioProp, $personaQueAtendio, $nroTelefonoPersonaAtendio, $seEntregoBanner, $aceptoSerPunto);
		echo json_encode($taEditarPuntoCobranza);
		//$this->load->view('registropuntocobranza/index', $d);		
	}
	/**/
}