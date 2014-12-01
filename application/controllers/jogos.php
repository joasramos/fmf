<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed!");
}

/**
 * Description of estadios
 *
 * @author joasaraujo
 */
class Jogos extends MY_Controller {

    public function __construct($template = null) {
        parent::__construct("admin");
        $this->load->model("rodada");
    }

    public function index() {
        
    }

    public function showAll() {
        
    }

    public function drop() {
        $idjogo = $this->input->post('idjogo');
        /*
         * Deleta o jogo
         */
        $this->rodada->drop('idjogo_new', $idjogo, 'jogo_new');
    }

    public function find() {
        
    }

    /*
     * Método para exibir o formulario de cadastro
     * de jogo de uma determinada fase
     */

    public function cadJogoView($idfase = NULL) {
        $this->output->unset_template();

        /* Carregamos convidados */
        $this->load->model("clube");
        $data['conv'] = $this->clube->findConvByFase($idfase);

        /*
         * Carregar estadio
         */

        /*
         * Exibimos a view
         */
        $this->load->view("admin/cad-jogo", $data);
    }

    /*
     * Método para inserir um jogo
     */

    public function insert() {
        $this->output->unset_template();

        $obj = $this->setObject();

        $idjogo = 0;

        /* Insere se for um novo */
        if ($obj['idjogo_new'] == null) {
            $idjogo = $this->rodada->insertSimple("jogo_new", $obj);
        } else {

            //atualiza se ainda não foram adicionados documentos ao jogo
            $bordero = $this->realizaUpload("bordero", "pdf", "jogo_bord");

            if (isset($bordero['file']['file_name'])) {
                $obj['bordero'] = $bordero['file']['file_name'];
            }

            $sumula = $this->realizaUpload("sumula", "pdf", "jogo_sum");

            if (isset($sumula['file']['file_name'])) {
                $obj['sumula'] = $sumula['file']['file_name'];
            }

            $this->rodada->updateSimple("jogo_new", $obj, "idjogo_new", $obj['idjogo_new']);
            $this->mngClassificacao();
        }
    }

    private function mngClassificacao() {
        $this->load->model("classificacao");
        $this->classificacao->setJogo($this->input->post());
        $this->classificacao->mngClassi(); 
    }

    /*
     * Seta array que representa um jogo via POST
     */

    public function setObject() {
        $obj = array();

        /*
         * Pegando a rodada do jogo
         */
        $idrodada = $this->input->post('idrodada');

        $idjogo = 0;
        $idjogo = $this->input->post('idjogo');
        /**
         * Gerando número do jogo automaticante para um novo jogo 
         */
        if ($idjogo == 0) {
            $n_jogo = $this->rodada->getMaxNjogo($idrodada);
            $obj['n_jogo'] = $n_jogo ? $n_jogo + 1 : 1;
        }

        /*
         * Pegando ID convidado/clube que joga em casa
         */
        if ($this->input->post('clube_casa')) {
            $obj['time_casa'] = $this->input->post('clube_casa');
        }

        /*
         * Pegando ID convidado/clube que joga fora de casa
         */
        if ($this->input->post('clube_fora')) {
            $obj['time_visitante'] = $this->input->post('clube_fora');
        }

        /*
         * Armazena idrodada
         */
        $obj['idrodada'] = $idrodada;

        /*
         * Veridica se existe idjogo. Caso sim é por que está editando um jogo e armazena idjogo.
         */
        $obj['idjogo_new'] = $this->input->post('idjogo') ? $this->input->post('idjogo') : null;

        /*
         * Ajustamos e armazena a data do jogo
         */
        if ($this->input->post('jogo_data')) {
            $obj['data'] = date("Y-m-d", strtotime($this->input->post('jogo_data')));
        }

        /*
         * Hora do jogo
         */
        $obj['hora'] = $this->input->post('jogo_hora');

        /*
         * Estádio do jogo
         */
        if ($this->input->post('new_estadio') && $this->input->post('jogo_estadio') == "") {
            $obj['idestadio'] = $this->input->post('new_estadio');
        }

        return $obj;
    }

    /*
     * Metodo para editar um jogo de uma determinada fase
     */

    public function editJogo($jogo = null, $idfase = null) {
        $this->output->unset_template();

        /* Carregamos convidados */
        $this->load->model("clube");
        $data['conv'] = $this->clube->findConvByFase($idfase);

        /*
         * Carregamos estádios
         */
        $this->load->model("estadio");
        $data['estadios'] = $this->estadio->findAll("estadio", array("idestadio", "apelido"), 'ALL', array('apelido', 'asc'));

        /*
         * Carregamos detalhes do jogo
         */
        $this->load->model('rodada');
        $data['jogo'] = $this->rodada->findJogoDetail($jogo);
        /*
         * Exibimos a view
         */
        $this->load->view("admin/edit-jogo", $data);
    }

}
