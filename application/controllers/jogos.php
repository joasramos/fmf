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
     * de jogo
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
        if (!isset($obj['idjogo_new'])) {
            $idjogo = $this->rodada->insertSimple("jogo_new", $obj);
        } else {
            //atualiza
            $bordero = $this->realizaUpload("bordero", "pdf", "jogo_bord");
            $sumula = $this->realizaUpload("sumula", "pdf", "jogo_sum");

            $obj['bordero'] = isset($bordero['file']['file_name']) ? $bordero['file']['file_name'] : "";
            $obj['sumula'] = isset($sumula['file']['file_name']) ? $sumula['file']['file_name'] : "";

            print_r($obj);

            $this->rodada->updateSimple("jogo_new", $obj, "idjogo_new", $obj['idjogo_new']);
        }
    }

    /*
     * Seta array que representa um jogo via POST
     */

    public function setObject() {
        $obj = array();

        $idrodada = $this->input->post('idrodada');

        if ($this->input->post('idjogo')) {
            $n_jogo = $this->rodada->getMaxNjogo($idrodada);
            $obj['n_jogo'] = $n_jogo != 0 ? $n_jogo + 1 : 1;
        }
        /*
          $bordero = $this->realizaUpload("bordero", "pdf", "jogo_bord");
          $sumula = $this->realizaUpload("sumula", "pdf", "jogo_sum");
         */

        if ($this->input->post('clube_casa')) {
            $obj['time_casa'] = $this->input->post('clube_casa');
        }

        if ($this->input->post('clube_fora')) {
            $obj['time_visitante'] = $this->input->post('clube_fora');
        }

        $obj['idrodada'] = $this->input->post('idrodada');

        $obj['idjogo_new'] = $this->input->post('idjogo');

        $obj['data'] = date("Y-m-d", strtotime($this->input->post('jogo_data')));

        $obj['hora'] = $this->input->post('jogo_hora');

        if ($this->input->post('new_estadio')) {
            $obj['idestadio'] = $this->input->post('new_estadio');
        } else {
            $obj['idestadio'] = 3;
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
