<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed!");
}

/**
 * Description of estadios
 *
 * @author joasaraujo
 */
class Rodadas extends MY_Controller {

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

    public function cadRodView($mod = null) {
        $this->output->unset_template();
        $this->load->view("admin/cad-rod");
    }

    /*
     * Método que insere ou edita uma rodada
     */

    public function insert() {
        $this->output->unset_template();

        $obj = $this->setObject();

        $idrod = $this->input->post("idrod");

        /* Insere se for um novo */
        if (!$idrod) {
            $this->rodada->insertSimple("rodada", $obj);
        } else {
            /*
             * Edita se não for
             */
            $this->rodada->update("idmodulo", $obj['idrod'], "modulo", $obj);
        }
    }

    /*
     * Seta um array que representa uma rodada via POST
     */

    public function setObject() {
        $obj = array();
        $obj['fase_idfase'] = $this->input->post("idfase");
        $obj['apelido'] = $this->input->post("apelido");
        $obj['n_jogos'] = $this->input->post("n_jogos");

        return $obj;
    }

}
