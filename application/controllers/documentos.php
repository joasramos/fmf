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
        $this->load->model("documento");
    }

    /**
     * Método para exibir todos os documentos para o usuário do site
     */
    public function todos(){
        $data['documentos'] = $this->documento->getLastDocs();
        $this->load->view("site/docs_todos", $data);
    }
    
    
    /** 
     *MÉTODOS DA AREA ADMINISTRATIVA DE DOCUMENTOS
     */
    
    public function showAll() {
        $this->load->model("usuario");
        $this->usuario->hasPermission(array(1,3));
        
        $this->output->set_template("admin");
        $value = $this->input->post("input_nome") ? $this->input->post("input_nome") : "";

        $list = $this->documento->findBySimpleValue("documento", array('iddocumento', "titulo", "descricao", "data", "url"), "titulo", $value);
        $this->loadTable("documentos", array("ID", "Título", "Descrição", "Data", "Arquivo"), $list);
    }

    public function newElement() {
        $this->output->set_template("admin");
        $data['setores'] = $this->documento->getSetores();
        $this->load->view("admin/novo-documento", $data);
    }

    public function drop($value = null, $status = null) {
        $this->output->unset_template();
        if ($status) {
            $this->documento->drop("iddocumento", $value, "documento");
            redirect(base_url() . "documentos/showAll");
        } else {
            echo "<h3>Deseja realmente excluir o documento? </br>Clique <a href=" . base_url() . "documentos/drop/" . $value
            . "/true>AQUI</a> para confirmar.</h3>";
        }
    }

    public function find($id = null) {
//        echo "<div style='margin:auto; width: 50%'>"
//        . "FUNCIONALIDADE AINDA AUSENTE. <br/><br/> "
//        . "CONTACTE O ADMINISTRADOR!</div>";

        $this->output->set_template("admin");
        $data['setores'] = $this->documento->getSetores();
        $data['documento'] = $this->documento->findBySimpleValue("documento", array(), "iddocumento", $id);
        $this->load->view("admin/novo-documento", $data);
    }

    public function insert() {
        $this->output->unset_template();

        $obj = $this->setObject();

        if (isset($obj['iddocumento'])) {
            // updateSimple($entity, $data, $id, $value)
            $this->documento->updateSimple("documento", $obj, "iddocumento", $obj['iddocumento']);
            redirect(base_url() . "documentos/showAll");
        } else {
            $this->documento->insertSimple("documento", $obj);
            redirect(base_url() . "documentos/showAll");
        }
        //print_r($obj);
    }

    public function setObject() {
        $obj = array();
        $id = $this->input->post("iddocumento");

        if ($id) {
            $obj["iddocumento"] = $id;
        }

        $obj['idsetor'] = $this->input->post("setor");
        $obj['titulo'] = $this->input->post("titulo");
        $obj['descricao'] = $this->input->post("descricao");
        $obj['data'] = date('Y-m-d', strtotime($this->input->post("data")));

        if (!$id) {
            /* Faz upload */
            $data = $this->realizaUpload("assets/documentos", "pdf", "arquivo", true);
            //print_r($data);

            $file_name = $data["file"]["file_name"] ? $data["file"]["file_name"] : null;

            if (!$file_name) {
                return null;
            } else {
                $obj['url'] = $file_name;
            }
        }
        return $obj;
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
