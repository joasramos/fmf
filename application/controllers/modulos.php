<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed!");
}

/**
 * Description of estadios
 *
 * @author joasaraujo
 */
class Modulos extends MY_Controller {

    public function __construct($template = null) {
        parent::__construct("admin");
        $this->load->model("modulo");
    }

    public function index() {
        
    }

    public function showAll() {
        
    }

    public function drop() {
        $this->output->unset_template();

        $idmod = $this->input->post("idmod");
        $idcomp = $this->input->post("idcomp");

        $this->modulo->drop("idmodulo", $idmod, "modulo");

        $data['modulos'] = $this->modulo->findModByComp($idcomp);

        $this->load->view("admin/list-mod", $data);
    }

    public function find() {
        
    }

    public function cadModuloView($mod = null) {
        $this->output->unset_template();
        $data['modulo'] = $this->modulo->findBySimpleValueExact("modulo", array(), "idmodulo", $mod, array());
        $data['turnos'] = $this->modulo->findTurno();
        $this->load->view("admin/cad-mod", $data);
    }

    public function showFases() {
        $this->output->unset_template();

        $this->load->model("fase");

        /*
         * Buscar Fases de um modulo especificado por ID
         */
        $data['fases'] = $this->fase->findFaseByMod($this->input->post("idmod"));

        /**
         * Carregar list - que é uma view - com as fases encontradas
         */
        $this->load->view("admin/list-fase", $data);
    }

    public function insert() {
        $this->output->unset_template();
        $obj = $this->setObject();
        $this->modulo->setColInsert(array("idcompeticao", "idturno", "descricao"));

        /* Insere se for um novo */
        if (!$obj[3]) {
            $this->modulo->insert("modulo", $obj);
        }else{
            /*
             * Edita se não for
             */
            $this->modulo->update("idmodulo", $obj[3], "modulo", $obj);
        }

        /* retorna modulos da competicao */
        $data['modulos'] = $this->modulo->findModByComp($obj[0]);

        /*
         * Recarrega view que representa os modulos e retorna-a para o script localizado
         * em cad-mod.php
         */
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
}
