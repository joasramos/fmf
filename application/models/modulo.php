<?php

if (!defined("BASEPATH")) {
    exit("No direct access script allowed");
}

/**
 * Description of arbitragem
 *
 * @author joasaraujo
 */
class Modulo extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * 
     * @return uma lista com os turnos
     */
    public function findTurno() {
        return $this->db->get("turno")->result();
    }

    public function findModByComp($id) {
        $this->db->select("m.idmodulo, m.descricao, m.n_jogos, m.n_fases, t.nome");
        $this->db->from("modulo m");
        $this->db->join("turno t", "m.idturno = t.idturno", "inner");
        $this->db->where("idcompeticao", $id);
        return $this->db->get()->result();
    }

}
