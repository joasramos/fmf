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
        $this->output->unset_template();
        $id = $this->input->post("idgrupo");
        $this->grupo->drop("idgrupo", $id, "grupo");
    }

    public function find() {
        
    }

    /**
     * Método que carrega os convidado de um determinado grupo.
     * Os dados são carregados em uma nova view.
     */
    public function showConv() {
        $this->output->unset_template();

        /*
         * Carrega modelo clube
         */
        $this->load->model("clube");

        /*
         * Pegamos idgrupo
         */
        $idgrupo = $this->input->post("idgrupo");
        
        /*
         * Buscamos os convidados de um determinado grupo [pelo idgrupo]
         */
        $data['conv'] = $this->clube->findCluByGru($idgrupo);
        
        /*
         * Buscamos todos os times à serem convidados para um grupo
         */
        $data['clubes'] = $this->clube->findAll("clube", array(), $this->clube->ALL, array());

        /*
         * Exibimos a view para administrar a lista de convidados de um grupo
         */
        $this->load->view("admin/list-conv", $data);
    }

    public function insert() {
        $this->output->unset_template();
        $obj = array();
        $obj = $this->setObject();

        if (isset($obj["idgrupo"])) {
            /* Update */
            $this->grupo->updateSimple("grupo", $obj, "idgrupo", $obj['idgrupo']);
        } else {

            /* Insere */
            $this->grupo->insertSimple("grupo", $obj);
        }
    }

    public function setObject() {
        $obj = array();

        $obj["idtipo_grupo"] = $this->input->post("gru_tg");

        $obj["n_classificados"] = $this->input->post("gru_class");

        /**
         * Se estiver editando um grupo é necessário saber o idgrupo
         * Senão, é necessário salvar a fase do novo grupo. 
         */
        if ($this->input->post("idgrupo")) {
            $obj["idgrupo"] = $this->input->post("idgrupo");
        } else {
            $obj["idfase"] = $this->input->post("idfase");
        }

        return $obj;
    }

    public function cadGrupoView($idgrupo = null) {
        $this->output->unset_template();
        $data = array();
        $data['tipo_grupos'] = $this->grupo->findTipoGrupo();
        $data['grupo'] = $this->grupo->findBySimpleValueExact("grupo", $this->grupo->ALL, "idgrupo", $idgrupo, null);
        $this->load->view("admin/cad-gru", $data);
    }

}
