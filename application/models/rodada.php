<?php

if (!defined("BASEPATH")) {
    exit("No direct access script allowed");
}

/**
 * Description of arbitragem
 *
 * @author joasaraujo
 */
class Rodada extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    public function findRodadas($comp, $modulo) {
        $sql= ("select j.n_jogo, j.data, m.n_jogos as m_n_jogos, c1.apelido as c1_nome, j.gols_casa, j.gols_visitante, "
                . "c2.apelido as c2_nome, r.n_jogos, r.apelido, tf.nome as tf_nome, "
                . "tn.nome as to_nome, c1.bandeira as c1_band, c2.bandeira as c2_band "
                . "from rodada r "
                . "inner join jogo j "
                . "inner join convidado cc1 "
                . "inner join convidado cc2 "
                . "inner join clube c1 "
                . "inner join clube c2 "
                . "inner join fase f "
                . "inner join tipo_fase tf "
                . "inner join modulo m "
                . "inner join turno tn "
                . "inner join competicao comp "
                . "on r.jogo_idjogo = j.idjogo "
                . "and j.time_casa = cc1.idconvidado "
                . "and j.time_visitante = cc2.idconvidado "
                . "and cc1.idclube = c1.idclube "
                . "and cc2.idclube = c2.idclube "
                . "and r.fase_idfase = f.idfase "
                . "and f.idtipo_fase = tf.idtipo_fase "
                . "and f.idmodulo = m.idmodulo "
                . "and m.idturno = tn.idturno "
                . "and m.idcompeticao = comp.idcompeticao "
                . "and comp.idcompeticao = ? and m.idmodulo = ? order by j.idjogo desc ");
        
        $result = $this->db->query($sql, array($comp, $modulo));

        return $result->result();
    }
    
    public function findRodadaByClube($idclube) {
        $sql= ("select tf.nome as nome_fase, tn.nome as nome_turno, comp.nome as nome_comp, j.n_jogo, j.data, m.n_jogos as m_n_jogos, c1.apelido as c1_nome, j.gols_casa, j.gols_visitante, "
                . "c2.apelido as c2_nome, r.n_jogos, r.apelido, tf.nome as tf_nome, "
                . "tn.nome as to_nome, c1.bandeira as c1_band, c2.bandeira as c2_band "
                . "from rodada r "
                . "inner join jogo j "
                . "inner join convidado cc1 "
                . "inner join convidado cc2 "
                . "inner join clube c1 "
                . "inner join clube c2 "
                . "inner join fase f "
                . "inner join tipo_fase tf "
                . "inner join modulo m "
                . "inner join turno tn "
                . "inner join competicao comp "
                . "on r.jogo_idjogo = j.idjogo "
                . "and j.time_casa = cc1.idconvidado "
                . "and j.time_visitante = cc2.idconvidado "
                . "and cc1.idclube = c1.idclube "
                . "and cc2.idclube = c2.idclube "
                . "and r.fase_idfase = f.idfase "
                . "and f.idtipo_fase = tf.idtipo_fase "
                . "and f.idmodulo = m.idmodulo "
                . "and m.idturno = tn.idturno "
                . "and m.idcompeticao = comp.idcompeticao "
                . "and cc1.idclube = ? order by j.data desc ");
        
        $result = $this->db->query($sql, $idclube);

        return $result->result();
    }
    
     public function findRodadaByClubeOut($idclube) {
        $sql= ("select tf.nome as nome_fase, tn.nome as nome_turno, j.n_jogo, j.data, m.n_jogos as m_n_jogos, c1.apelido as c1_nome, j.gols_casa, j.gols_visitante, "
                . "c2.apelido as c2_nome, r.n_jogos, r.apelido, tf.nome as tf_nome, "
                . "tn.nome as to_nome, c1.bandeira as c1_band, c2.bandeira as c2_band "
                . "from rodada r "
                . "inner join jogo j "
                . "inner join convidado cc1 "
                . "inner join convidado cc2 "
                . "inner join clube c1 "
                . "inner join clube c2 "
                . "inner join fase f "
                . "inner join tipo_fase tf "
                . "inner join modulo m "
                . "inner join turno tn "
                . "inner join competicao comp "
                . "on r.jogo_idjogo = j.idjogo "
                . "and j.time_casa = cc1.idconvidado "
                . "and j.time_visitante = cc2.idconvidado "
                . "and cc1.idclube = c1.idclube "
                . "and cc2.idclube = c2.idclube "
                . "and r.fase_idfase = f.idfase "
                . "and f.idtipo_fase = tf.idtipo_fase "
                . "and f.idmodulo = m.idmodulo "
                . "and m.idturno = tn.idturno "
                . "and m.idcompeticao = comp.idcompeticao "
                . "and cc2.idclube = ? order by j.data desc ");
        
        $result = $this->db->query($sql, $idclube);

        return $result->result();
    }
    
    public function findRodByFase($idfase) {
        $this->db->select("apelido, n_jogos");
        $this->db->where("fase_idfase", $idfase);
        $this->db->distinct();

        return $this->db->get("rodada")->result();
    }

    public function findJogByRod($fase, $rodada) {
        $this->db->select("j.n_jogo, j.data, c1.apelido as c1_nome, j.gols_casa, j.gols_visitante, c2.apelido as c2_nome, r.n_jogos, r.apelido, c1.bandeira as c1_band, c2.bandeira as c2_band");

        $this->db->from("rodada r");
        $this->db->join("jogo j", "r.jogo_idjogo = j.idjogo", "inner");
        $this->db->join("convidado cc1", "j.time_casa = cc1.idconvidado", "inner");
        $this->db->join("convidado cc2", "j.time_visitante = cc2.idconvidado", "inner");
        $this->db->join("clube c1", "cc1.idclube = c1.idclube", "inner");
        $this->db->join("clube c2", "cc2.idclube = c2.idclube", "inner");
        $this->db->join("fase f", "r.fase_idfase = f.idfase");

        $this->db->where("r.fase_idfase", $fase);
        $this->db->where("r.apelido", $rodada);

        $this->db->order_by("j.n_jogo asc");
        return $this->db->get()->result();
    }
 
}
