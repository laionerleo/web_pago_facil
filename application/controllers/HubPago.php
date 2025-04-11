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

	public function facturaspendientesmultiples()
	{
		$datos=$this->input->post("datos");
		$lnEmpresa=$datos["empresa_id"];
		$lnCodigoFijo=$datos["codigo"];
		$lnPosicion=$datos["codigo"];
		$lcUrlIconoImagen=$datos["urlimagen"];
		$lnCliente=$this->session->userdata('cliente');
		$tnIdentificarPestaña=$datos[0];
		$_SESSION[$tnIdentificarPestaña.'gnPosicion']=$lnPosicion;
		try {
			// aqui estoy regstrando los datos del cliente 
			//$_SESSION[$tnIdentificarPestaña.'codigofijo']= $_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->codigoClienteEmpresa;//;/ $d['clientes']->values[0]->codigoClienteEmpresa;
			// 16-12-2023 
			// agregando el codigo de sistema a la cadena
			if(isset($_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->Sistema))
			{
				$_SESSION[$tnIdentificarPestaña.'codigofijo']= $_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->codigoClienteEmpresa.$_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->CodigoSistema;//;/ $d['clientes']->values[0]->codigoClienteEmpresa;
			}else{
				$_SESSION[$tnIdentificarPestaña.'codigofijo']= $_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->codigoClienteEmpresa;//;/ $d['clientes']->values[0]->codigoClienteEmpresa;
			}
			
			$_SESSION[$tnIdentificarPestaña.'codigoubicacion']=$_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->codidgoUbicacion; // $d['clientes']->values[0]->codidgoUbicacion;
			$_SESSION[$tnIdentificarPestaña.'nombreclienteempresa'] =$_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->nombre;  // $d['clientes']->values[0]->nombre;
			$_SESSION[$tnIdentificarPestaña.'cionitclienteempresa'] =$_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->Nit;// $d['clientes']->values[0]->Nit;

			$lnCodigoFijo=$_SESSION[$tnIdentificarPestaña.'codigofijo'];
			/*
			// esta verificarion para saber sies un hub de pagos o no para asi listar las facturas pendientes 
			if(isset($_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->loObjeto1))
			{
				$_SESSION[$tnIdentificarPestaña.'IdOperativo'] =$_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->IdOperativo;
				$_SESSION[$tnIdentificarPestaña.'FechaOperativa'] =$_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->FechaOperativa;
				$_SESSION[$tnIdentificarPestaña.'NroOperacion'] =$_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->NroOperacion;		
				$_SESSION[$tnIdentificarPestaña.'Servicio'] =$_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->Servicio;
				$IdOperativo= $_SESSION[$tnIdentificarPestaña.'IdOperativo'] ;
				$FechaOperativa = $_SESSION[$tnIdentificarPestaña.'FechaOperativa'] ;
				$NroOperacion=	$_SESSION[$tnIdentificarPestaña.'NroOperacion'] ;
				$Servicio=$_SESSION[$tnIdentificarPestaña.'Servicio'] ;
				$laServicioListarFacturas=$this->servicios->get_listar_facturashub($lnEmpresa,$lnCodigoFijo,$lnCliente ,$IdOperativo , $FechaOperativa , $NroOperacion , $Servicio);
				
			}else{
				// listado de facturas 
				$laServicioListarFacturas=$this->servicios->get_listar_facturas($lnEmpresa,$lnCodigoFijo,$lnCliente);
			}
			
			if(!is_null(@$laServicioListarFacturas->values)  ){
				$d['facturas']=$laServicioListarFacturas->values;
				$d['cantidadfacturas']=count($laServicioListarFacturas->values);
				if(isset($_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->loObjeto1))
				{	
					$d['periodomes']=$laServicioListarFacturas->values[0]->periodo;
					$lnFactura=$_SESSION[$tnIdentificarPestaña.'IdOperativo'] ;
					$_SESSION[$tnIdentificarPestaña.'nrofactura']=$lnFactura;
					$_SESSION[$tnIdentificarPestaña.'periodomes']=$laServicioListarFacturas->values[0]->periodo;
				
				}else{
					$_SESSION[$tnIdentificarPestaña.'nrofactura']=$laServicioListarFacturas->values[0]->factura; //$lnFactura;
					$_SESSION[$tnIdentificarPestaña.'periodomes']=$laServicioListarFacturas->values[0]->periodo;
				


					for ($i=0; $i < count($laServicioListarFacturas->values); $i++) { 
						$laServicioListarFacturas->values[$i]->periodoaux=$laServicioListarFacturas->values[$i]->periodo;
						$laServicioListarFacturas->values[$i]->periodo =$this->get_periodo($laServicioListarFacturas->values[$i]->periodo);	
					}
				}
				$_SESSION[$tnIdentificarPestaña.'listadofacturaspendientes']=$laServicioListarFacturas->values;
			}else{
				$d['facturas']= array();
				$d['cantidadfacturas']=0;
				
			}
			*/
			$d["empresa_id"]= $datos["empresa_id"];
			$d["codigofijo"]=$lnCodigoFijo;
			$d['urlimagenempresa']=$lcUrlIconoImagen;
			$d['nombreempresa']=$datos["nombreempresa"];
			$d['idempresa']=$lnEmpresa;
			$_SESSION[$tnIdentificarPestaña.'idempresa']=$lnEmpresa;
			$_SESSION[$tnIdentificarPestaña.'nombreempresa']=$datos["nombreempresa"];
			$_SESSION[$tnIdentificarPestaña.'urlimagenempresa']=$d['urlimagenempresa'];
			
			$laServicioMetodoPagoEmpresa=$this->servicios->get_metodos_pago_empresa($lnCliente ,$lnEmpresa);
			$d['metodospago']=$laServicioMetodoPagoEmpresa->values->aMetodosDePago;
			$_SESSION['todosmetodosdepago']=$laServicioMetodoPagoEmpresa->values->aMetodosDePago;
			$laServicioMetodosbyGrupo=$this->servicios->getmetodosbygrupos($lnEmpresa ,0  );
			$d['metodospagogrupos']=$laServicioMetodosbyGrupo->values;
			$_SESSION[$tnIdentificarPestaña.'metodospagogrupos']=$laServicioMetodosbyGrupo->values;	
			
			$laServicioultimoPago=$this->servicios->getultimatransaccioncliente($lnCliente);
			$d["lnUltimoMetodPago"]=@$laServicioultimoPago->values->MetodoPago;
			
			

			$this->load->view('multiple/paso1', $d);
		

		} catch (\Throwable $th) {
			//throw $th;
		}
		
		
	}
	public function listadofacturaspendientes()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		$lnEmpresa=$datos["tnEmpresa"];
	
		$lnMetodoPago=$datos["tnMetodoPago"];
		$lnCliente=$this->session->userdata('cliente');
		$tnIdentificarPestaña=$datos[0];
		$lnPosicion=$_SESSION[$tnIdentificarPestaña.'gnPosicion'];
		try {
			$lnCodigoFijo=$_SESSION[$tnIdentificarPestaña.'codigofijo'];
			$d['lcCodigoClienteEmpresa']= $lnCodigoFijo ;
			if(isset($_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->loObjeto1))
			{
				$_SESSION[$tnIdentificarPestaña.'IdOperativo'] =$_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->IdOperativo;
				$_SESSION[$tnIdentificarPestaña.'FechaOperativa'] =$_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->FechaOperativa;
				$_SESSION[$tnIdentificarPestaña.'NroOperacion'] =$_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->NroOperacion;		
				$_SESSION[$tnIdentificarPestaña.'Servicio'] =$_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->Servicio;
				$IdOperativo= $_SESSION[$tnIdentificarPestaña.'IdOperativo'] ;
				$FechaOperativa = $_SESSION[$tnIdentificarPestaña.'FechaOperativa'] ;
				$NroOperacion=	$_SESSION[$tnIdentificarPestaña.'NroOperacion'] ;
				$Servicio=$_SESSION[$tnIdentificarPestaña.'Servicio'] ;
				$laServicioListarFacturas=$this->servicios->get_listar_facturashub($lnEmpresa,$lnCodigoFijo,$lnCliente ,$IdOperativo , $FechaOperativa , $NroOperacion , $Servicio  , $lnMetodoPago);
				$this->cargarloghub("get_listar_facturashub-".json_encode($laServicioListarFacturas));
			}else{
				// listado de facturas 
				$laServicioListarFacturas=$this->servicios->get_listar_facturas2($lnEmpresa,$lnCodigoFijo,$lnCliente, $lnMetodoPago);
				$this->cargarloghub("get_listar_facturas pendientes -".json_encode($laServicioListarFacturas));
			}

			if(!is_null(@$laServicioListarFacturas->values)  ){
				$d['facturas']=$laServicioListarFacturas->values;
				$d['cantidadfacturas']=count($laServicioListarFacturas->values);
				if(isset($_SESSION[$tnIdentificarPestaña.'clientesbusqueda'][$lnPosicion]->loObjeto1))
				{	
					$d['periodomes']=$laServicioListarFacturas->values[0]->periodo;
					if(isset($_SESSION[$tnIdentificarPestaña.'gestion'])  && !is_null($_SESSION[$tnIdentificarPestaña.'gestion']) )
					{
						$d['periodomes']=$_SESSION[$tnIdentificarPestaña.'gestion'] ; 
					}
					
					$lnFactura=$_SESSION[$tnIdentificarPestaña.'NroOperacion'] ;
					$_SESSION[$tnIdentificarPestaña.'nrofactura']=$lnFactura;
					$_SESSION[$tnIdentificarPestaña.'periodomes']=$d['periodomes'];
				
				}else{
					$_SESSION[$tnIdentificarPestaña.'nrofactura']=$laServicioListarFacturas->values[0]->factura; //$lnFactura;
					$_SESSION[$tnIdentificarPestaña.'periodomes']=$laServicioListarFacturas->values[0]->periodo;
					for ($i=0; $i < count($laServicioListarFacturas->values); $i++) { 
						$laServicioListarFacturas->values[$i]->periodoaux=$laServicioListarFacturas->values[$i]->periodo;
						$laServicioListarFacturas->values[$i]->periodo =$this->get_periodo($laServicioListarFacturas->values[$i]->periodo);	
					}
				}
				$_SESSION[$tnIdentificarPestaña.'listadofacturaspendientes']=$laServicioListarFacturas->values;
			}else{
				$d['facturas']= array();
				$d['cantidadfacturas']=0;
			}

			


			$laDatosEmpresa=$this->servicios-> EmpresasDetalle($lnEmpresa,1)->values[0];
			$d["lnMultipago"]=$laDatosEmpresa->Multipago;		
			$lnNroClienteElegido=0;
			//$d['facturas'] =$_SESSION[$tnIdentificarPestaña.'listadofacturaspendientes'];
			$d["lcNombreEmpresa"]=$laDatosEmpresa->Descripcion;
			$etiquetas=$this->servicios->get_etiquetas($lnCliente);
			for ($i=0; $i < count($etiquetas->values); $i++) { 
				if($etiquetas->values[$i]->Empresa == $lnEmpresa) 
				{
					$d['etiquetas']=$etiquetas->values[$i];
				}
			}
			
		
				
				$this->load->view('multiple/listafacturaspendientes', $d);
		} catch (\Throwable $th) {
			//throw $th;
			echo '<pre>'; 
			print_r($th );
			echo '</pre>' ;
		}
	}

	public function cargarloghub($Mensajeerror)
    {
		$logFile = fopen("loghub.txt", 'a') or die("Error creando archivo");
		fwrite($logFile, "\n".date("d/m/Y H:i:s").$Mensajeerror) or die("Error escribiendo en el archivo");
		fclose($logFile);
    }

	public function get_periodo($cadena)
	{
		$cadenanueva=substr($cadena, 0, 7);
		$cadenanueva=$cadena;
		
		$porciones = explode("-", $cadenanueva);
		//if(trim($porciones[0])== "Cuota:")
		if (stripos($cadenanueva, "Cuota") !== false ) {
		
			//$arraymeses=["01"=> "ENE" ,"02"=> "FEB" ,"03"=> "MAR"  ,"04"=> "ABR" ,"05"=> "MAY"  ,"06"=> "JUN"  ,"07"=>"JUL"  ,"08"=>"AGO"  ,"09"=> "SEP" ,"10"=> "OCT" ,"11"=>"NOV"  ,"12"=> "DIC"  ];
			return $cadenanueva ; //$porciones[0]."-".@$arraymeses[ @$porciones[1] ] ;
		}else{
			$arraymeses=["01"=> "ENE" ,"02"=> "FEB" ,"03"=> "MAR"  ,"04"=> "ABR" ,"05"=> "MAY"  ,"06"=> "JUN"  ,"07"=>"JUL"  ,"08"=>"AGO"  ,"09"=> "SEP" ,"10"=> "OCT" ,"11"=>"NOV"  ,"12"=> "DIC"  ];
			return $porciones[0]."-".@$arraymeses[ @$porciones[1] ] ;
		}

		
	}
	
	/**/
}