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
        $id = $this->input->post("idrodada");
        $this->rodada->drop("idrodada", $id, "rodada_fix");
    }

    public function find() {
        
    }

    public function cadRodView($id = null) {
        $this->output->unset_template();
        $data['rodada'] = $this->rodada->findBySimpleValueExact("rodada_fix", array(), "idrodada", $id, null);
        $this->load->view("admin/cad-rod", $data);
    }

    /*
     * Método que insere ou edita uma rodada
     */

    public function insert() {
        $this->output->unset_template();

        $obj = $this->setObject();

        /* Insere se for um novo */
        if ($obj['idrodada'] == null) {
            $this->rodada->insertSimple("rodada_fix", $obj);
        } else {
            /*
             * Edita se não for
             */
            $this->rodada->updateSimple("rodada_fix", $obj, "idrodada", $obj["idrodada"]);
        }
    }

    /*
     * Seta um array que representa uma rodada via POST
     */

    public function setObject() {
        $obj = array();
        
        $id = $this->input->post("idrodada");
        
        $obj['idrodada'] = $id ? $id : null;
        $obj['idfase'] = $this->input->post("idfase");
        $obj['apelido'] = $this->input->post("apelido");
        $obj['n_jogos'] = $this->input->post("n_jogos");

        return $obj;
    }

}
