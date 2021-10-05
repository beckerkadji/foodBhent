<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    //function

    public function index()
    {
        if($this->session->userdata('pseudo') != '')
        {
          redirect('Home');
        }
        else
        {
          $this->load->view("register_view");
        }
        
    }

    public function inscription_validation(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('firstname', 'First Name', 'required|alpha');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required|alpha');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('pseudo', 'Pseudo', 'required');
        $this->form_validation->set_rules('sex', 'Sex', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('age', 'Age', 'required');


        if($this->form_validation->run())
        {
            //true
            $this->load->model("users_model");
            $data = array(
                "role" => $this->input->post("role"),
                "firstname" => $this->input->post("firstname"),
                "lastname" => $this->input->post("lastname"),
                "pseudo" => $this->input->post("pseudo"),
                "email" => $this->input->post("email"),
                "age" => $this->input->post("age"),
                "sex" => $this->input->post("sex"),
                "password" => $this->input->post("password")
            );

           $message =  $this->users_model->create_user($data);
           if($message == 'ce nom d\'utilisateur  existe  deja! réessayez avec un autre')
           {
            $erreur = 'ce nom d\'utilisateur  existe  deja! réessayez avec un autre';
            $this->session->set_flashdata('error', 'ce nom d\'utilisateur  existe  deja! inscrivez vous  avec un autre');
            redirect('connect');
           }
            redirect("connect");
        }
        else
        {
            //false
            $data['success'] = 'l\'inscription a échouer. veillez réessayer';
            $this->index($data);
        }
    }

    public function inserted(){

        $data['success'] = 'inscription effectuée avec succès. connectez vous';
        $this->index($data);
    }
  
    public function login_validation()
    {
        $this->load->library('form_validation'); 
        $this->form_validation->set_rules('pseudo', 'Pseudo', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run())
        {
            //true
            $pseudo = $this->input->post('pseudo');
            $password = $this->input->post('password');
            

            //model function
            $this->load->model("users_model");

            if($this->users_model->can_login($pseudo, $password))
            {
                $data = $this->users_model->fetch_data($pseudo);
                foreach($data->result() as $row)
                {
                    $role = $row->role;
                    $userid = $row->userid;
                    $firstname = $row->firstname;
                    $lastname = $row->lastname;
                    $tel = $row->tel;
                    $email = $row->email;
                    $localisation = $row->localisation;
                }
                $session_data = array(
                    'userid' => $userid,
                    'pseudo' => $pseudo,
                    'firstname' => $firstname,
                    'lastname' => $sex,
                    'tel' => $tel,
                    'age' => $age,
                    'email' => $email,
                    'password' => $password,
                    'role' => $role,
                    'localisation' => $localisation
                );
                $this->session->set_userdata($session_data);
                if($this->session->userdata('role') == 'manager')
                {
                    redirect('dashboard_manager');
                }
                elseif($this->session->userdata('role') == 'custom')
                {
                    redirect('dashboard_customer');
                }
                elseif($this->session->userdata('role') == 'delivery_person')
                {
                    redirect('dashboard_delivery_person');
                }
                
            }
            else
            {
                $this->session->set_flashdata('error', 'Nom d\'utilisateur et mot de passe invalide !');
                redirect('connect');
            }
   
        }
        else
        {
            //false
            $this->index();
        }
    }

    public function enter(){
        if($this->session->userdata('pseudo') != '')
        {
            $data['pseudo'] = $this->session->userdata('pseudo');
            $data['name'] = 'manager_content_view';
            $this->load->view('manager_view/dashboard_manager_include_view', $data);
        }
        else
        {
            redirect('dashboard');
        }
    }

    public function logout()
	{
        $this->load->library('cart');
        $this->cart->destroy();
		$this->session->unset_userdata('pseudo');
        redirect('home');
	}

    public function setnumtel()
    {
        $userid =  $this->input->post('userid'); 
        $tel =  $this->input->post('tel');

        $data = array(
            'userid' => $userid,
            'tel' => $tel
        );

        $this->load->model('users_model');
        $this->users_model->setnumtel($data);

        redirect("traitercommand");
    }
   
}


