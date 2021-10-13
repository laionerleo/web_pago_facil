<?php if ( ! defined('BASEPATH')) exit('No se permite el acceso directo al script');

class servicios {
    // Usar el constructor, cuando no se puede llamar directamente
    // en la definición de la propiedad
    public function __construct()
    {
        // Asignar el súper objeto de CodeIgniter
      
        $this->CI =&get_instance();

        //$this->load->library('user_agent');
      
    }
   //funciones que queremos implementar en Miclase.
   
   // esta funcion llama a los rubros que tiene 
   public function get_list_rubros($idcliente){

      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Empresa/ListarTiposEmpresa';
		$data = array('tnCliente' => $idcliente , 'tcApp'=>2  );
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

	public function get_list_regiones($idcliente)
   {
       $url = 'http://serviciopagofacil.syscoop.com.bo/api/Empresa/ListarRegionesEmpresas';
     $data = array('tnIdAccion' => '13'  ,'tnCliente' => $idcliente , 'tcApp'=>2  );
     
     

   
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
     //$data = array('tnTipoEmpresa' => $id_tipoempresa , 'tnIdAccion' => '91'  ,'tnCliente' => $id_cliente ,'tnRegion'=>  $id_region , 'tcApp'=>2 );
     $data = array('tnTipoEmpresa' => $id_tipoempresa , 'tnIdAccion' => '91'  ,'tnCliente' => $id_cliente ,'tnRegion'=>  $id_region );
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

   public function get_list_empresas_by_tipo($id_cliente) 
   {
      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Empresa/listarEmpresasByTipo';
      $data = array('tnTipoEmpresa' => $id_tipoempresa , 'tnIdAccion' => '91'  ,'tnCliente' => $id_cliente , 'tcApp'=>2 );
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
      $data = array('tnEmpresa' => $id_empresa , 'tcCodigoClienteEmpresa' => strval($codigo_fijo)  ,'tnCliente' => $codigo_cliente , 'tcApp'=>2  );
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
      $data = array('tnEmpresa' => $id_empresa , 'tcDocIdUsuario' => strval($ci)  ,'tnCliente' => $codigo_cliente , 'tcApp'=>2  );
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
   public function get_listar_facturas($id_empresa,$codigo_cliente_empresa ,$id_cliente)
   {
      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Factura/ListarFacturasPendientesSimples2';
      $data = array('tnEmpresa' => $id_empresa , 'tcCodigoClienteEmpresa' => $codigo_cliente_empresa  ,'tnCliente' => $id_cliente , 'tnIdAccion'=> 17 , 'tcApp'=>2  );
      $this->cargarlog("listarfacturas".json_encode($data));
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
   public function get_detalle_factura($factura,$id_empresa ,$codigo_fijo,$id_cliente)
   {

      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Factura/FacturaPendienteFull';
      $data = array('tnEmpresa' => $id_empresa , 'tcCodigoClienteEmpresa' => $codigo_fijo  ,'tnCliente' => $id_cliente , 'tnFactura'=> $factura , 'tcApp'=>2   );
      
      $this->cargarlog("detallefactura".json_encode($data));
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

   public function get_metodos_pago($id_cliente)
   {

      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Empresa/listarMetodosDePago';
      $data = array('tnCliente' => $id_cliente , 'tcApp'=>2 );
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
   public function get_metodos_pago_empresa($id_cliente,$idempresa)
   {

      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Empresa/listarMetodosPagoPorEmpresa2';
      $data = array('tnCliente' => $id_cliente , 'tnEmpresa' => $idempresa ,'tnIdAccion' => 0  ,'tcApp'=>2 );
      /*      @POST(cPagoFacilPHP + "/Empresa/listarMetodosPagoPorEmpresa2")
    @FormUrlEncoded
    Call<mPaquetePagoFacil<mMetodoPagoTipoComision>> listarMetodosPagoPorEmpresa(
            @Field("tnCliente")     long    cliente,
            @Field("tnEmpresa")     long    tnEmpresa,
            @Field("tnIdAccion")    int     tnIdAccion); */
      
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
   
   public function get_etiquetas($id_cliente)
   {
      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Empresa/getEtiquetas';
      $data = array('tnCliente' => $id_cliente ,'tcImei'=> "1232132132" , 'tcApp'=>2 );
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

   public function getavisofacturames($codigo_fijo, $ip_empresa,$factura,$idcliente)
   {
      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Factura/getAvisoDeCobranza';
      $data = array('tcIPEmpresa' => strval($ip_empresa) , 'tnTransaccionDePago' => $idcliente  ,'tcCodigoClienteEmpresa' => strval($codigo_fijo) , 'tcNroFactura'=> strval($factura) , 'tcApp'=>2   );

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
   
   public function getempresasimple($id_empresa,$idcliente)
   {
      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Empresa/listarEmpresas';
      $data = array('tnCliente' => $idcliente ,'tcFiltro'=> $id_empresa,'tnIdAccion'=> 0 , 'tcApp'=>2  );
      $this->cargarlog("empresasimple".json_encode($data));
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
   public function getavisocobranzaactualizado($ip_empresa,$codigo_fijo,$idcliente)
   {
      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Factura/getAvisoDeCobranzaActualizado';
      $data = array('tcIPEmpresa' => $ip_empresa , 'tnTransaccionDePago' => $idcliente   ,'tcCodigoClienteEmpresa' => $codigo_fijo , 'tcApp'=>2   );
    
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
		$data = array('tcLogin' => $usuario, 'tcPassWord' => $contraseña , 'tcApp'=>2 );
	
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
   public function verificar_cuenta($correo)
   {
      $usuario=$correo;
      $accion=0;
 
    $url = 'http://serviciopagofacil.syscoop.com.bo/api/Usuario/getUser2';
      $data = array('tcCorreo' => $usuario, 'tnAccion' => $accion  , 'tcApp'=>2 );
  
      $header = array(
          "Content-Type: application/x-www-form-urlencoded",
          "Content-Length: ".strlen( http_build_query($data))
    );
    
      // use key 'http' even if you send the request to https://...
      $options = array('http' => array(
                  'method'  => 'POST',
                  'header' => implode("\r\n", $header),
                  'content' => http_build_query($data) )
             );



     $context  = stream_context_create($options);
     $result = file_get_contents($url, false, $context);
      $resultado =json_decode($result);
     // $data = get_object_vars($resultado->values);
    // aqui obtiee los datos del usuario si este 
    
    if(  !is_null($resultado->values ))
    {
        //$_SESSION['user'] = $resultado;
        //significa que existe el usuario 
       // $this->session->set_userdata($data);
        //$respuesta=0;
        return $resultado; 
        //echo $respuesta;
    }else{
       //hubo algun error o no existe 
      //  $respuesta=11;
       return null;
       
    }


   }
   
   public function registro_parcial($nombre,$apellido,$correo)
   {

      $contraseña="25d55ad283aa400af464c76d713c07ad";
      $imei=9999;
      
 
    $url = 'http://serviciopagofacil.syscoop.com.bo/api/Usuario/registrarByEmail';
     $data = array('tcNombre' => $nombre, 'tcApellido' => $apellido,'tcDireccion' => '' ,'tcCinit' => '' , 'tcFacturaa' => 0,'tnTelefono' =>0 ,'tnTelefonoPago' =>0 , 'tcCorreo' =>$correo ,'tcLogin' =>$correo ,'tcPassword' => $contraseña ,'tcImei' => $imei , 'tcApp'=>2 );
  
      $header = array(
          "Content-Type: application/x-www-form-urlencoded",
          "Content-Length: ".strlen( http_build_query($data))
          );
    
      // use key 'http' even if you send the request to https://...
      $options = array('http' => array(
                      'method'  => 'POST',
                      'header' => implode("\r\n", $header),
                      'content' => http_build_query($data) )
                      );
          $context  = stream_context_create($options);
          $result = file_get_contents($url, false, $context);
          $resultado =json_decode($result);
         // $data = get_object_vars($resultado->values);
      // aqui obtiene los datos del usuario si este 
      
      
      if($resultado->status  == 1)
      {
         // $_SESSION['user'] = $resultado;
         //hubo exito y se registro bien 
        
         //$respuesta=1;
          return $resultado;
          //echo json_decode($respuesta);
      }
      if($resultado->status ==501)
      {
          //$respuesta=501;
          return null;
          //echo json_decode($respuesta);
      }
   }
   
   public function registropagofacil($nombre,$apellido,$correo,$numero,$login,$contraseña)
   {

     // $contraseña="25d55ad283aa400af464c76d713c07ad";
      $imei=9999;
    $url = 'http://serviciopagofacil.syscoop.com.bo/api/Usuario/registrarByEmail';
     $data = array('tcNombre' => $nombre, 'tcApellido' => $apellido,'tcDireccion' => '' ,'tcCinit' => '' , 'tcFacturaa' => 0,'tnTelefono' =>$numero ,'tnTelefonoPago' =>0 , 'tcCorreo' =>$correo ,'tcLogin' =>$login ,'tcPassword' => $contraseña ,'tcImei' => $imei , 'tcApp'=>2  );
     $this->cargarlog("registroparcial".json_encode($data));
      
     /* 
        @POST(cPagoFacilPHP + "/Usuario/registrarByEmail")
    @FormUrlEncoded
    Call<mPaquetePagoFacil<mCliente>> registerUser(
            @Field("tcNombre")          String  nombre,
             @Field("tcApellido")       String  apellido,
             @Field("tcDireccion")      String  direccion,
             @Field("tcCinit")          String  ci,
             @Field("tcFacturaa")       String  facturaa,
             @Field("tnTelefono")       Long    telefono,
             @Field("tnTelefonoPago")   Long    telefonoDePago,
             @Field("tcCorreo")         String  correo,
             @Field("tcLogin")          String  login,
             @Field("tcPassword")       String  password,
             @Field("tcImei")           String  imei);


      */
      $header = array(
          "Content-Type: application/x-www-form-urlencoded",
          "Content-Length: ".strlen( http_build_query($data))
          );
    
      // use key 'http' even if you send the request to https://...
      $options = array('http' => array(
                      'method'  => 'POST',
                      'header' => implode("\r\n", $header),
                      'content' => http_build_query($data) )
                      );
          $context  = stream_context_create($options);
          $result = file_get_contents($url, false, $context);
          $resultado =json_decode($result);
         // $data = get_object_vars($resultado->values);
      // aqui obtiene los datos del usuario si este 
    
      
      if($resultado->status  == 1)
      {
         // $_SESSION['user'] = $resultado;
         //hubo exito y se registro bien 
        
         //$respuesta=1;
          return $resultado;
          //echo json_decode($respuesta);
      }
      if($resultado->status ==501)
      {
          //$respuesta=501;
          return null;
        //  return "entro";
          //echo json_decode($respuesta);
      }
   }

   public function  prepararpago($tncliente,$tnempresa,$codigoclienteempresa, $tnmetodopago,$tnTelefono , $tcFacturaA , $tnCiNit ,$tcNroPago ,$tnMontoClienteEmpresa , $tnMontoClienteSyscoop , $tcPeriodo , $tcImei , $tcExtension , $tcComplement  , $tcServiceCode , $tcExpireDate )
   {
      
      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Factura/BCP_PrepararPago';
      $data = array('tnCliente' =>$tncliente   , 'tnEmpresa' =>  $tnempresa , 'tcCodigoClienteEmpresa' => (String) $codigoclienteempresa  ,'tnMetodoPago' =>  $tnmetodopago  ,'tnTelefono' => (String)$tnTelefono ,'tcFacturaA' => (String) $tcFacturaA ,'tnCiNit' =>(String)  $tnCiNit ,'tcNroPago' =>(String) $tcNroPago,  'tnMontoClienteEmpresa' => (string)($tnMontoClienteEmpresa) ,   'tnMontoClienteSyscoop' =>(string)$tnMontoClienteSyscoop , 'tcPeriodo' =>(String) $tcPeriodo , 'tcImei'=> (String)$tcImei ,   'tcExtension' =>(String) $tcExtension , 'tcComplement' =>$tcComplement,  'tcServiceCode' => (String)$tcServiceCode, 'tcExpireDate' =>  (String)$tcExpireDate , 'tcApp'=>2  );
      $this->cargarlog("prepararpago".json_encode($data));
      /*echo "<pre>";
      print_r(json_encode($data));
      echo "</pre>";
      */
      
        
    /*  @POST(cPagoFacilPHP + "/Factura/BCP_PrepararPago")
    @FormUrlEncoded
    Call<mPaquetePagoFacil<String>> BCP_PrepararPago(
            @Field("tnCliente")                 long    tnCliente,
            @Field("tnEmpresa")                 long    tnEmpresa,
            @Field("tcCodigoClienteEmpresa")    String  tcCodigoClienteEmpresa,
            @Field("tnMetodoPago")              int     tnMetodoPago,
            @Field("tnTelefono")                String  tnTelefono,
            @Field("tcFacturaA")                String  tcFacturaA,
            @Field("tnCiNit")                   String  tnCiNit,
            @Field("tcNroPago")                 String  tcNroPago,
            @Field("tnMontoClienteEmpresa")     Double  tnMontoClienteEmpresa,
            @Field("tnMontoClienteSyscoop")     Double  tnMontoClienteSyscoop,
            @Field("tcPeriodo")                 String  tcPeriodo,
            @Field("tcImei")                    String  tcImei,
            @Field("tcExtension")               String  tcExtension,
            @Field("tcComplement")              String  tcComplement,
            @Field("tcServiceCode")             String  tcServiceCode,
            @Field("tcExpireDate")              String  tcExpireDate);*/
        
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
   public function bcpconfirmarpago($tnCliente,$tnEmpresa , $tnAuthorizationNumber,$tnCorrelationId , $tcOTP )
   {
      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Factura/BCP_ConfirmarPago';
      $data = array('tnCliente' => $tnCliente ,'tnEmpresa'=> $tnEmpresa,'tnAuthorizationNumber'=> $tnAuthorizationNumber , 'tnCorrelationId'=> $tnCorrelationId , 'tcOTP'=> $tcOTP , 'tcApp'=>2  );
      $this->cargarlog("confirmarpago".json_encode($data));
     // $data = array('tnEmpresa' => $id_empresa , 'tcCodigoClienteEmpresa' => $codigo_fijo  ,'tnCliente' => $this->session->userdata('cliente') , 'tnFactura'=> $factura  );

      /*    
    @POST(cPagoFacilPHP + "/Factura/BCP_ConfirmarPago")
    @FormUrlEncoded
    Call<mPaquetePagoFacil<String>> BCP_ConfirmarPago(
            @Field("tnCliente")                 long    tnCliente,
            @Field("tnEmpresa")                 long    tnEmpresa,
            @Field("tnAuthorizationNumber")     String  tnAuthorizationNumber,
            @Field("tnCorrelationId")           int     tnCorrelationId,
            @Field("tcOTP")                     String  tcOTP);

            [13:00, 9/6/2020] Huga Syscoop: y ese OTP se ingresa al metodo confirmar Pago
[13:01, 9/6/2020] Huga Syscoop: El preprarar pago devuleve elpaquete pagoFacil de siempre, en values devuelves una cadena separada asi:
[13:01, 9/6/2020] Huga Syscoop: 5555;666
[13:01, 9/6/2020] Huga Syscoop: donde 555 es el numero de transaccion que se creo y 666 el codigo de autorizacion de BCP
[13:02, 9/6/2020] Huga Syscoop: ambos datos los usara en elmetodo confirmarPAgo
[13:02, 9/6/2020] Huga Syscoop: tnCorrelationId= trasnaccionDePago

tnAuthorizationNumber= autorizacion deBCP

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
   
   


   public function ejecuparpagoelinkser($tncliente,$tnempresa,$codigoclienteempresa, $tnmetodopago,$tnTelefono , $tcFacturaA , $tnCiNit ,$tcNroPago ,$tnMontoClienteEmpresa , $tnMontoClienteSyscoop , $tcPeriodo , $tcImei , $tcTarjeta , $tcTarjetaHabiente  , $tcCodigoSeguridad , $tcFechaExpiracion )
   {
      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Factura/Linkser_RealizarPago';
      $data = array('tnCliente' =>$tncliente   , 'tnEmpresa' =>  $tnempresa , 'tcCodigoClienteEmpresa' => (String) $codigoclienteempresa  ,'tnMetodoPago' =>  $tnmetodopago  ,'tnTelefono' => (String)$tnTelefono ,'tcFacturaA' => (String) $tcFacturaA ,'tnCiNit' =>(String)  $tnCiNit ,'tcNroPago' =>(String) $tcNroPago,  'tnMontoClienteEmpresa' => (string)($tnMontoClienteEmpresa) ,   'tnMontoClienteSyscoop' =>(string)$tnMontoClienteSyscoop , 'tcPeriodo' =>(String) $tcPeriodo , 'tcImei'=> (String)$tcImei ,   'tcTarjeta' =>(String) $tcTarjeta , 'tcTarjetaHabiente' =>$tcTarjetaHabiente,  'tcCodigoSeguridad' => (String)$tcCodigoSeguridad, 'tcFechaExpiracion' =>  (String)$tcFechaExpiracion , 'tcApp'=>2 );
      $this->cargarlog("linkser".json_encode($data));
      /*
      echo "<pre>";
      print_r(json_encode($data));
      echo "</pre>";
   
      */
     
     
      /*   @POST(cPagoFacilPHP + "/Factura/Linkser_RealizarPago")
    @FormUrlEncoded
    Call<mPaquetePagoFacil<String>> Linkser_RealizarPago(
            @Field("tnCliente")                 long    tnCliente,
            @Field("tnEmpresa")                 long    tnEmpresa,
            @Field("tcCodigoClienteEmpresa")    String  tcCodigoClienteEmpresa,
            @Field("tnMetodoPago")              int     tnMetodoPago,
            @Field("tnTelefono")                String  tnTelefono,
            @Field("tcFacturaA")                String  tcFacturaA,
            @Field("tnCiNit")                   String  tnCiNit,
            @Field("tcNroPago")                 String  tcNroPago,
            @Field("tnMontoClienteEmpresa")     Double  tnMontoClienteEmpresa,
            @Field("tnMontoClienteSyscoop")     Double  tnMontoClienteSyscoop,
            @Field("tcPeriodo")                 String  tcPeriodo,
            @Field("tcImei")                    String  tcImei,
            @Field("tcTarjeta")                 String  tcTarjeta,
            @Field("tcTarjetaHabiente")         String  tcTarjetaHabiente,
            @Field("tcFechaExpiracion")         String  tcFechaExpiracion,
            @Field("tcCodigoSeguridad")         String  tcCodigoSeguridad);


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
   public function get_trancaccionesbcp($tncliente )
   {
      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Usuario/getTransaccionesBCP';
      $data = array('tnCliente' =>$tncliente   , 'tcApp' =>  2 );

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

   public function calcularcomision($tncliente,$tnempresa,$tnmetodopago,$tcMonto)
   {
      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Factura/calcularComision';
      $data = array( 'tnEmpresa'=> $tnempresa,'tnCliente' =>$tncliente   , 'tnMetodoPago'=> $tnmetodopago ,'tcMonto'=> $tcMonto ,'tnIdAccion'=> 0 , 'tcApp'=>2);
      $this->cargarlog("calcularcomision".json_encode($data));
      //print_r($data);
      
      /*
       @POST(cPagoFacilPHP + "/Factura/calcularComision")    @FormUrlEncoded
    Call<mPaquetePagoFacil<Double>> calcularComision
            (@Field("tnEmpresa")    long    empresa,
             @Field("tnCliente")    long    cliente,
             @Field("tnMetodoPago") long    metodoPago,
             @Field("tcMonto")      String  monto,
             @Field("tnIdAccion")   int     tnIdAccion);

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


   public function finalizarpago($tncliente ,$tnTransaccionDePago)
   {
      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Factura/FinalizarPago';
      $data = array( 'tnCliente' =>$tncliente ,'tnTransaccionDePago'=> $tnTransaccionDePago , 'tcApp'=>2);
      $this->cargarlog("finalizarpago".json_encode($data));
      //print_r($data);
      
      /*
      @POST(cPagoFacilPHP + "/Factura/FinalizarPago")
      @FormUrlEncoded
      Call<mPaquetePagoFacil<mFacturaPagado>> finalizarPagoPHP(
              @Field("tnCliente")                 long    tnCliente,
              @Field("tnTransaccionDePago")       long    tnTransaccionDePago);*/


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

   public function consultarestadodetransaccion( $tncliente,$tnEmpresa,$tnTransaccionDePago)
   {

      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Factura/consultarEstadoTransaccion';
      $data = array( 'tnCliente' =>$tncliente ,'tnEmpresa'=> $tnEmpresa ,'tnTransaccionDePago'=>$tnTransaccionDePago,'tnCaller' => $tncliente , 'tnIdAccion' => 0  , 'tcApp'=>2);      
      /*
      Call<mPaquetePagoFacil<EstadoPago>> consultarEstadoTransaccion(
            @Field("tnCliente")             long    tnCliente,
            @Field("tnEmpresa")             long    tnEmpresa,
            @Field("tnTransaccionDePago")   long    tnTransaccionDePago,
            @Field("tnCaller")              long    tnCaller,
            @Field("tnIdAccion")            int     tnIdAccion);*/
      $header = array(
         "Content-Type: application/x-www-form-urlencoded",
         "Content-Length: ".strlen( http_build_query($data))
         );
      // use key 'http' even if you send the request to https://...
      $options = array('http' => array
                     (
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


   public function recuperarqr($tncliente,$tcNroPago)
   {
      //http://serviciopagofacil.syscoop.com.bo/api/Factura/BCP_ConsultaQR
      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Factura/BCP_ConsultaQR';
      //tnCliente, tnTransaccion, tcApp
      $data = array( 'tnCliente' =>$tncliente ,'tnTransaccion'=> $tcNroPago , 'tcApp'=>2);
      //print_r($data);
      
      /*
 @POST(cPagoFacilPHP + "/Factura/consultarEstadoTransaccion")
    @FormUrlEncoded
    Call<mPaquetePagoFacil<EstadoPago>> consultarEstadoTransaccion(
            @Field("tnCliente")             long    tnCliente,
            @Field("tnEmpresa")             long    tnEmpresa,
            @Field("tnTransaccionDePago")   long    tnTransaccionDePago,
            @Field("tnCaller")              long    tnCaller,
            @Field("tnIdAccion")            int     tnIdAccion);*/


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

   public function actualizardatospagofacil($tnCliente , $tcNombre  , $tcApellido , $tcDireccion , $tcCinit , $tcFacturaA , $tnTelefono , $tnTelefonoDePago)
    {

      //http://serviciopagofacil.syscoop.com.bo/api/Factura/BCP_ConsultaQR
      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Usuario/actualizarUsuario';
      //tnCliente, tnTransaccion, tcApp
      $data = array( 'tnCliente' =>$tnCliente ,'tcNombre'=> $tcNombre  , 'tcApellido' => $tcApellido ,'tcDireccion' => $tcDireccion ,'tcCinit' => $tcCinit ,'tcFacturaA' => $tcFacturaA ,'tnTelefono' => strval($tnTelefono) ,'tnTelefonoDePago' => strval($tnTelefonoDePago  ) , 'tcApp'=>2 );
      
      //print_r($data);
      
      /*

      @POST(cPagoFacilPHP + "/Usuario/actualizarUsuario")
      @FormUrlEncoded
      Call<mPaquetePagoFacil<Integer>> updateUser(
              @Field("tnCliente")         long    tnCliente,
              @Field("tcNombre")          String  tcNombre,
              @Field("tcApellido")        String  tcApellido,
              @Field("tcDireccion")       String  tcDireccion,
              @Field("tcCinit")           String  tcCinit,
              @Field("tcFacturaA")        String  tcFacturaA,
              @Field("tnTelefono")        Long    tnTelefono,
              @Field("tnTelefonoDePago")  Long    tnTelefonoDePago);
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


    public function generarqr($tnCliente , $tnEmpresa ,$tcCodigoClienteEmpresa ,$tnMetodoPago , $tnTelefono ,$tcFacturaA , $tnCiNit ,$tcNroPago , $tnMontoClienteEmpresa , $tnMontoClienteSyscoop ,$tcPeriodo ,$tcImei ,  $taEntidades ) 
    {
 
       $url = 'http://serviciopagofacil.syscoop.com.bo/api/Factura/BCP_GenerarQR_V2';
       $data = array('tnCliente' => strval($tnCliente )  , 'tnEmpresa' => $tnEmpresa ,  'tcCodigoClienteEmpresa' => $tcCodigoClienteEmpresa , 'tnMetodoPago'=> $tnMetodoPago , 'tnTelefono'=> $tnTelefono , 'tcFacturaA'=> $tcFacturaA , 'tnCiNit'=> $tnCiNit ,'tcNroPago'=> $tcNroPago ,'tnMontoClienteEmpresa' => $tnMontoClienteEmpresa  ,'tnMontoClienteSyscoop' => $tnMontoClienteSyscoop ,'tcPeriodo'=>$tcPeriodo ,'tcImei'=> $tcImei ,'tcApp'=>2 ,  'taEntidades'=>  $taEntidades );
       $this->cargarlog("generarqr".json_encode($data));
       /*echo "<pre>";
       print_r(json_encode($data));
       echo "</pre>";
       */
       // $data = array('tnEmpresa' => $id_empresa , 'tcCodigoClienteEmpresa' => $codigo_fijo  ,'tnCliente' => $this->session->userdata('cliente') , 'tnFactura'=> $factura  );
 
       /*    
            @POST(cPagoFacilPHP + "/Factura/BCP_GenerarQR")
     @FormUrlEncoded
     Call<mPaquetePagoFacil<String>> BCP_GenerarQR(
             @Field("tnCliente")                 long    tnCliente,
             @Field("tnEmpresa")                 long    tnEmpresa,
             @Field("tcCodigoClienteEmpresa")    String  tcCodigoClienteEmpresa,
             @Field("tnMetodoPago")              int     tnMetodoPago,
             @Field("tnTelefono")                String  tnTelefono,
             @Field("tcFacturaA")                String  tcFacturaA,
             @Field("tnCiNit")                   String  tnCiNit,
             @Field("tcNroPago")                 String  tcNroPago,
             @Field("tnMontoClienteEmpresa")     Double  tnMontoClienteEmpresa,
             @Field("tnMontoClienteSyscoop")     Double  tnMontoClienteSyscoop,
             @Field("tcPeriodo")                 String  tcPeriodo,
             @Field("tcImei")                    String  tcImei);
 
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

   
    public function generarqrbnb($tnCliente , $tnEmpresa ,$tcCodigoClienteEmpresa ,$tnMetodoPago , $tnTelefono ,$tcFacturaA , $tnCiNit ,$tcNroPago , $tnMontoClienteEmpresa , $tnMontoClienteSyscoop ,$tcPeriodo ,$tcImei ,  $taEntidades ) 
    {
 
      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Factura/BNB_GenerarQR';
       $data = array('tnCliente' => strval($tnCliente )  , 'tnEmpresa' => $tnEmpresa ,  'tcCodigoClienteEmpresa' => $tcCodigoClienteEmpresa , 'tnMetodoPago'=> $tnMetodoPago , 'tnTelefono'=> $tnTelefono , 'tcFacturaA'=> $tcFacturaA , 'tnCiNit'=> $tnCiNit ,'tcNroPago'=> $tcNroPago ,'tnMontoClienteEmpresa' => $tnMontoClienteEmpresa  ,'tnMontoClienteSyscoop' => $tnMontoClienteSyscoop ,'tcPeriodo'=>$tcPeriodo ,'tcImei'=> $tcImei ,'tcApp'=>2 ,  'taEntidades'=>  $taEntidades );
       //$this->cargarlog("generarqr".json_encode($data));
       /*echo "<pre>";
       print_r(json_encode($data));
       echo "</pre>";
       */
       // $data = array('tnEmpresa' => $id_empresa , 'tcCodigoClienteEmpresa' => $codigo_fijo  ,'tnCliente' => $this->session->userdata('cliente') , 'tnFactura'=> $factura  );
 
       /*    
            @POST(cPagoFacilPHP + "/Factura/BCP_GenerarQR")
     @FormUrlEncoded
     Call<mPaquetePagoFacil<String>> BCP_GenerarQR(
             @Field("tnCliente")                 long    tnCliente,
             @Field("tnEmpresa")                 long    tnEmpresa,
             @Field("tcCodigoClienteEmpresa")    String  tcCodigoClienteEmpresa,
             @Field("tnMetodoPago")              int     tnMetodoPago,
             @Field("tnTelefono")                String  tnTelefono,
             @Field("tcFacturaA")                String  tcFacturaA,
             @Field("tnCiNit")                   String  tnCiNit,
             @Field("tcNroPago")                 String  tcNroPago,
             @Field("tnMontoClienteEmpresa")     Double  tnMontoClienteEmpresa,
             @Field("tnMontoClienteSyscoop")     Double  tnMontoClienteSyscoop,
             @Field("tcPeriodo")                 String  tcPeriodo,
             @Field("tcImei")                    String  tcImei);
 
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
  
    public function  genentidadesfinancieras($tnCliente)
    {
       $url = 'http://serviciopagofacil.syscoop.com.bo/api/Factura/getEntidadesFinancieras';
       $data = array('tnCliente' => strval($tnCliente ) , 'tcApp'=>2 );
       /* echo "<pre>";
       print_r(json_encode($data));
       echo "</pre>";
       */
      // $data = array('tnEmpresa' => $id_empresa , 'tcCodigoClienteEmpresa' => $codigo_fijo  ,'tnCliente' => $this->session->userdata('cliente') , 'tnFactura'=> $factura  );
 
       /*    
        @POST(cPagoFacilPHP + "/Factura/getEntidadesFinancieras")
     @FormUrlEncoded
     Call<mPaquetePagoFacil<ArrayList<mEntidadFinanciera>>> getEntidadesFinancieras(
             @Field("tnCliente")                 long    tnCliente);
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
   
    public function  getultimasutilizadas($tncliente)
    {
 
       $url = 'http://serviciopagofacil.syscoop.com.bo/api/Factura/getEntFinUtilizadas';
       $data = array('tnCliente' => $tncliente , 'tcApp'=>2  );
    
       /*    
            
     @POST(cPagoFacilPHP + "/Factura/getEntFinUtilizadas")
     @FormUrlEncoded
     Call<mPaquetePagoFacil<ArrayList<Integer>>> getEntFinUtilizadas(
             @Field("tnCliente")                 long    tnCliente);             String  tcImei);
 
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

    public function realizarpagotigo($tnCliente  , $tnEmpresa ,$tcCodigoClienteEmpresa , $tnMetodoPago , $tnTelefono, $tcFacturaA,  $tnCiNit, $tnFactura , $tcMonto ,  $tcComision , $tcImei , $tcPeriodo) 
    {
      /*$tcFirma= $request->input('tcFirma');
      $tcParametros= $request->input('tcParametros');*/
      $url ='http://serviciopagofacil.syscoop.com.bo/api/Factura/realizarPago';
      $data = array( 'tnCliente' => $tnCliente , 'tnEmpresa'=> $tnEmpresa , 'tcCodigoClienteEmpresa'=> "$tcCodigoClienteEmpresa", 'tnMetodoPago'=> intval($tnMetodoPago) , 'tnTelefono'=>intval($tnTelefono), 'tcFacturaA'=>$tcFacturaA, 'tnCiNit'=> intval($tnCiNit), 'tnFactura'=> intval($tnFactura) , 'tcMonto' => "$tcMonto" , 'tcComision'=> "$tcComision" , 'tnIdAccion'=> 24 ,'tcImei'=>  $tcImei ,'tcApp'=>2,'tcPeriodo' =>(String) $tcPeriodo ) ;
      $this->cargarlog("realizarpagotigomoney".json_encode($data));
      /*
       @POST(cPagoFacilPHP + "/Empresa/listarMetodosDePago")
         @FormUrlEncoded
         {"tnCliente":3859,
         "tnEmpresa":36
         "tcComision":"0",
         "tnIdAccion":1
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
    public function getbilletera($tnCliente,$tnEmpresa)
    {
      $url ='http://serviciopagofacil.syscoop.com.bo/api/Usuario/getBilletera';
      $data = array( 'tnCliente' => $tnCliente , 'tnEmpresa'=> $tnEmpresa , 'tnIdentificador'=> $tnCliente, 'tnIdAccion'=> 2  ) ;
      /*  
    @POST(cPagoFacilPHP + "/Usuario/getBilletera")
    @FormUrlEncoded
    Call<mPaquetePagoFacil<ArrayList<Billetera>>> getBilletera(
            @Field("tnCliente")         long    tnCliente,
            @Field("tnIdentificador")   long    tnIdentificador,
            @Field("tnIdAccion")        int     tnIdAccion);
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

    public function getempresaspagadasfrecuentes($tnCliente)
    {
      $url ='http://serviciopagofacil.syscoop.com.bo/api/Empresa/listarEmpresasPagadasYFrecuentes';
      $data = array( 'tnCliente' => $tnCliente ) ;
      /*  
    @POST(cPagoFacilPHP + "/Usuario/getBilletera")
    @FormUrlEncoded
    Call<mPaquetePagoFacil<ArrayList<Billetera>>> getBilletera(
            @Field("tnCliente")         long    tnCliente,
            @Field("tnIdentificador")   long    tnIdentificador,
            @Field("tnIdAccion")        int     tnIdAccion);
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
    public function getcodigosservicio($tnCliente, $tnEmpresa)
    {
      $url ='http://serviciopagofacil.syscoop.com.bo/api/Empresa/listarCodigoCliente';
      $data = array( 'tnCliente' => $tnCliente ,'tnEmpresa'=> $tnEmpresa , 'tcCodigoClienteEmpresa'=>"0" ) ;
      /*  
[13:21, 18/8/2020] Victorhugo Syscoop: @Field("tnCliente")     long cliente,
            @Field("tnEmpresa")    long empresa,
            @Field("tcCodigoClienteEmpresa") String tcCodigoClienteEmpresa);
[13:21, 18/8/2020] Victorhugo Syscoop: recibe esos 3 parametros
[13:21, 18/8/2020] Victorhugo Syscoop: el tcCodigoClienteEmpresa envia "0"
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
    public function getfacturaspagadas( $tnCliente, $tnEmpresa ,$tcCodigoClienteEmpresa )
    {
      $url ='http://serviciopagofacil.syscoop.com.bo/api/Factura/listarFacturasPagadas';
      $data = array( 'tnCliente' => intval($tnCliente) ,'tnEmpresa'=>intval($tnEmpresa) , 'tcCodigoClienteEmpresa'=>"$tcCodigoClienteEmpresa" ) ;
  
       
      
      /*  
@Field("tnEmpresa")                 long    empresa,
            @Field("tnCliente")                 long    cliente,
            @Field("tcCodigoClienteEmpresa")    String  tcCodigoClienteEmpresa);
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
    
    public function enviarfacturacorreo( $tnCliente, $tnEmpresa ,$tnTransaccion , $tcCorreo )
    {
      $url ='http://serviciopagofacil.syscoop.com.bo/api/Factura/EnviarFacturasCorreoEspecifico';
      $data = array( 'tnCliente' => intval($tnCliente) ,'tnEmpresa'=>intval($tnEmpresa) , 'tnTransaccion'=>$tnTransaccion ,'tnIdAccion'=> 1  , 'tcCorreo'=> $tcCorreo , 'tnIdAccion'=> 2  ) ;
    
     
      /*  

    @POST(cPagoFacilPHP + "/Factura/EnviarFacturasCorreoEspecifico")
    @FormUrlEncoded
    Call<mPaquetePagoFacil<Integer>> enviarFacturasCorreoEspecifico(
            @Field("tnTransaccion")             long    tnTransaccion,
            @Field("tcCorreo")                  String  tcCorreo,
            @Field("tnCliente")                 int     tnCliente,
            @Field("tnEmpresa")                 int     tnEmpresa,
            @Field("tnIdAccion")                int     tnIdAccion);
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

    public function getfacturapagofacil($tnTransaccionDePago, $tnEmpresa,$tnFactura,$tnCliente)
    {
       $url = 'http://serviciopagofacil.syscoop.com.bo/api/Factura/ObtenerFacturaEmpresaPDF2';
       $data = array('tnCliente' => $tnCliente  ,'tnFactura' => $tnFactura , 'tnTransaccionDePago'=> $tnTransaccionDePago ,'tnEmpresa'=> $tnEmpresa , 'tcApp'=>2   );
 
       /*  @POST(cPagoFacilPHP + "/Factura/ObtenerFacturaEmpresaPDF2")
    @FormUrlEncoded
    Call<mPaquetePagoFacil<FacturaPDF>> getFacturaPagoFacilPDF_PHP(
            @Field("tnCliente")             long tnCliente,
            @Field("tnEmpresa")             long tnEmpresa,
            @Field("tnTransaccionDePago")   long tnTransaccionDePago,
            @Field("tnFactura")             String tnFactura);
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
    public function getfacturaempresa($tnTransaccionDePago, $tnEmpresa,$tnFactura,$tnCliente)
    {
       $url = 'http://serviciopagofacil.syscoop.com.bo/api/Factura/ObtenerFacturaPDF2';
       $data = array('tnCliente' => $tnCliente  ,'tnFactura' => $tnFactura , 'tnTransaccionDePago'=> $tnTransaccionDePago ,'tnEmpresa'=> $tnEmpresa , 'tcApp'=>2   );
       $this->cargarlog("getfacturaempresa".json_encode($data));
 
       /*  
    @POST(cPagoFacilPHP + "/Factura/ObtenerFacturaPDF2")
    @FormUrlEncoded
    Call<mPaquetePagoFacil<FacturaPDF>> getFacturaEmpresaPDF_PHP(
            @Field("tnCliente")             long tnCliente,
            @Field("tnEmpresa")             long tnEmpresa,
            @Field("tnTransaccionDePago")   long tnTransaccionDePago,
            @Field("tnFactura")             String tnFactura);
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

    public function getmetodospago($tncliente)
    {
      
      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Empresa/listarMetodosDePago';
      $data = array( 'tnCliente' =>$tncliente   );
      //print_r($data);
      
      /*
       @POST(cPagoFacilPHP + "/Empresa/listarMetodosDePago")
      @FormUrlEncoded
      Call<mPaquetePagoFacil<ArrayList<mMetodoPagoSimple>>> listarMetodosDePago(
              @Field("tnCliente")     int tnCliente);

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
    public function EmpresasDetalle($tnEmpresa,$tnCliente)
    {
       $url = 'http://serviciopagofacil.syscoop.com.bo/api/Empresa/listarEmpresasDetalle';
       $data = array('tnCliente' => $tnCliente  ,'tnEmpresa'=> $tnEmpresa   );
 
       /*  
    @POST(cPagoFacilPHP + "/Factura/ObtenerFacturaPDF2")
    @FormUrlEncoded
    Call<mPaquetePagoFacil<FacturaPDF>> getFacturaEmpresaPDF_PHP(
            @Field("tnCliente")             long tnCliente,
            @Field("tnEmpresa")             long tnEmpresa,
            @Field("tnTransaccionDePago")   long tnTransaccionDePago,
            @Field("tnFactura")             String tnFactura);
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
    public function listarempresasfull($tnCliente)
    {
       $url = 'http://serviciopagofacil.syscoop.com.bo/api/Empresa/listarEmpresasFull';
       $data = array('tnCliente' => $tnCliente  ,'tcFiltro'=> "1"   );
 
       /*  
    @POST(cPagoFacilPHP + "/Factura/ObtenerFacturaPDF2")
    @FormUrlEncoded
    Call<mPaquetePagoFacil<FacturaPDF>> getFacturaEmpresaPDF_PHP(
            @Field("tnCliente")             long tnCliente,
            @Field("tnEmpresa")             long tnEmpresa,
            @Field("tnTransaccionDePago")   long tnTransaccionDePago,
            @Field("tnFactura")             String tnFactura);
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
    public function getubicaciones($tnCliente)
    {
       $url = 'http://serviciopagofacil.syscoop.com.bo/api/Usuario/getAllPuntosPagoFacil';
       $data = array('tnCliente' => $tnCliente);
       /*  
    @POST(cPagoFacilPHP + "/Factura/ObtenerFacturaPDF2")
    @FormUrlEncoded
    Call<mPaquetePagoFacil<FacturaPDF>> getFacturaEmpresaPDF_PHP(
            @Field("tnCliente")             long tnCliente,
            @Field("tnEmpresa")             long tnEmpresa,
            @Field("tnTransaccionDePago")   long tnTransaccionDePago,
            @Field("tnFactura")             String tnFactura);
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
  
    public function consultarfacturaempresa($tnEmpresa,$tnFactura)

    {

      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Factura/ConsultarFacturaEmpresa2';
      $data = array('tnEmpresa' => $tnEmpresa, 'tnFactura' => $tnFactura );
      /*  
         http://serviciopagofacil.syscoop.com.bo/api/Factura/ConsultarFacturaEmpresa2?tnEmpresa=2&tnFactura=4582150 */
      
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

    public function GuardarEntidadesBancarias($tnCliente , $tcEntidades, $tnTransaccion  )
{

   $url = 'http://serviciopagofacil.syscoop.com.bo/api/Transaccion/guardarEntidadesBancarias';
   $data = array( 'tnCliente' =>$tnCliente , 'tcEntidades'=>  json_encode($tcEntidades)  ,'tnTransaccion' =>$tnTransaccion ,  'tnApp'=>3 );
   $this->cargarlog("guardarentidadbancaria".json_encode($data));
   
 /*    
  tnCliente
tcEntidades
tnTransaccion
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
public function getbilleterasdependientes($tnCliente,$tnIdentificador)
    {
      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Usuario/getBilleterasDependientes';
      $data = array('tnCliente' => $tnCliente, 'tnIdentificador' => $tnIdentificador );
      /*  
        @POST(cPagoFacilPHP + "/Usuario/getBilleterasDependientes")
      @FormUrlEncoded
      Call<mPaquetePagoFacil<ArrayList<Billetera>>> getBilleterasDependientes(
              @Field("tnCliente")         long tnCliente,
              @Field("tnIdentificador")   long tnIdentificador);  */
      
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
    public function getbilleterausuario($tnCliente)
    {
      $url = 'http://serviciopagofacil.syscoop.com.bo/api/Usuario/getBilletera';
       $data = array('tnCliente' => $tnCliente, 'tnIdentificador' => $tnCliente, 'tnIdAccion' => 0);
       $this->cargarlog("getbilleterausuario".json_encode($data));
       /*  
      @POST(cPagoFacilPHP + "/Usuario/getBilletera")
      @FormUrlEncoded
      Call<mPaquetePagoFacil<ArrayList<Billetera>>> getBilletera(
              @Field("tnCliente")         long    tnCliente,
              @Field("tnIdentificador")   long    tnIdentificador,
              @Field("tnIdAccion")        int     tnIdAccion);
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

    public function get_trancaccioneslinkser($tncliente)
{
   $url = 'http://serviciopagofacil.syscoop.com.bo/api/Factura/getTransaccionesLinkser';
   $data = array( 'tnCliente' =>$tncliente   );
   //print_r($data);
   
   /*
    @POST(cPagoFacilPHP + "/Factura/calcularComision")    @FormUrlEncoded
 Call<mPaquetePagoFacil<Double>> calcularComision
         (@Field("tnEmpresa")    long    empresa,
          @Field("tnCliente")    long    cliente,
          @Field("tnMetodoPago") long    metodoPago,
          @Field("tcMonto")      String  monto,
          @Field("tnIdAccion")   int     tnIdAccion);

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

public function listarmaspagadas($tncliente)
{
   $url = 'http://serviciopagofacil.syscoop.com.bo/api/Empresa/listarEmpresasMasPagadas';
   $data = array( 'tnCliente' =>$tncliente , 'tnAccion' => 94   );
   //print_r($data);
   
   /*

    @POST(cPagoFacilPHP + "/Empresa/listarEmpresasMasPagadas")
    @FormUrlEncoded
    Call<mPaquetePagoFacil<ArrayList<EmpresaFull>>> ListarEmpresasMasPagadas(
            @Field("tnCliente")     long    cliente,
            @Field("tnAccion")      int     tnAccion);
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

public function actualizarperfilfrecuente($tnCliente,$tnPerfilFrecuente){
   $url = 'http://serviciopagofacil.syscoop.com.bo/api/Usuario/actualizarPerfilFrecuente';
   $data = array( 'tnCliente' =>$tnCliente , 'tnPerfilFrecuente' => $tnPerfilFrecuente   );
   //print_r($data);
   
   /*

      @POST(cPagoFacilPHP + "/Usuario/actualizarPerfilFrecuente")
    @FormUrlEncoded
    Call<Void> ActualizarPerfilFrecuente(
            @Field("tnCliente") long cliente,
            @Field("tnPerfilFrecuente") boolean tnPerfilFrecuente);
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

public function getPuntoCobranza($tnCliente){
   $url = 'http://serviciopagofacil.syscoop.com.bo/api/Usuario/getPuntoDeCobranza';
   $data = array( 'tnCliente' =>$tnCliente    );
   //print_r($data);
   
   /*
@POST(cPagoFacilPHP + "/Usuario/getPuntoDeCobranza")
@FormUrlEncoded
Call<mPaquetePagoFacil<ArrayList<PuntoCobranza>>> getPuntoCobranza(
        @Field("tnCliente")         long    tnCliente,
        @Field("tnIdAccion")        int     tnIdAccion);;
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

public function ListarEmpresas2($tnCliente){
   $url = 'http://serviciopagofacil.syscoop.com.bo/api/Empresa/listarEmpresas2';
   $data = array( 'tnCliente' =>$tnCliente    );
   //print_r($data);
   
   /*
@POST(cPagoFacilPHP + "/Empresa/listarEmpresas2")
    @FormUrlEncoded
    Call<mPaquetePagoFacil<ArrayList<mEmpresa>>> listarEmpresas2(
            @Field("tnCliente")     long    cliente)
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

public function reportebilletera($tnCliente  ,$tcFechaInicial  , $tcfechaFinal , $tnBilletera ){
  // $url = 'http://190.186.90.42/ServicioSyscoopPagoFacil2/Usuario/getReporteBilletera2';
   $url = 'http://serviciopagofacil.syscoop.com.bo/api/Usuario/getReporteBilletera2';
   
   $data = array( 'tnCliente' =>$tnCliente  ,  'tcFechaInicial' =>"$tcFechaInicial" , 'tcfechaFinal' =>"$tcfechaFinal" , 'tnBilletera' => intval($tnBilletera) );
   $this->cargarlog("reportebilletera".json_encode($data));
   //print_r($data);
   
   /*

@POST(PagoFacil + "/Usuario/getReporteBilletera2")
    @FormUrlEncoded
    Call<mPaquetePagoFacil<FacturaPDF>> getReporteBilletera(
            @Field("tnCliente")         long    cliente,
            @Field("tcFechaInicial")    String  fechaInicial,
            @Field("tcfechaFinal")      String  fechaFinal,
            @Field("tnBilletera")       int     idBilletera);
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

public function reportecomisiones($tnCliente)
{

   $url = 'http://serviciopagofacil.syscoop.com.bo/api/Usuario/getComisionesBilletera';
   $data = array( 'tnCliente' =>$tnCliente   );
   $this->cargarlog("reportecomisiones".json_encode($data));
   //print_r($data);
   
   /*

   @POST(cPagoFacilPHP + "/Usuario/getComisionesBilletera")
   @FormUrlEncoded
   Call<mPaquetePagoFacil<ArrayList<Comision>>> getComisionesBilletera(
           @Field("tnCliente")         long tnCliente);
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


public function jwtvalidation($tcJWT , $tnMetodoPago , $taDataCardinal)
{
 
   $url = 'https://serviciopagofacil.syscoop.com.bo/api/jwt_validation';
   $data = array( 'tcJWT' => $tcJWT , 'tnMetodoPago' => $tnMetodoPago  , 'taDataCardinal'=>$taDataCardinal   );
   $this->cargarlog("jwtvalidation".json_encode($data));

   /*

//https://serviciopagofacil.syscoop.com.bo/api/jwt_validation


tcJWT
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

public function realizarpagoatc($datos)
{
 
   $url = 'https://serviciopagofacil.syscoop.com.bo/api/pay/cybersource_RealizarPago';
   $data = $datos ;// array( 'tcJWT' => $tcJWT   );
   $this->cargarlog("realizarpagoatc".json_encode($data));

   /*

//https://serviciopagofacil.syscoop.com.bo/api/jwt_validation


tcJWT
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


public function cybersourseinit($tcApiRest, $tnCantidad , $tnMetodoPago)
{
 
 /*  [9:00, 5/1/2021] Huga Syscoop: 
tnCantidad
[9:01, 5/1/2021] Huga Syscoop: tcApiRest
*/
   $url = 'https://serviciopagofacil.syscoop.com.bo/api/pay/cybersource_Init';
   $data = array( 'tcApiRest' => $tcApiRest , 'tnMetodoPago' => $tnMetodoPago  ,  'tnCantidad' => intval($tnCantidad ));
   $this->cargarlog("cybersourseinit".json_encode($data));

   /*guardarUbicacionDePago(Request $request) 
    {
        $tnCliente = $request->input('tnCliente');
        $tnEmpresa = $request->input('tnEmpresa');
        $tnTransaccion = $request->input('tnTransaccion');
        $tcLatitud = $request->input('tcLatitud');
        $tcLongitud = $request->input('tcLongitud');
        $tcIPv4 = $request->input('tcIPv4');


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

public function getpaises($tncliente)
{
   $url = 'https://serviciopagofacil.syscoop.com.bo/api/getPaises';
   $data = array( 'tnCliente' =>$tncliente   );
   //print_r($data);
   
   /*
    @POST(cPagoFacilPHP + "/Factura/calcularComision")    @FormUrlEncoded
 Call<mPaquetePagoFacil<Double>> calcularComision
         (@Field("tnEmpresa")    long    empresa,
          @Field("tnCliente")    long    cliente,
          @Field("tnMetodoPago") long    metodoPago,
          @Field("tcMonto")      String  monto,
          @Field("tnIdAccion")   int     tnIdAccion);

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


public function getestados($tncliente,$tnPais)
{
   $url = 'https://serviciopagofacil.syscoop.com.bo/api/getEstadosDePaises';
   $data = array( 'tnCliente' =>$tncliente , 'tnPais'=> intval($tnPais) );
   //print_r($data);
   
   /*
   @POST(cPagoFacilPHP + "/Factura/calcularComision")    @FormUrlEncoded
Call<mPaquetePagoFacil<Double>> calcularComision
         (@Field("tnEmpresa")    long    empresa,
         @Field("tnCliente")    long    cliente,
         @Field("tnMetodoPago") long    metodoPago,
         @Field("tcMonto")      String  monto,
         @Field("tnIdAccion")   int     tnIdAccion);

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

public function getciudades($tncliente,$tnPais)
{
   $url = 'https://serviciopagofacil.syscoop.com.bo/api/getCiudades';
   $data = array( 'tnCliente' =>$tncliente , 'tnPais'=> intval($tnPais) );
   //print_r($data);
   
   /*
   @POST(cPagoFacilPHP + "/Factura/calcularComision")    @FormUrlEncoded
Call<mPaquetePagoFacil<Double>> calcularComision
         (@Field("tnEmpresa")    long    empresa,
         @Field("tnCliente")    long    cliente,
         @Field("tnMetodoPago") long    metodoPago,
         @Field("tcMonto")      String  monto,
         @Field("tnIdAccion")   int     tnIdAccion);

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



public function guardarUbicacionDePago($tnCliente  ,  $tnEmpresa,$tnTransaccion, $tcLatitud ,$tcLongitud ,$tcIPv4 )
{
   $url = 'http://serviciopagofacil.syscoop.com.bo/api/Factura/guardarUbicacionDePago';
   $data = array( 'tnCliente' =>$tnCliente  , 'tnEmpresa' => $tnEmpresa,'tnTransaccion'=>$tnTransaccion, 'tcLatitud'=>$tcLatitud ,'tcLongitud' =>$tcLongitud ,'tcIPv4' =>$tcIPv4 );
   $this->cargarlog("guardarUbicacionDePago".json_encode($data));

   /*guardarUbicacionDePago(Request $request) 
    {
        $tnCliente = $request->input('tnCliente');
        $tnEmpresa = $request->input('tnEmpresa');
        $tnTransaccion = $request->input('tnTransaccion');
        $tcLatitud = $request->input('tcLatitud');
        $tcLongitud = $request->input('tcLongitud');
        $tcIPv4 = $request->input('tcIPv4');


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


public function verificarqr($tnCliente , $tnTransaccion )
{

   $url = 'https://serviciopagofacil.syscoop.com.bo/api/Transaccion/getTransaccionDePago';
   $data = array('tnCliente' => strval($tnCliente )  , 'tnTransaccion' => $tnTransaccion , 'tcApp'=>3 );
   $this->cargarlog("verificarqr".json_encode($data));

   
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

public function getmetodosbygrupos($tnEmpresa, $tcLink)
{
   $url = 'http://serviciopagofacil.syscoop.com.bo/api/MetodoPago/getMetodoPagobyGrupo';
   $data = array( 'tnEmpresa' =>$tnEmpresa  , 'tcApp'=>3 , 'tcLink'=>$tcLink );
   $this->cargarlog("getmetodosbygrupos".json_encode($data));

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


public function getmetodosbyToken($tnTokenService)
{
   $url = 'http://serviciopagofacil.syscoop.com.bo/api/MetodoPago/TokenMetodoPagoEmpresa';
   $data = array( 'tnTokenService' =>$tnTokenService  , 'tcApp'=>3  );
   //$this->cargarlogservicio("getmetodosbygrupos".json_encode($data));

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
    public function cargarlog($Mensajeerror)
    {
       $mes=date("M");
      $logFile = fopen("logservicio$mes.txt", 'a') or die("Error creando archivo");
      fwrite($logFile, "\n".date("d/m/Y H:i:s").$Mensajeerror) or die("Error escribiendo en el archivo");
      fclose($logFile);
    }

    

    public function getcriteriobusquedahub($tnEmpresa )
    {
    
       $url= 'http://serviciopagofacil.syscoop.com.bo/api/HubPago/getcriteriobusqueda';
       $data = array( 'tnEmpresa' =>$tnEmpresa  );
       $this->cargarlog("getcriteriobusquedahub =".json_encode($data));

    
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

    public function GuardarTransaccionPago($tnCliente , $tnTransaccion  ,$tnNroWhatsapp , $tcCorreo  )
    {
    
       $url= 'http://serviciopagofacil.syscoop.com.bo/api/Transaccion/guardarTransaccionDePagoEnvio';
       $data = array( 'tnCliente' =>$tnCliente , 'tnTransaccion'=> $tnTransaccion  ,'tnNroWhatsapp' =>$tnNroWhatsapp ,'tcCorreo' => $tcCorreo ,'tnCaller' => $tnCliente , 'tnApp'=>3 );
       $this->cargarlog("GuardarTransaccionPago =".json_encode($data));
       
       
     /*    
       $https://serviciopagofacil.syscoop.com.bo/api/Transaccion/guardarTransaccionDePagoEnvio
    
          tnCliente=573
          tnTransaccion=58600
          tnNroWhatsapp=0
          tcCorreo=ejemplo2@gmail.com
          tnCaller=573
          tnApp=3
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

    public function MandarAyudaQr($tnTransaccion )
    {
    
       $url= 'https://serviciopagofacil.syscoop.com.bo/api/ServicioWhatsapp/MandarAyudaWhatsappQr';
       $data = array( 'tnTransaccionDePago'=> $tnTransaccion  );
       
      /*    
       $https://serviciopagofacil.syscoop.com.bo/api/Transaccion/guardarTransaccionDePagoEnvio
    
          tnCliente=573
          tnTransaccion=58600
          tnNroWhatsapp=0
          tcCorreo=ejemplo2@gmail.com
          tnCaller=573
          tnApp=3
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
 

    public function getBusquedaClienteGeneral($tnEmpresa,$tcCodigo,$tnCriterio)
   {
      $url = 'http://serviciopagofacil.syscoop.com.bo/api/HubPago/getbusquedaclientes';
      $data = array('tnEmpresa' => $tnEmpresa , 'tcCodigoClienteEmpresa' => strval($tcCodigo)  , 'tcDocIdUsuario' => strval($tcCodigo)  ,'tnCriterio' => $tnCriterio ,'tnCliente' => 1 ,  'tcApp'=>2  );
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


}



?>