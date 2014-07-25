<?php

if (!defined("BASEPATH")) {
    exit("No direct access script allowed");
}

/**
 * Description of arbitragem
 *
 * @author joasaraujo
 */
class Fase extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    public function findFaseByMod($idmod) {
        $this->db->select("tf.nome, f.n_jogos, f.n_grupos, f.descricao, f.idfase, f.regra_ida_e_volta");
        $this->db->from("fase f");
        $this->db->join("tipo_fase tf", "f.idtipo_fase = tf.idtipo_fase", "inner");
        $this->db->where("f.idmodulo", $idmod);
        return $this->db->get()->result();
    }

    public function findTipoFase() {
        return $this->db->get("tipo_fase")->result();
    }

}
