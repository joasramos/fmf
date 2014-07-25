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

    public function insert() {
        $this->output->unset_template();
        $obj = array();
        $obj = $this->setObject();
        $this->modulo->setColInsert(array("idcompeticao", "idturno", "descricao"));

        /* Insere se for um novo */
        if (!$obj[3]) {
            $this->modulo->insert("modulo", $obj);
        } else {
            /*
             * Edita se não for
             */
            $this->modulo->update("idmodulo", $obj[3], "modulo", $obj);
        }

        /* retorna modulos da competicao */
        $data['modulos'] = $this->modulo->findModByComp($obj[0]);

        $this->load->view("admin/list-mod", $data);
    }

    public function setObject() {
        $obj = array();
        $obj[0] = $this->input->post("id_comp");
        $obj[1] = $this->input->post("mod_tp");
        $obj[2] = $this->input->post("mod_nome");
        $obj[3] = $this->input->post("mod_id") ? $this->input->post("mod_id") : null;
        return $obj;
    }

    public function update() {
        
    }

}
