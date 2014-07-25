<?php

if (!defined('BASEPATH')) {
    exit("No direct script access allowed");
}

class Admin extends MY_Controller {

    public function __construct() {
        parent::__construct("admin");
    }

    public function index() {
        $this->load->css("assets/themes/default/css/bootstrap.min.css");

        if (!$this->session->userdata('session_id') || !$this->session->userdata('logado')) {
            $this->output->set_template("blank");
            $this->load->view("admin/login");
        } else {
            $this->output->set_template("admin");
            $this->load->view("admin/index");
        }
    }

    public function login() {
        $usuario = $this->input->post("login");
        $senha = $this->input->post("senha");

        $this->db->where('user', $usuario);
        $this->db->where('pass', $senha);

        $usuario = $this->db->get("usuario")->result();

        if (count($usuario) == 1) {
            $dados = array("usuario" => $usuario[0]->nome, "logado" => TRUE);
            $this->session->set_userdata($dados);
            $this->load->view("admin/index");
        } else {
           echo "OPS";
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect("admin/index");
    }

    public function drop() {
        
    }

    public function find() {
        
    }

    public function insert() {
        
    }

    public function setObject() {
        
    }

    public function update() {
        
    }

}
