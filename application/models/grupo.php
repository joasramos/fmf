<?php

if (!defined("BASEPATH")) {
    exit("No direct access script allowed");
}

/**
 * Description of arbitragem
 *
 * @author joasaraujo
 */
class Grupo extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    public function findGrupoByFase($idfase) {
        $this->db->select("g.idgrupo, tg.nome, n_classificados");
        $this->db->from("grupo g");
        $this->db->join("tipo_grupo tg", "g.idtipo_grupo = tg.idtipo_grupo", "inner");
        $this->db->where("g.idfase", $idfase);
        return $this->db->get()->result();
    }

    public function findTipoGrupo() {
        return $this->db->get("tipo_grupo")->result();
    }

}
