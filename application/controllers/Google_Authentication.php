<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Google_Authentication extends CI_Controller
{
    function __construct(){
        parent::__construct();
        
        //load google login library
        $this->load->library('google');
        $this->load->library('servicios');
		$this->load->library('user_agent');
        
        //load user model
     //   $this->load->model('user');
    }
    
    public function index(){
        //redirect to profile page if user already logged in
   try {
     
        
        if(isset($_GET['code'])){
            //authenticate user
            $this->google->getAuthenticate();
            
            //get user info from google
            $gpInfo = $this->google->getUserInfo();
            
            //preparing data for database insertion
            $userData['oauth_provider'] = 'google';
            $userData['oauth_uid']      = $gpInfo['id'];
            $userData['first_name']     = $gpInfo['given_name'];
            $userData['last_name']      = $gpInfo['family_name'];
            $userData['email']          = $gpInfo['email'];
            $userData['gender']         = !empty($gpInfo['gender'])?$gpInfo['gender']:'';
            $userData['locale']         = !empty($gpInfo['locale'])?$gpInfo['locale']:'';
            $userData['profile_url']    = !empty($gpInfo['link'])?$gpInfo['link']:'';
            $userData['picture_url']    = !empty($gpInfo['picture'])?$gpInfo['picture']:'';
            
            $respuesta=$this->servicios->verificar_cuenta($userData['email'] );

             // $this->load->view('prueba', $data);
            // si manda algo igual a 11 significa que el usuario no existe en la base de dtaos 
             
             if(isset($respuesta))
              {

                   // se logueo con exito y tengo sus datos 
                  // aqui debo realiczar el login
                  //echo "entro aqui osea tiene valor ";
                  $data = get_object_vars($respuesta->values);
                  $this->session->set_userdata($data);
                  
                  redirect('es/pagorapido', 'refresh');

                  
              }
              else{

                 // echo "entro aqui osea  no tiene valor y hay que registrarlo  ";
                   //aqui hago el registro parcial 
                //  echo "entro por aqui  entrada respuesta registro parcial ";
                 $respuesta_registro= $this->servicios->registro_parcial($userData['first_name'],$userData['last_name'],$userData['email']);
                  if( isset($respuesta_registro))
                  {
                         $data = get_object_vars($respuesta_registro->values);
                      $this->session->set_userdata($data);
                      //si el registro manda 1 significa que se registro bien 
                      redirect('/es/pagorapido', 'refresh');
                 
                   
                  }
redirect('es/pagorapido', 'refresh');
                  
                 
                  
                  
                  
              }

        } 
        
  } catch (\Throwable $th) {
            //throw $th;
            echo $th->getLine();
            echo $th->getMessage();
        }

     
    }
    
    public function profile(){
        //redirect to login page if user not logged in
        if(!$this->session->userdata('loggedIn')){
            redirect('/user_authentication/');
        }
        
        //get user info from session
        $data['userData'] = $this->session->userdata('userData');
        
        //load user profile view
        $this->load->view('user_authentication/profile',$data);
    }
    
    public function logout(){
        //delete login status & user info from session

               
        //redirect to login page
        redirect('/user_authentication/');
    }



 
}
