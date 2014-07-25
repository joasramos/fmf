<?php

if (!defined('BASEPATH')) {
    exit("No direct script access allowed");
}

class Arbitros extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->setTitle("Arbitros");
        $this->load->model("arbitragem");
        $this->load->model("clube");
    }

    public function index() {
        $nome = $this->input->post("input_nome");
        $list = $this->arbitragem->findBySimpleValue("arbitro", array("nome", "idade", "profissao"), "nome", $nome);
       //$this->arbitragem->findAll("arbitro", array("nome", "idade", "profissao"), 10);
        $this->loadTable("arbitros", array("Nome", "Idade", "Profissão"), $list);
    }

    public function drop() {
        
    }

    public function insert() {
        $data = $this->setObject();
        echo $this->clube->insert("clube", $data);
    }

    public function find() {
        //        print_r($this->arbitragem->findBySimpleValue("arbitro", "nome", "Filho"));
    }

    public function update() {
        $data = $this->setObject();
        $this->clube->update("idclube", 7, "clube", $data);
    }

    public function setObject() {
        $d = "10/03/1912";
        
        $this->clube->setColInsert(array("nome", "apelido", "fundacao"));
        
        return array("Sampaio Correa Futebol Clube", "Sampaiooo", date("Y/m/d", strtotime($d)));
    }

}
