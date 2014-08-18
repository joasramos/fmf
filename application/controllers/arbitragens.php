<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed!");
}

/**
 * Description of arbitragem
 *
 * @author joasaraujo
 */
class Arbitragens extends MY_Controller {

    public function __construct($template = null) {
        parent::__construct($template);
        $this->setTitle("Arbitragem");
        $this->load->model("arbitragem");
    }

    public function index() {
        $data['arbitros'] = $this->arbitragem->findAll("arbitro", array("idarbitro", "nome", "idade", "profissao", "cargo_fmf", "categoria"), 19, null);
        $this->load->view("site/arbitragem", $data);
    }

    public function showAll() {
        $value = $this->input->post("input_nome") ? $this->input->post("input_nome") : "";

        $list = $this->arbitragem->findBySimpleValue("arbitro", array("nome", "idade", "categoria"), "nome", $value);
        $this->loadTable("arbitragens", array("Nome", "Idade", "Categoria"), $list);
    }

    public function drop() {
        
    }

    public function find() {
        $this->output->set_template("admin");
        redirect(base_url() . 'arbitragens/showAll');
    }

    public function insert() {
        
    }

    public function setObject() {
        
    }

    public function newElement() {
        $this->output->set_template("admin");
        $this->load->view("admin/novo-arb");
    }

    public function showDetailArbitro($idarb) {
        $this->output->unset_template();

        $data['arb_info'] = $this->arbitragem->findBySimpleValueExact("arbitro", $this->arbitragem->ALL, "idarbitro", $idarb, array());

        $this->load->view("site/detail-arbitro", $data);
    }

}
