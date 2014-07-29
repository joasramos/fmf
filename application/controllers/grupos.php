<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed!");
}

/**
 * Description of estadios
 *
 * @author joasaraujo
 */
class Grupos extends MY_Controller {

    public function __construct($template = null) {
        parent::__construct("admin");
        $this->load->model("grupo");
    }

    public function index() {
        
    }

    public function showAll() {
        
    }

    public function drop() {
        
    }

    public function find() {
        
    }

    /**
     * Método que carrega os convidado de um determinado grupo.
     * Os dados são carregados em uma nova view.
     */    
    public function showConv() {
        $this->output->unset_template();

        $this->load->model("clube");

        $idgrupo = $this->input->post("idgrupo");
        $data['conv'] = $this->clube->findCluByGru($idgrupo);
        $data['clubes'] = $this->clube->findAll("clube", array(), $this->clube->ALL, array());

        $this->load->view("admin/list-conv", $data);
    }

    public function insert() {
        $this->output->unset_template();
        $obj = array();
        $obj = $this->setObject();

        $this->grupo->setColInsert(array("idtipo_grupo", "idfase", "n_classificados"));
        
        if (isset($obj[3])) {
            /* Update*/
            $this->grupo->update("idgrupo", $obj[3], "grupo", $obj);
        } else {
            /* Insere */
            $this->grupo->insert("grupo", $obj);
        }
    }

    public function setObject() {
        $obj = array();
        $obj[0] = $this->input->post("gru_tg");
        $obj[1] = $this->input->post("idfase");
        $obj[2] = $this->input->post("gru_class");
        
        if ($this->input->post("idgrupo")) {
            $obj[3] = $this->input->post("idgrupo");
        }

        return $obj;
    }

    public function cadGrupoView() {
        $this->output->unset_template();
        $data['tipo_grupos'] = $this->grupo->findTipoGrupo();
        $this->load->view("admin/cad-gru", $data);
    }

}
