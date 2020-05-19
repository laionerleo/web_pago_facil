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
		$data = array('tnCliente' => 3859);
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
     $data = array('tnIdAccion' => '13'  ,'tnCliente' => 3859  );
     
     

   
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
     $data = array('tnTipoEmpresa' => $id_tipoempresa , 'tnIdAccion' => '91'  ,'tnCliente' => 3859  ,'tnRegion'=>  $id_region);
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
      $data = array('tnTipoEmpresa' => $id_tipoempresa , 'tnIdAccion' => '91'  ,'tnCliente' => 3859 );
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


}



?>