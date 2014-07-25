<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed!");
}

/**
 * Description of documentos
 *
 * @author joasaraujo
 */
class Documentos extends MY_Controller {

    public function __construct($template = null) {
        parent::__construct($template);
    }

    public function drop() {
        
    }

    public function find() {
        
    }

    public function insert() {
        $this->output->unset_template(); 
        print_r($this->input->post());
    }

    public function setObject() {
        
    }

    /**
     * Metódo é chamado na pela o botão "Inserir Documento" na lista de documentos
     * de uma competição.
     * Exibe um dialogo para cadastro de um novo documento
     */
    public function cadDocView() {
        $this->output->unset_template();        
        $this->load->view("admin/cad-doc");
    }

}
