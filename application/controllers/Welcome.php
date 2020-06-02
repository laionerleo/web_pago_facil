<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
        
        parent::__construct();
 
        //cargamos la base de datos por defecto
        $this->load->database('default');
        
        //cargamos los agentes para los dispositivos
		$this->load->library('user_agent');
		$this->load->library('servicios');

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
		//echo "hola mundo ";
		$d['rubros']=$this->servicios->get_list_rubros();
		$d['region']=$this->servicios->get_list_regiones();
 
 
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
		$d['empresas']=$this->servicios->get_list_empresas_by_tipo_region($rubro_id,$region_id,3859);
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
		if($tipo==1)
		{
			$d['clientes']=$this->servicios->get_busqueda_codigo_fijo($empresa_id,$codigo,3859);
		}else{
			$d['clientes']=$this->servicios->get_busqueda_ci($empresa_id,$codigo,3859);
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

		$lista=$this->servicios->get_listar_facturas($empresa_id,$codigo_fijo);
		$d['facturas']=$lista->values;
		$facturaprincipal=$this->servicios->get_detalle_factura($lista->values[0]->factura , $empresa_id,$codigo_fijo);
		$d['facturaprincipal']=$facturaprincipal->values;
		$metodos=$this->servicios->get_metodos_pago();
		$d['metodospago']=$metodos->values;
		$etiquetas=$this->servicios->get_etiquetas();
		//$d['etiquetas']=$etiquetas->values;
		
		for ($i=0; $i < count($etiquetas->values); $i++) { 
			if($etiquetas->values[$i]->Empresa == $empresa_id) 
			{
				$d['etiquetas']=$etiquetas->values[$i];

			}
		}
		for ($i=0; $i < count($lista->values); $i++) { 
			$lista->values[$i]->periodoaux=$lista->values[$i]->periodo;
			$lista->values[$i]->periodo =$this->get_periodo($lista->values[$i]->periodo);

		}
		$d["empresa_id"]=$datos["empresa_id"];
		$d["codigofijo"]=$datos["codigo"];
		
		
		

		/*
	echo "<pre>";
	print_r($d);
	echo "</pre>";
		*/
		
		$this->load->view('pago_rapido/facturaspendientes', $d);
	}
	public function getavisofacturames()
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		$id_empresa=13;//  $datos["empresa_id"];
		$empresadetalle=$this->servicios->getempresasimple($id_empresa);
	
		$ip_empresa=$empresadetalle->values[0]->cServerIP;//ip de la empresa
		
		$codigo_fijo=23931;//  $datos["codigo_fijo"];;//codigofijodelcliente
		$factura="2020-02";//$datos["periodo"];//periodo
		$lista=$this->servicios->getavisofacturames($codigo_fijo,$ip_empresa,$factura);
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

	public function getavisofacturames2($lan,$codigo_fijo,$factura,$id_empresa)
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$datos=$this->input->post("datos");
		//$id_empresa=$id_empresa;//  $datos["empresa_id"];
		$empresadetalle=$this->servicios->getempresasimple($id_empresa);
	
		$ip_empresa=$empresadetalle->values[0]->cServerIP;//ip de la empresa
		
		//$codigo_fijo=23931;//  $datos["codigo_fijo"];;//codigofijodelcliente
		//$factura="2020-02";//$datos["periodo"];//periodo
		$lista=$this->servicios->getavisofacturames($codigo_fijo,$ip_empresa,$factura);
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
		//$id_empresa=;//  $datos["empresa_id"];
		$empresadetalle=$this->servicios->getempresasimple($id_empresa);
	
		$ip_empresa=$empresadetalle->values[0]->cServerIP;//ip de la empresa
		
		//$codigo_fijo=23931;//  $datos["codigo_fijo"];;//codigofijodelcliente
		
		$lista=$this->servicios->getavisocobranzaactualizado($ip_empresa,$codigo_fijo);
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