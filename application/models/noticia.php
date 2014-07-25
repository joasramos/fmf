<?php

if (!defined("BASEPATH")) {
    exit("No direct access script allowed");
}

/**
 * Description of arbitragem
 *
 * @author joasaraujo
 */
class Noticia extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getLastNews() {
        $this->db->join("tipo_noticia tn", "tn.idtipo_noticia = n.idtipo_noticia","inner");
        $this->db->order_by("data", "desc");
        return $this->db->get("noticia n")->result();
    }
    
     public function getLastDestaques() {
        $this->db->join("tipo_noticia tn", "tn.idtipo_noticia = n.idtipo_noticia","inner");
        $this->db->where("n.destaque = 1");
        $this->db->order_by("data", "desc");
        return $this->db->get("noticia n")->result();
    }

    public function getLastNewsFmf() {
        $this->db->where("fmf_acontece", 1);
        $this->db->order_by("data", "desc");
        return $this->db->get("noticia")->result();
    }

    public function getLastNewsClubes() {
        $this->db->join("noticia_clube nc", "nc.idnoticia = n.idnoticia", "inner");
        $this->db->order_by("data", "desc");
        return $this->db->get("noticia n")->result();
    }

    public function getLastNewsArbitragem() {
        $this->db->join("noticia_arbitro na", "na.idnoticia = n.idnoticia", "inner");
        $this->db->order_by("data", "desc");
        return $this->db->get("noticia n")->result();
    }

}
