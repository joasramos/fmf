<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed!");
}

/**
 * Description of estadios
 *
 * @author joasaraujo
 */
class Estadios extends MY_Controller {

    public function __construct($template = null) {
        parent::__construct($template);
        $this->setTitle("Estádios");
    }

    public function index() {
        $this->load->view("site/estadios");
//        $this->load->view("teste");
    }

    public function showAll() {
//        $value = $this->input->post("input_nome") ? $this->input->post("input_nome") : "";
//
//        $list = $this->noticia->findBySimpleValue("clube", array("nome", "apelido"), "titulo", $value);
//        $this->loadTable("clubes", array("Nome", "Apelido"), $list);
    }

    public function drop() {
        
    }

    public function find() {
        //$this->load->view("detail_estadio");
    }

    public function insert() {
        
    }

    public function setObject() {
//        $nome = $this->input->post("nome");
    }

    public function update() {
        
    }

}
