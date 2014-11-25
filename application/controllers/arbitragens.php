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
        $this->load->model('usuario');
        $this->usuario->logged();
        $this->usuario->hasPermission(1);

        $value = $this->input->post("input_nome") ? $this->input->post("input_nome") : "";

        $list = $this->arbitragem->findBySimpleValue("arbitro", array("idarbitro", "nome", "idade", "categoria"), "nome", $value);
        $this->loadTable("arbitragens", array("ID", "Nome", "Idade", "Categoria"), $list);
    }

    public function drop($idarbitro = null) {
        $this->output->unset_template();
        $this->arbitragem->drop("idarbitro", $idarbitro, "arbitro");
        redirect('arbitragens/showAll', 'refresh');
    }

    public function find() {
        $this->output->set_template("admin");
        redirect(base_url() . 'arbitragens/showAll');
    }

    public function insert() {
        $this->output->unset_template();

        $obj = $this->setObject();

        if (isset($obj['idarbitro'])) {
            $this->arbitragem->updateSimple("arbitro", $obj, "idarbitro", $obj['idarbitro']);
        } else {
            $this->arbitragem->insertSimple("arbitro", $obj);
        }

        redirect('arbitragens/showAll', 'refresh');
    }

    public function setObject() {

        $obj = array();

        $obj['nome'] = $this->input->post("nome");
        $obj['nascimento'] = date("Y-m-d", strtotime($this->input->post("nasci")));
        $obj['sexo'] = $this->input->post("sexo");
        $obj['profissao'] = $this->input->post("profi");
        $obj['cargo_fmf'] = $this->input->post("cargo");
        $obj['categoria'] = $this->input->post("cat");
        $obj['ano_formacao'] = $this->input->post("ano_form");
        $obj['ano_inclusao'] = $this->input->post("ano_inc");
        $obj['filiacao'] = $this->input->post("fili");
        $obj['naturalidade'] = $this->input->post("natural");
        $obj['escolaridade'] = $this->input->post("escolar");
        $obj['estado_civil'] = $this->input->post("est_civil");
        $obj['titulo_eleitor'] = $this->input->post("tit_eleitor");
        $obj['reservista'] = $this->input->post("reservista");
        $obj['cpfr'] = $this->input->post("cpf");
        $obj['rg'] = $this->input->post("rg");
        $obj['endereco'] = $this->input->post("end");
        $obj['bairro'] = $this->input->post("bairro");
        $obj['telefone'] = $this->input->post("tel");
        $obj['celular'] = $this->input->post("cel");
        $obj['altura'] = $this->input->post("altura");
        $obj['peso'] = $this->input->post("peso");
        $obj['dados_bancario'] = $this->input->post("dados_banc");
        $obj['pis'] = $this->input->post("pis");
        $obj['manequim'] = $this->input->post("manequim");
        $obj['tipo_sanguineo'] = $this->input->post("tipo_sanque");

        /*
         * Realiza upload
         */
        $img = $this->realizaUpload("assets/images/arbitros", "", "arb_img", true);

        if (isset($img['file']['file_name'])) {
            $obj['imagem'] = $img['file']['file_name'];
        }

        $idarbitro = $this->input->post('idarbitro');
        
        if ($idarbitro) {
            $obj['idarbitro'] = $idarbitro;
        }

        return $obj;
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
