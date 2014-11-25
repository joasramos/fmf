<?php

if (!defined('BASEPATH')) {
    exit("No direct script access allowed");
}

class Manager extends MY_Controller {

    public function __construct() {
        parent::__construct("admin");
        $this->load->model("usuario");
        $this->usuario->logged();
    }

    public function index() {
        $this->output->set_template("admin");
        
      //  echo $this->session->userdata("tipo_usuario");
        
        $this->load->view("admin/index");
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
