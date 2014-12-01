<?php

if (!defined("BASEPATH")) {
    exit("No direct access script allowed");
}

/**
 * Description of arbitragem
 *
 * @author joasaraujo
 */
class Documento extends MY_Model {

    const PRESIDENCIA = 1;
    const CEAF = 2;
    const DIRETORIA_ADMINISTRATIVA = 3;
    const REGISTRO = 4;
    const FINANCEIRO = 5;
    const DEPARTAMENTO_COMPETICOES = 6; 

    public function __construct() {
        parent::__construct();
    }

    public function findDocByComp($id) {
        $this->db->from("documento c");
        $this->db->join("arquivo_competicao ac", "ac.iddocumento = c.iddocumento", "inner");
        $this->db->where("ac.idcompeticao", $id);

        return $this->db->get()->result();
    }

    public function getSetores() {
        return $this->db->get('setor')->result();
    }

    public function getLastDocs() {
        $this->db->order_by("data desc");
        return $this->db->get("documento")->result();
    }

    public function getDocsBySetor($setor) {
        $this->db->where("idsetor", $setor);
        $this->db->order_by("data desc");
        return $this->db->get("documento")->result();
    }

}
