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

        /*
         * Ano corrente
         */
        if (!$ano) {
            $ano = date('Y');
        }

        /*
         * Carrega uma competição especificada por url e ano
         */
        $data['comp_full'] = $this->competicao->findAllCompeticoes($url, $ano);

        /*
         * Classificacao da competição
         */
        $data['classificacao'] = $this->competicao->findClassificacao($data['comp_full'][0]->idcompeticao);

        /*
         * Turnos da competição
         */
        $data['turnos'] = $this->competicao->findModulos($data['comp_full'][0]->idcompeticao);

        /*
         * Buscamos as rodadas
         * Mesclando aos jogos os seus respectivos turnos
         */
        foreach ($data['turnos'] as $key => $turno) {
            $data['comp_jogos'][$key] = $this->rodada->findRodadas($data['comp_full'][0]->idcompeticao, $turno->idmodulo);
        }

        /*
         * Show view
         */
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

    /**
     * FUNÇÕES DA AREA ADMNISTRATIVA
     */
    /*
     * Método que exibe todas as competições cadastradas
     */
    public function showAll() {
        $value = $this->input->post("input_nome") ? $this->input->post("input_nome") : "";
        $list = $this->competicao->findBySimpleValue("competicao", array("idcompeticao", "nome", "apelido", "ano"), "nome", $value);
        $this->loadTable("competicoes", array("ID", "Nome", "Apelido", "Ano"), $list);
    }

    /*
     * Método para deletar um competicao
     */

    public function drop($idcompeticao = NULL) {
        $this->output->unset_template();
        /*
         * Tenta deletar a competicao
         */
        $this->competicao->drop("idcompeticao", $idcompeticao, "competicao");
        /*
         * Redireciona para a area de competicoes,
         * passando a mensagem de retorno da ação deletar
         * como parametro
         */
        redirect("competicoes/showAll");   
    }

    /*
     * Método para editar uma competicao 
     */

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

        $this->load->view("admin/nova-competicao", $data);
    }

    private function getTurnos() {
        $this->load->model("modulo");
        return $this->modulo->findTurno();
    }

    /*
     * Método para persistir uma competição 
     */

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

    /*
     * Edita um array que representa uma competicao.
     * Dados são recuperados via post
     */

    public function setObject() {
        $obj = array();
        $obj[0] = $this->input->post('comp_nome');
        $obj[1] = $this->input->post('comp_ap');
        $obj[2] = $this->input->post('comp_ano');
        $obj[3] = $this->input->post('comp_mod');
        $obj[4] = $this->input->post('comp_reb');
        $str = $obj[0] + $obj[2];

        $obj[5] = $this->gerarUrl($str); //$this->input->post('comp_url');

        if ($this->input->post('comp_id')) {
            $obj[6] = $this->input->post('comp_id');
        }
        return $obj;
    }

    /*
     * Exibe o formulário para cadastro de nova competicao
     */

    public function newElement() {
        $this->output->set_template("admin");
        $this->load->js("assets/themes/admin/js/competicoes.js");
        $this->load->view("admin/nova-competicao");
    }

}
