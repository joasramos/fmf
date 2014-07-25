<?php

if (!defined("BASEPATH")) {
    exit("No direct access script allowed");
}

/**
 * Description of arbitragem
 *
 * @author joasaraujo
 */
class Clube extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getClubeByDivisao($divisao) {
        $this->db->select("d.n_times, c.bandeira, c.nome, c.apelido, c.idclube");
        $this->db->join("clube c", "c.idclube = dc.idclube", "inner");
        $this->db->join("divisao d", "d.iddivisao = dc.iddivisao", "inner");
        $this->db->where("d.nome", $divisao);
        $this->db->order_by("c.nome");
        return $this->db->get('divisao_clube dc')->result();
    }

    /**
     * Traz todos os clubes de um determinado grupo
     */
    public function findCluByGru($idgrupo) {
        $this->db->select("c.idconvidado, cc.apelido");
        $this->db->from("convidado c");
        $this->db->join("grupo g", "g.idgrupo = c.idgrupo", "inner");
        $this->db->join("clube cc", "cc.idclube = c.idclube", "inner");
        $this->db->where("g.idgrupo", $idgrupo);

        return $this->db->get()->result();
    }

}
