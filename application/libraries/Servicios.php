<?php if ( ! defined('BASEPATH')) exit('No se permite el acceso directo al script');

class servicios {
    // Usar el constructor, cuando no se puede llamar directamente
    // en la definición de la propiedad
    public function __construct()
    {
        // Asignar el súper objeto de CodeIgniter
        $this->CI =&get_instance();

      
    }
   //funciones que queremos implementar en Miclase.
   
   // esta funcion llama a los rubros que tiene 
   public function get_list_rubros(){

      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Empresa/ListarTiposEmpresa';
		$data = array('tnCliente' => $this->session->userdata('cliente'));
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
		  /*echo "<pre>";
		  print_r( $resultado);
		  echo "</pre>";
		  */
		return $resultado;

      
   }

	public function get_list_regiones()
   {
       $url = 'http://serviciopagofacil.syscoop.com.bo/api/Empresa/ListarRegionesEmpresas';
     $data = array('tnIdAccion' => '13'  ,'tnCliente' => $this->session->userdata('cliente')  );
     
     

   
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
       /*echo "<pre>";
      print_r( $resultado);
      echo "</pre>";
      */
     return $resultado;


   }
   public function get_list_empresas_by_tipo_region($id_tipoempresa,$id_region,$id_cliente)
   {
       $url = 'http://serviciopagofacil.syscoop.com.bo/api/Empresa/ListarEmpresasByTipoYRegion';
     $data = array('tnTipoEmpresa' => $id_tipoempresa , 'tnIdAccion' => '91'  ,'tnCliente' => $this->session->userdata('cliente')  ,'tnRegion'=>  $id_region);
/*
     @POST(cPagoFacilPHP + "/Empresa/ListarEmpresasByTipoYRegion")
     @FormUrlEncoded
     Call<mPaquetePagoFacil<ArrayList<mEmpresaSimple>>> ListarEmpresasByTipoYRegion(
             @Field("tnCliente")     long    tnCliente,
             @Field("tnRegion")      long    tnRegion,
             @Field("tnTipoEmpresa") long    tnTipoEmpresa,
             @Field("tnIdAccion")    long    tnIdAccion);
*/ 
   
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
     return $resultado;


   }

   public function get_list_empresas_by_tipo() 
   {
      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Empresa/listarEmpresasByTipo';
      $data = array('tnTipoEmpresa' => $id_tipoempresa , 'tnIdAccion' => '91'  ,'tnCliente' => $this->session->userdata('cliente') );
      /*
   @POST(cPagoFacilPHP + "/Empresa/listarEmpresasByTipo")
   @FormUrlEncoded
   Call<mPaquetePagoFacil<ArrayList<mEmpresaSimple>>> listarEmpresasByTipo(
           @Field("tnCliente")     long tnCliente,
           @Field("tnTipoEmpresa") long tnTipoEmpresa,
           @Field("tnIdAccion")    long tnIdAccion);

   }*/
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
      return $resultado;
 

  }


   public function get_busqueda_codigo_fijo($id_empresa,$codigo_fijo,$codigo_cliente)
   {
      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Empresa/buscarClienteEmpresaFullDatos';
      $data = array('tnEmpresa' => $id_empresa , 'tcCodigoClienteEmpresa' => strval($codigo_fijo)  ,'tnCliente' => $this->session->userdata('cliente') );
    /*
    @POST(cPagoFacilPHP + "/Empresa/buscarClienteEmpresaFullDatos")
    @FormUrlEncoded
    Call<mPaquetePagoFacil<ArrayList<mClienteEmpresaModel>>> buscarClienteEmpresasFull(
            @Field("tnEmpresa")     long tnEmpresa,
            @Field("tnCliente")     long tnCliente,
            @Field("tcCodigoClienteEmpresa") String codigoClienteEmpresa);
      */

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
      return $resultado;
 

   }
   public function get_busqueda_ci($id_empresa,$ci,$codigo_cliente)
   {
      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Empresa/buscarClienteEmpresaByCIFull';
      $data = array('tnEmpresa' => $id_empresa , 'tcDocIdUsuario' => strval($ci)  ,'tnCliente' => $this->session->userdata('cliente') );
    /*
       @POST(cPagoFacilPHP + "/Empresa/buscarClienteEmpresaByCIFull")
    @FormUrlEncoded
    Call<mPaquetePagoFacil<ArrayList<mClienteEmpresaModel>>> buscarClienteEmpresasByCI(
            @Field("tnEmpresa")     long tnEmpresa,
            @Field("tnCliente")     long tnCliente,
            @Field("tcDocIdUsuario") String tcDocIdUsuario);

      */

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
      return $resultado;
 

   }
   public function get_listar_facturas($id_empresa,$codigo_cliente_empresa)
   {
      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Factura/ListarFacturasPendientesSimples2';
      $data = array('tnEmpresa' => $id_empresa , 'tcCodigoClienteEmpresa' => $codigo_cliente_empresa  ,'tnCliente' => $this->session->userdata('cliente') , 'tnIdAccion'=> 0  );
      /*
  
          Call<mPaquetePagoFacil<ArrayList<mFacturasPendientesSimples>>> facturasPendientesSimple
            (@Field("tnCliente")                long    cliente,
             @Field("tnEmpresa")                long    empresa,
             @Field("tcCodigoClienteEmpresa")   String  tcCodigoClienteEmpresa,
             @Field("tnIdAccion")               int     tnIdAccion);  */
      
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
      return $resultado;
 

   } 
   public function get_detalle_factura($factura,$id_empresa ,$codigo_fijo)
   {

      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Factura/FacturaPendienteFull';
      $data = array('tnEmpresa' => $id_empresa , 'tcCodigoClienteEmpresa' => $codigo_fijo  ,'tnCliente' => $this->session->userdata('cliente') , 'tnFactura'=> $factura  );
      /*
      Call<mPaquetePagoFacil<mFacturaPendiente>> facturasPendientesFull
            (@Field("tnCliente")                long    cliente,
             @Field("tnEmpresa")                long    empresa,
             @Field("tcCodigoClienteEmpresa")   String  tcCodigoClienteEmpresa,
             @Field("tnFactura")                String    factura);    */
      
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
      return $resultado;
 


   }

