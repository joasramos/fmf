<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed!");
}

/**
 * Description of competições
 *
 * @author joasaraujo
 */
class Competicoes extends MY_Controller {

    public function __construct($template = null) {
        parent::__construct($template);
        $this->setTitle("Competições");
        $this->load->model('rodada');
    }

    public function index($url = null, $ano = null) {

        $url != null ? $url : $url = 'maranhense-serie-a';

        $this->load->css('assets/themes/default/css/competicoes.css');
        $this->load->js("assets/themes/default/js/views/competicoes.js");
        /*
         * Buscando apenas os nomes das competições
         */
        $data['comp_nomes'] = $this->competicao->findDistinctCompeticoes();

        /*
         * Buscando apenas os anos
         */
        $data['comp_anos'] = $this->competicao->findAllCompeticoes($url, null);

        if (!$ano) {
            $ano = date('Y');
        }

        $data['comp_full'] = $this->competicao->findAllCompeticoes($url, $ano);

        $data['classificacao'] = $this->competicao->findClassificacao($data['comp_full'][0]->idcompeticao);

        $data['turnos'] = $this->competicao->findModulos($data['comp_full'][0]->idcompeticao);

        foreach ($data['turnos'] as $key => $turno) {
            $data['comp_jogos'][$key] = $this->rodada->findRodadas($data['comp_full'][0]->idcompeticao, $turno->idmodulo);
        }


        $this->load->view("site/competicoes2", $data);
    }

    public function managerAbas($url) {
        $this->output->unset_template();
        $data['competicao'] = $this->competicao->findBySimpleValueExact("competicao", array('apelido'), "url", $url, array());
        echo json_encode($data);
    }

    public function loadClassByFaseMod() {
        $this->output->unset_template();
        $mod = $this->input->post("idmod");
        $fase = $this->input->post("idfase");
        $data['classificacao'] = $this->competicao->findClassByModFase($mod, $fase);
        
        $this->load->view("site/class-tabela", $data);
    }

    public function showAll() {
        $value = $this->input->post("input_nome") ? $this->input->post("input_nome") : "";
        $list = $this->competicao->findBySimpleValue("competicao", array("idcompeticao", "nome", "apelido", "ano"), "nome", $value);
//        $this->load->js("assets/themes/admin/js/competicoes.js");
        $this->loadTable("competicoes", array("ID", "Nome", "Apelido", "Ano"), $list);
    }

    public function drop() {
        
    }

    public function find($id = null) {
        $this->output->set_template("admin");
        $this->load->model("modulo");
        $this->load->model("documento");

        $data['comp'] = $this->competicao->findBySimpleValueExact("competicao", array(), "idcompeticao", $id, array());
        $data['modulos'] = $this->modulo->findModByComp($id);

        $data['documentos'] = $this->documento->findDocByComp($id);

        $this->load->js("assets/themes/admin/js/competicoes.js");

        /* Buscando turnos */
        $data['turnos'] = $this->getTurnos();

        /* Buscando Fases */
//        $this->load->model("fase");
//        $data['fases'] = $this->fase->findFaseByMod($this->input->post("idmod"));
//        $data['n_fases'] = count($data['fases']);

        $this->load->view("admin/nova-competicao", $data);
    }

    public function getTurnos() {
        $this->load->model("modulo");
        return $this->modulo->findTurno();
    }

    public function insert() {
        $obj = $this->setObject();

        /* Setando colunas para inserir */
        $this->competicao->setColInsert(array("nome", "apelido", "ano", "n_modulos", "n_rebaixados", "url"));

        if ($obj[6]) {
            $this->competicao->update("idcompeticao", $obj[6], "competicao", $obj);
        } else {
            /* Inserindo valores */
            $this->competicao->insert("competicao", $obj);
        }

        redirect(base_url() . "competicoes/showAll");
    }

    public function setObject() {
        $obj = array();
        $obj[0] = $this->input->post('comp_nome');
        $obj[1] = $this->input->post('comp_ap');
        $obj[2] = $this->input->post('comp_ano');
        $obj[3] = $this->input->post('comp_mod');
        $obj[4] = $this->input->post('comp_reb');
        $obj[5] = $this->input->post('comp_url');
        if ($this->input->post('comp_id')) {
            $obj[6] = $this->input->post('comp_id');
        }
        return $obj;
    }

    public function update() {
        
    }

    public function newElement() {
        $this->output->set_template("admin");
        $this->load->js("assets/themes/admin/js/competicoes.js");
        $this->load->view("admin/nova-competicao");
    }

}
