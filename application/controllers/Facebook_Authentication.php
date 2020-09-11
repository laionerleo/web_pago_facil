<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facebook_Authentication extends CI_Controller {
    function __construct() {
        parent::__construct();
        
        // Load facebook library
        
        $this->load->library('facebook');
        $this->load->library('servicios');

		$this->load->library('user_agent');
        
        //Load user model
    //    $this->load->model('user');
        //echo "entro aqui ";
    }
    
    public function index(){
        $userData = array();
        // Check if user is logged in
        if($this->facebook->is_authenticated()){
            // aqui entra si esta logueado
            // Get user facebook profile details
            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture');

            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid']    = !empty($fbUser['id'])?$fbUser['id']:'';;
            $userData['first_name']    = !empty($fbUser['first_name'])?$fbUser['first_name']:'';
            $userData['last_name']    = !empty($fbUser['last_name'])?$fbUser['last_name']:'';
            $userData['email']        = !empty($fbUser['email'])?$fbUser['email']:'';
            $userData['gender']        = !empty($fbUser['gender'])?$fbUser['gender']:'';
            $userData['picture_url']    = !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:'';
            $userData['profile_url']        = !empty($fbUser['link'])?$fbUser['link']:'';
            
            // Insert or update user data
            //aqui devuelve el id del usuario que se acab de loguear 
            // si el usuario existe debuelve su id , pero en caso de no existir lo que hace es insertarlo y devolver su id 

                //$data['userData'] = $userData;
                // aqui me dice si el ususario no existe se hace un registro parcial a la base dedatos de pagofacil Cliente 
                // luego tendria que pedir esos datos para la session del sistema  y guardarlo en la session
               // echo "entro aqui ";
               $respuesta=$this->servicios->verificar_cuenta($userData['email'] );
              // print_r($respuesta);

               // $this->load->view('prueba', $data);
              // si manda algo igual a 11 significa que el usuario no existe en la base de dtaos 
               
               if(isset($respuesta))
                {

                     // se logueo con exito y tengo sus datos 
                    // aqui debo realiczar el login
                    //echo "entro aqui osea tiene valor ";
                    $data = get_object_vars($respuesta->values);
                    $this->session->set_userdata($data);
                    
                    redirect('es/inicio', 'refresh');

                    
                }
                else{

                    echo "entro aqui osea  no tiene valor y hay que registrarlo  ";
                     //aqui hago el registro parcial 
                  //  echo "entro por aqui  entrada respuesta registro parcial ";
                   $respuesta_registro= $this->servicios->registro_parcial($userData['first_name'],$userData['last_name'],$userData['email']);
                    if( isset($respuesta_registro))
                    {
                        $data = get_object_vars($respuesta_registro->values);
                        $this->session->set_userdata($data);
                        //si el registro manda 1 significa que se registro bien 
                        redirect('/es/inicio', 'refresh');
                    }
                    
                   
                    
                    
                    
                }
                
                

            
            
        }
        redirect('/', 'refresh');
        

    }

    public function logout() {
        // Remove local Facebook session
        $this->facebook->destroy_session();
        // Remove user data from session
        //$this->session->unset_userdata('userData');
        // Redirect to login page
        redirect('login_face');
    }

    

   

 
	
}