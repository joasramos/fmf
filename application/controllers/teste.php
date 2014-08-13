<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed!");
}

/**
 * Description of jogos
 *
 * @author joasaraujo
 */
class Teste extends MY_Controller {

    public function __construct($template = null) {
        parent::__construct($template);
        $this->setTitle("Registro");
    }

    public function index() {
        $this->load->view("teste/teste_upload");
    }

    public function drop() {
        
    }

    public function find() {
        
    }

    public function insert() {
        
    }

    public function setObject() {
        
    }

    public function setUpload() {
        $data = $this->realizaUpload("teste", "", "userfile");
        $this->load->view("teste/teste_upload", $data);
    }

}
