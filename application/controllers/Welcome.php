<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
 
 
	/*	$ip = '181.114.102.117'; // Esto contendrá la ip de la solicitud.
		// Puedes usar un método más sofisticado para recuperar el contenido de una página web con PHP usando una biblioteca o algo así
		// Vamos a recuperar los datos rápidamente con file_get_contents
		$dataArray = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
		
		var_dump($dataArray);
		
		echo "Hola visitante desde: ".$dataArray["geoplugin_countryName"];*/
	/*echo "<pre>";
		print_r($d);
		echo "</pre>";*/
		$this->load->view('pago_rapido/index', $d);
	
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
		//		echo json_encode($empresas);
		$this->load->view('pago_rapido/lista_empresas', $d);
		


	}
	public function  busqueda_clientes()
	{
	
	//get_busqueda_codigo_fijo($id_empresa,$codigo_fijo,$codigo_cliente)
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		$empresa_id=$datos['empresa_id'];
		$codigo=$datos['codigo'];
		$tipo=$datos['tipo'];
		$id_cliente=$this->session->userdata('cliente');
		if($tipo==1)
		{
			$d['clientes']=$this->servicios->get_busqueda_codigo_fijo($empresa_id,$codigo,$id_cliente);
		}else{
			$d['clientes']=$this->servicios->get_busqueda_ci($empresa_id,$codigo,$id_cliente);
		}
/*
		echo "<pre>";
		print_r($d['clientes']->values);
		echo "</pre>";
		*/

		if(count($d['clientes']->values)>0 ){
			$_SESSION['codigofijo']=$d['clientes']->values[0]->codigoClienteEmpresa;
			$_SESSION['codigoubicacion']= $d['clientes']->values[0]->codidgoUbicacion;
			$_SESSION['nombreclienteempresa'] = $d['clientes']->values[0]->nombre;
			
			
		}
		$this->load->view('pago_rapido/lista_clientes', $d);

	}
	//

	public function listadodefacturas()
	{	
		$d = array();
		$this->Msecurity->url_and_lan($d);
		//echo "hola mundo ";
		//$d['listado']=$this->servicios->get_Listar_pendientes_full();
		echo "<pre>";
		print_r($d);
		echo "</pre>";
		//$this->load->view('pago_rapido/index', $d);
	
	}
	public function vistafacturaspendientes()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		//echo "hola mundo ";
		$datos=$this->input->post("datos");
		$empresa_id=$datos["empresa_id"];
		$codigo_fijo=$datos["codigo"];
		$urliconoempresa=$datos["urlimagen"];
		$id_cliente=$this->session->userdata('cliente');
		$lista=$this->servicios->get_listar_facturas($empresa_id,$codigo_fijo,$id_cliente);
		if(!is_null($lista->values)  ){
			$d['facturas']=$lista->values;
			$d['cantidadfacturas']=count($lista->values);

			$facturaprincipal=$this->servicios->get_detalle_factura($lista->values[0]->factura , $empresa_id,$codigo_fijo,$id_cliente);
			$d['facturaprincipal']=$facturaprincipal->values;
		//	print_r($facturaprincipal->values);
			$_SESSION['periodomes']=$facturaprincipal->values->periodo;
			for ($i=0; $i < count($lista->values); $i++) { 
				$lista->values[$i]->periodoaux=$lista->values[$i]->periodo;
				$lista->values[$i]->periodo =$this->get_periodo($lista->values[$i]->periodo);
				
	
			}
		}else{
			$d['facturas']= array();
			$d['cantidadfacturas']=0;
			
		}	
		
		$d['idCliente']=  $_SESSION['codigofijo']; 
		$d['nombre']=  $_SESSION['nombreclienteempresa'];
		$d['codigoUbicacion']=  $_SESSION['codigoubicacion'];
		$d['urlimagenempresa']=$urliconoempresa;
		$d['nombreempresa']=$datos["nombreempresa"];
		$d['idempresa']=$datos["empresa_id"];
		$_SESSION['idempresa']=$datos["empresa_id"];
		$_SESSION['nombreempresa']=$datos["nombreempresa"];
		$_SESSION['urlimagenempresa']=$d['urlimagenempresa'];

		$metodos=$this->servicios->get_metodos_pago_empresa($id_cliente ,$empresa_id);
		$d['tiposdecomision']=$metodos->values->aTipoComisionDetalle;
		$d['metodospago']=$metodos->values->aMetodosDePago;
		$etiquetas=$this->servicios->get_etiquetas($id_cliente);
		//$d['etiquetas']=$etiquetas->values;
		
		for ($i=0; $i < count($etiquetas->values); $i++) { 
			if($etiquetas->values[$i]->Empresa == $empresa_id) 
			{
				$d['etiquetas']=$etiquetas->values[$i];

			}
		}
		
		$d["empresa_id"]= $datos["empresa_id"];
		$d["codigofijo"]= $datos["codigo"];
	/*			
	echo "<pre>";
	print_r($d);
	echo "</pre>";*/
	$this->load->view('pago_rapido/facturaspendientes', $d);
	}
	public function getavisofacturames()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		$id_empresa= $datos["empresa_id"];
		$idcliente=$this->session->userdata('cliente');
		$empresadetalle=$this->servicios->getempresasimple($id_empresa,$idcliente);
		$ip_empresa=$empresadetalle->values[0]->cServerIP;//ip de la empresa
		$codigo_fijo= $datos["codigo_fijo"];//codigofijodelcliente
		$factura=$datos["periodo"];//periodo
		$lista=$this->servicios->getavisofacturames($codigo_fijo,$ip_empresa,$factura ,$idcliente);
		$cadena="";
		foreach($lista->values->facturaPDF as $byte){
			$cadena.=chr($byte);
		}
		//GET CONTENT
		
		$fileToDownload = $cadena;
		//START DOWNLOAD
		header('Content-Description: File Transfer');
		header('Content-Type', 'application/octet-stream');
		header('Content-Disposition: attachment; filename=factura-'.$factura.'.pdf');
		header('Content-Transfer-Encoding: base64');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		
		header('Content-Length: '. strlen($fileToDownload));
		ob_clean();
		flush();
		echo $fileToDownload;
	
		
	}

	public function getavisofacturames2($lan,$factura,$id_empresa,$codigo_fijo)
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		$idcliente=$this->session->userdata('cliente');
		$empresadetalle=$this->servicios->getempresasimple($id_empresa ,$idcliente);
		$ip_empresa=$empresadetalle->values[0]->cServerIP;//ip de la empresa
		
		//$codigo_fijo=23931;//  $datos["codigo_fijo"];;//codigofijodelcliente
		//$factura="2020-02";//$datos["periodo"];//periodo
		$lista=$this->servicios->getavisofacturames($codigo_fijo,$ip_empresa,$factura,$idcliente);
		//$lista=$this->servicios->getempresasimple();
		/*echo "<pre>";
		print_r($lista);
		echo "</pre>";*/
		$cadena="";
		foreach($lista->values->facturaPDF as $byte){
			$cadena.=chr($byte);
		}
		//GET CONTENT
		
		$fileToDownload = $cadena;
	
		

		//START DOWNLOAD
		header('Content-Description: File Transfer');
		header('Content-Type', 'application/octet-stream');
		header('Content-Disposition: attachment; filename=factura-'.$factura.'.pdf');
		header('Content-Transfer-Encoding: base64');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		
		header('Content-Length: '. strlen($fileToDownload));
		ob_clean();
		flush();
		echo $fileToDownload;
		//echo "esto es el dato del pdf ";
		//exit;
		
	
		
		
	}
	public function getavisoactualizado($lan,$codigo_fijo,$id_empresa)
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		$idcliente=$this->session->userdata('cliente');
		//$id_empresa=;//  $datos["empresa_id"];
		$empresadetalle=$this->servicios->getempresasimple($id_empresa,$idcliente);
	
		$ip_empresa=$empresadetalle->values[0]->cServerIP;//ip de la empresa
		
		//$codigo_fijo=23931;//  $datos["codigo_fijo"];;//codigofijodelcliente
		
		$lista=$this->servicios->getavisocobranzaactualizado($ip_empresa,$codigo_fijo,$idcliente);
		//$lista=$this->servicios->getempresasimple();
		$cadena="";
		foreach($lista->values->facturaPDF as $byte){
			$cadena.=chr($byte);
		}
		//GET CONTENT
		
		$fileToDownload = $cadena;
	
		

		//START DOWNLOAD
		header('Content-Description: File Transfer');
		header('Content-Type', 'application/octet-stream');
		header('Content-Disposition: attachment; filename=facturaactual.pdf');
		header('Content-Transfer-Encoding: base64');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		
		header('Content-Length: '. strlen($fileToDownload));
		ob_clean();
		flush();
		echo $fileToDownload;
		//echo "esto es el dato del pdf ";
		//exit;
	
		
		
	}

	public function vistafacturacion()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		$metodopago=$datos["metododepago"];
		$d['nombrecliente'] =  $this->session->userdata('nombre')." ".$this->session->userdata('apellido') ;
		$d['cionit']=  $this->session->userdata('cinit');
		$d['numerocelular']=  $this->session->userdata('telefonoDePago');
		$d["correo"]= $this->session->userdata('correo');
		$_SESSION['montototal']=$datos["montototal"];
		$_SESSION['idfactura']=$datos["idfactura"];
			/*echo "<pre>";
			print_r($d);
			echo print_r($_SESSION);
			echo "</pre>";*/
		$this->load->view('pago_rapido/facturacion', $d);

	}
	public function vistaconfirmacion()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		$nombrecliente=$datos["nombrecliente"];
		$cionit=$datos["inpcionit"];
		$numero=$datos["inpnumero"];
		$correo=$datos["inpcorreo"];
		//var datos= {metododepago:5 ,nombrecliente:nombrecliente,inpcionit:inpcionit,inpnumero:inpnumero ,inpcorreo:inpcorreo };
		if($nombrecliente != $_SESSION['nombreclienteempresa'])
		{
			$_SESSION['nombreclienteempresa']=$nombrecliente ;
		}
		if($cionit != $_SESSION['cinit'] )
		{
			$_SESSION['cinit'] =$cionit ;
		}
		if(	$numero != $_SESSION['nombreclienteempresa'] )
		{
			$_SESSION['nombreclienteempresa'] =	$numero;
		}
		if($correo != $_SESSION['telefonoDePago'] )
		{
			$_SESSION['nombreclienteempresa']=$correo;
		}


		$metodopago=$datos["metododepago"];
		$id_empresa= $_SESSION['idempresa'];
		$idcliente=$this->session->userdata('cliente');
		$metodos=$this->servicios->get_metodos_pago_empresa($idcliente ,$id_empresa);
		$tipodecomision=0;
		$montocomision=0;
		$d['metodosdepago']=$metodos->values->aMetodosDePago;
		$d['tipocomision']=$metodos->values->aTipoComisionDetalle;
		$varinicio=0;
		$varfinal=0;
		echo "<pre>";
			print_r($d);

		for ($i=0; $i <count($d['metodosdepago']) ; $i++) { 
			if($d['metodosdepago'][$i]->metodoPago==$metodopago )
			{
				$tipodecomision=$d['metodosdepago'][$i]->tipoComisionCliente;
				echo  "el tipo de comision es :".$tipodecomision;
			}
		}
		for ($j=0; $j <count($d['tipocomision']) ; $j++) { 
			if(  $d['tipocomision'][$j]->tipoComision == $tipodecomision )
			{
				
				$varfinal=$d['tipocomision'][$j]->hasta;
				echo "rango".$varinicio."<".$_SESSION['montototal']."<".$varfinal;
				if(  ( strval($varinicio) < strval($_SESSION['montototal']) )  && ( strval($varfinal) > strval($_SESSION['montototal']) )    )
				{
					$montocomision=$d['tipocomision'][$i]->valor;
					$_SESSION['montocomision']=$montocomision;
					echo "entro y cambio";
				}
				$varinicio=$d['tipocomision'][$j]->hasta;
				echo "vfinal :".$varinicio;
			}
				


		}
		$d['nombre']=$_SESSION['nombreclienteempresa'];
		$d['cinit']=$_SESSION['cinit'];
		$d['periodo']=$_SESSION['periodomes'];
		
		$d['monto']=$_SESSION['montototal'];
		$d['comision']=$_SESSION['montocomision'];
		$d['nombremetodopago']=$_SESSION['nombreclienteempresa'];
		$d['mediosbcp']= $this->session->userdata('telefonoDePago');
		$d['email']=$this->session->userdata('correo');		
		$d['nombreempresa']=$_SESSION['nombreempresa'];
		$d['urlimagenempresa']=$_SESSION['urlimagenempresa'];
		//echo "<pre>";
		echo  "entro aqui final ";
		print_r($d);
		echo "</pre>";
		
		//$this->load->view('pago_rapido/confirmacion', $d);

	}
	public function vistaprepararpago()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		//$d['urlimagenempresa']=$_SESSION['urlimagenempresa'];
		/*echo "<pre>";
		print_r($d);
		echo "</pre>";
		*/
		$this->load->view('pago_rapido/formasdepago/pagoconbcp', $d);


	}

	public function get_periodo($cadena)
	{
		$porciones = explode("-", $cadena);
		$arraymeses=["01"=> "ENE" ,"02"=> "FEB" ,"03"=> "MAR"  ,"04"=> "ABR" ,"05"=> "MAY"  ,"06"=> "JUN"  ,"07"=>"JUL"  ,"08"=>"AGO"  ,"09"=> "SEP" ,"10"=> "OCT" ,"11"=>"NOV"  ,"12"=> "DIC"  ];
		return $porciones[0]."-".$arraymeses[$porciones[1]];
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