   public function get_metodos_pago()
   {

      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Empresa/listarMetodosDePago';
      $data = array('tnCliente' => $this->session->userdata('cliente') );
      /*   @POST(cPagoFacilPHP + "/Empresa/listarMetodosDePago")
    @FormUrlEncoded
      Call<mPaquetePagoFacil<ArrayList<mMetodoPagoSimple>>> listarMetodosDePago(
            @Field("tnCliente")     int tnCliente);   */
      
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
      return $resultado;
 

   }
   public function get_etiquetas()
   {
      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Empresa/getEtiquetas';
      $data = array('tnCliente' => $this->session->userdata('cliente') ,'tcImei'=> "1232132132" );
      /*     @POST(cPagoFacilPHP + "/Empresa/getEtiquetas")
    @FormUrlEncoded
    Call<mPaquetePagoFacil<ArrayList<mEtiquetasEmpresa>>> getEtiquetas(
            @Field("tnCliente")             long    tnCliente,
            @Field("tcImei")                String  tcImei);   */
      
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
      return $resultado;
 
   }

   public function getavisofacturames($codigo_fijo, $ip_empresa,$factura)
   {
      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Factura/getAvisoDeCobranza';
      $data = array('tcIPEmpresa' => strval($ip_empresa) , 'tnTransaccionDePago' => $this->session->userdata('cliente')   ,'tcCodigoClienteEmpresa' => strval($codigo_fijo) , 'tcNroFactura'=> strval($factura)  );

      /*   @POST(cPagoFacilPHP + "/Factura/getAvisoDeCobranza")
    @FormUrlEncoded
    Call<mPaquetePagoFacil<FacturaPDF>> obtenerAvisoDecobranzaPDF(
            @Field("tnTransaccionDePago")             long tnCliente,
            @Field("tcIPEmpresa")             String tcIPEmpresa,
            @Field("tcCodigoClienteEmpresa")   String tcCodigoClienteEmpresa,
            @Field("tcNroFactura")             String tcNroFactura);
            */
      
      $header = array(
         "Content-Type: application/x-www-form-urlencoded",
         "Content-Length: ".strlen( http_build_query($data))
         );
         
      // use key 'http' even if you send the request to https://...
      $options = array('http' => array(
                     'method'  => 'POST',
                     'header' => implode("\r\n", $header),
                     'content' => http_build_query($data) 
                     )  );
   
   
   
      $context  = stream_context_create($options);
      $result = file_get_contents($url, false, $context);
       $resultado =json_decode($result);
      return $resultado;
 
   }
   
   public function getempresasimple($id_empresa)
   {
      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Empresa/listarEmpresas';
      $data = array('tnCliente' => $this->session->userdata('cliente') ,'tcFiltro'=> $id_empresa,'tnIdAccion'=> 0 );

     // $data = array('tnEmpresa' => $id_empresa , 'tcCodigoClienteEmpresa' => $codigo_fijo  ,'tnCliente' => $this->session->userdata('cliente') , 'tnFactura'=> $factura  );

      /*     @POST(cPagoFacilPHP + "/Empresa/listarEmpresas")
    @FormUrlEncoded
    Call<mPaquetePagoFacil<ArrayList<mEmpresaSimple>>> listarEmpresas(
            @Field("tnCliente")     long    cliente,
            @Field("tcFiltro")      String  query,
            @Field("tnIdAccion")    int     tnIdAccion);
*/
      
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
      return $resultado;
   }
   public function getavisocobranzaactualizado($ip_empresa,$codigo_fijo)
   {
      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Factura/getAvisoDeCobranzaActualizado';
      $data = array('tcIPEmpresa' => $ip_empresa , 'tnTransaccionDePago' => $this->session->userdata('cliente')   ,'tcCodigoClienteEmpresa' => $codigo_fijo  );
  
        /*
  
         @POST(cPagoFacilPHP + "/Factura/getAvisoDeCobranzaActualizado")
      @FormUrlEncoded
      Call<mPaquetePagoFacil<FacturaPDF>> obtenerAvisoActualizadoPDF(
              @Field("tnTransaccionDePago")             long tnCliente,
              @Field("tcIPEmpresa")             String tcIPEmpresa,
              @Field("tcCodigoClienteEmpresa")   String tcCodigoClienteEmpresa);            
              
              */
        
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
        return $resultado;
   

   }

   public function loginpagofacil($usuario,$contraseña)
   {
      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Usuario/login';
		$data = array('tcLogin' => $usuario, 'tcPassWord' => $contraseña);
	
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
      return $resultado;
   }

}



?>