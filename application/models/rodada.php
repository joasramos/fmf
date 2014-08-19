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
        $sql = ("select j.n_jogo, j.data, m.n_jogos as m_n_jogos, c1.apelido as c1_nome, j.gols_casa, j.gols_visitante, "
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
        $sql = ("select tf.nome as nome_fase, tn.nome as nome_turno, comp.nome as nome_comp, j.n_jogo, j.data, m.n_jogos as m_n_jogos, c1.apelido as c1_nome, j.gols_casa, j.gols_visitante, "
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
        $sql = ("select tf.nome as nome_fase, tn.nome as nome_turno, j.n_jogo, j.data, m.n_jogos as m_n_jogos, c1.apelido as c1_nome, j.gols_casa, j.gols_visitante, "
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
    
    /*
     * Método para buscar os detalhes de um determinado jogo.
     * Retorna um array que representa o jogo
     */
     public function findJogoDetail($idjogo) {
        $sql = ("select tf.nome as nome_fase, tn.nome as nome_turno, comp.nome as nome_comp, j.n_jogo, j.data, m.n_jogos as m_n_jogos, c1.apelido as c1_nome, j.gols_casa, j.gols_visitante, "
                . "c2.apelido as c2_nome, r.n_jogos, r.apelido, tf.nome as tf_nome, "
                . "tn.nome as to_nome, c1.bandeira as c1_band, c2.bandeira as c2_band "
                . "from rodada_fix r "
                . "inner join jogo_new j "
                . "inner join convidado cc1 "
                . "inner join convidado cc2 "
                . "inner join clube c1 "
                . "inner join clube c2 "
                . "inner join fase f "
                . "inner join tipo_fase tf "
                . "inner join modulo m "
                . "inner join turno tn "
                . "inner join competicao comp "
                . "on r.idrodada = j.idrodada "
                . "and j.time_casa = cc1.idconvidado "
                . "and j.time_visitante = cc2.idconvidado "
                . "and cc1.idclube = c1.idclube "
                . "and cc2.idclube = c2.idclube "
                . "and r.idfase = f.idfase "
                . "and f.idtipo_fase = tf.idtipo_fase "
                . "and f.idmodulo = m.idmodulo "
                . "and m.idturno = tn.idturno "
                . "and m.idcompeticao = comp.idcompeticao "
                . "and j.idjogo_new = ? order by j.data desc ");

        $result = $this->db->query($sql, $idjogo);

        return $result->result();
    }

    public function findRodByFase($idfase) {
        $this->db->select("idrodada, apelido, n_jogos");
        $this->db->where("idfase", $idfase);
//        $this->db->distinct();

        return $this->db->get("rodada_fix")->result();
    }

    /**
     * Busca todos jogos de uma determinada rodada.
     * Usado na area administrativa. 
     * @param type $rodada
     * @return type
     */
    public function findJogByRod($rodada) {
        $this->db->select("j.idjogo_new, j.n_jogo, j.data, c1.apelido as c1_nome, j.gols_casa, j.gols_visitante, c2.apelido as c2_nome, r.n_jogos, r.apelido, c1.bandeira as c1_band, c2.bandeira as c2_band");

        $this->db->from("rodada_fix r");
        $this->db->join("jogo_new j", "r.idrodada = j.idrodada", "inner");
        $this->db->join("convidado cc1", "j.time_casa = cc1.idconvidado", "inner");
        $this->db->join("convidado cc2", "j.time_visitante = cc2.idconvidado", "inner");
        $this->db->join("clube c1", "cc1.idclube = c1.idclube", "inner");
        $this->db->join("clube c2", "cc2.idclube = c2.idclube", "inner");

        $this->db->where("r.idrodada", $rodada);

        $this->db->order_by("j.n_jogo asc");
        return $this->db->get()->result();
    }

    /** 
     * Método para retornar o maior numero de um jogo de uma rodada em uma fase
     */

    public function getMaxNjogo($rodada) {

        $this->db->select("max(n_jogo) as n_jogo");
        $this->db->from("jogo_new j");
        $this->db->join("rodada_fix r", "j.idrodada = r.idrodada", "inner");
        $this->db->where("r.idrodada", $rodada);

        /*
          $sql = "SELECT max(n_jogo) as n_jogo FROM jogo j
          INNER JOIN rodada r ON j.idjogo = r.jogo_idjogo
          WHERE r.fase_idfase = ?";
         */
        $result = $this->db->get()->result();

        return $result[0]->n_jogo;
    }

//    public function updateRod($fase, $rodada, $data) {
//        $this->db->where("fase_idfase", $fase);
//        $this->db->where("apelido", $rodada);
//        return $this->db->update("rodada", $data);
//    }

}
