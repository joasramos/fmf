<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed!");
}

/**
 * Description of login
 *
 * @author joasaraujo
 */
class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("usuario");
    }

    public function index() {

        /*
         * Regras de Validação
         */
        $this->load->library('form_validation');


        $this->form_validation->set_rules("username", "Usuário", "required");
        $this->form_validation->set_rules("pass", "Senha", "required");

        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');


        /*
         * GET USER E PASS
         */
        $user = $this->input->post('username');
        $pass = $this->input->post('pass');

        $query = $this->usuario->validate($user, $pass);



        if ($this->form_validation->run() == FALSE) {
            //Carrega view login
            $this->load->view('admin/login');
        } else {
            if (count($query)) {

                $data = array(
                    "username" => $user,
                    "logado" => true,
                    "tipo_usuario" => $query[0]->admin
                );
                
//                print_r($data);
                
                $this->session->set_userdata($data);

                redirect('manager');
            } else {
                redirect($this->index());
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();

        redirect('/', 'refresh');
    }

}
