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
        
    }

    public function find() {
        
    }

    public function cadJogoView($idfase = NULL) {
        $this->output->unset_template();

        /* Carregamos convidados */
        $this->load->model("clube");
        $data['conv'] = $this->clube->findConvByFase($idfase);

        /*
         * Exibimos a view
         */
        $this->load->view("admin/cad-jogo", $data);
    }

    public function insert() {
        $this->output->unset_template();

        $obj = $this->setObject();

        $idjogo;
        $rodada = $this->input->post("rodada");

        /* Insere se for um novo */
        if (!isset($obj['idjogo'])) {
            $idjogo = $this->rodada->insertSimple("jogo", $obj);

            $fase = $this->input->post('idfase');
            $data['jogo_idjogo'] = $idjogo;

//            VAI TER QUE TER GAMBIARRA
            if ($obj['n_jogo'] == 1) {
                $this->rodada->updateRod($fase, $rodada, $data);
            } else {
                $r = array();
                $r['fase_idfase'] = $fase;
                $r['jogo_idjogo'] = $idjogo;
                $r['apelido'] = $rodada;
                $this->rodada->insertSimple("rodada", $r);
            }
//            END GAMBIARRA
        } else {
            
        }
    }

    /*
     * Seta array que representa um jogo via POST
     */

    public function setObject() {
        $obj = array();

        $idfase = $this->input->post('idfase');

        $n_jogo = $this->rodada->getMaxNjogo($idfase);

        $obj['n_jogo'] = $n_jogo != 0 ? $n_jogo + 1 : 1;

        /*
          $bordero = $this->realizaUpload("bordero", "pdf", "jogo_bord");
          $sumula = $this->realizaUpload("sumula", "pdf", "jogo_sum");
         */

        $obj['time_casa'] = $this->input->post('clube_casa');
        $obj['time_visitante'] = $this->input->post('clube_fora');

        return $obj;
    }

}
