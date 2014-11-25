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
        $this->load->model("estadio");
    }

    public function index() {
        $this->load->view("site/estadios");
//        $this->load->view("teste");
    }

    public function showAll() {
        $this->load->model('usuario');
        $this->usuario->logged();
        $this->usuario->hasPermission(1);
        $value = $this->input->post("input_nome") ? $this->input->post("input_nome") : "";
        $list = $this->estadio->findBySimpleValue("estadio", array("idestadio", "nome", "apelido", "cidade"), "nome", $value);
        $this->loadTable("estadios", array("ID", "Nome", "Apelido", "Cidade"), $list);
    }

    public function drop($idestadio = null) {
        $this->output->unset_template();

//        echo "<script>alert(" . $idestadio . ")</script>";

        $this->estadio->drop("idestadio", $idestadio, "estadio");
        redirect('estadios/showAll', 'refresh');
    }

    public function find() {
        
    }

    public function insert() {
        $this->output->set_template("admin");
        $obj = $this->setObject();

        if (isset($obj['idestadio'])) {
            //edita estadio
        } else {
            $this->estadio->insertSimple("estadio", $obj);
        }

        redirect('estadios/showAll', 'refresh');
    }

    public function setObject() {
        $obj = array();

        $obj['nome'] = $this->input->post('nome');
        $obj['apelido'] = $this->input->post('apelido');
        $obj['cidade'] = $this->input->post('cidade');

        $obj['url'] = $this->gerarUrl($obj['nome']);

        return $obj;
    }

    public function newElement() {
        $this->output->set_template("admin");
        $this->load->view('admin/novo-estadio');
    }

}
