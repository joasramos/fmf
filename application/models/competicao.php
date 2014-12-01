<?php

if (!defined("BASEPATH")) {
    exit("No direct access script allowed");
}

/**
 * Description of arbitragem
 *
 * @author joasaraujo
 */
class Competicao extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    public function findDistinctCompeticoes() {
        $this->db->select("apelido, url");
        $this->db->distinct();
        return $this->db->get('competicao')->result();
    }

    public function findAllCompeticoes($url, $ano) {
        if ($ano) {
            $this->db->where('ano', $ano);
        }
        $this->db->like('url', $url);
        return $this->db->get('competicao')->result();
    }

    public function findModulos($comp) {
        /*
          select distinct t.nome from competicao c inner join modulo m inner join turno t on t.idturno = m.idturno and m.idcompeticao = c.idcompeticao and c.idcompeticao = 1
         */
        $query = $this->db->query("select distinct t.nome, m.idmodulo from "
                . "competicao c inner join modulo m inner join "
                . "turno t on t.idturno = m.idturno and "
                . "m.idcompeticao = c.idcompeticao " 
                . "and c.idcompeticao = ?", $comp);
        return $query->result();
    }

    public function findClassificacao($comp) {
        $sql = "SELECT c.apelido AS nome_clube, tg.nome AS nome_grupo, f.idfase AS id_fase, f.descricao AS nome_fase, t.nome AS nome_turno, pontos, jogos, vitorias, derrotas, empates, gols_pro, gols_contra, aproveitamento, eliminado FROM classificacao cf INNER JOIN convidado cc INNER JOIN clube c INNER JOIN grupo g INNER JOIN tipo_grupo tg INNER JOIN fase f INNER JOIN tipo_fase tf INNER JOIN modulo m\n"
                . "INNER JOIN turno t INNER JOIN competicao co ON cf.idconvidado = cc.idconvidado AND cc.idclube = c.idclube AND cc.idgrupo = g.idgrupo AND g.idtipo_grupo = tg.idtipo_grupo AND cc.idfase = f.idfase AND f.idtipo_fase = tf.idtipo_fase AND f.idmodulo = m.idmodulo AND m.idturno = t.idturno "
                . "AND m.idcompeticao = co.idcompeticao AND co.idcompeticao = ? order by f.descricao, tg.nome, pontos desc";
        $result = $this->db->query($sql, $comp);

        return $result->result();
    }

    public function findClassificacaoByClube($comp, $idclube) {
        $sql = "SELECT co.nome as nome_comp, c.apelido AS nome_clube, tg.nome AS nome_grupo, f.idfase AS id_fase, f.descricao AS nome_fase, t.nome AS nome_turno, pontos, jogos, vitorias, derrotas, empates, gols_pro, gols_contra, aproveitamento, eliminado "
                . "FROM classificacao cf INNER JOIN convidado cc INNER JOIN clube c INNER JOIN grupo g INNER JOIN tipo_grupo tg INNER JOIN fase f INNER JOIN tipo_fase tf INNER JOIN modulo m\n"
                . "INNER JOIN turno t INNER JOIN competicao co ON cf.idconvidado = cc.idconvidado AND cc.idclube = c.idclube AND cc.idgrupo = g.idgrupo AND g.idtipo_grupo = tg.idtipo_grupo AND cc.idfase = f.idfase AND f.idtipo_fase = tf.idtipo_fase AND f.idmodulo = m.idmodulo AND m.idturno = t.idturno "
                . "AND m.idcompeticao = co.idcompeticao AND c.idclube = ? order by f.descricao, tg.nome, eliminado, pontos desc";
        $result = $this->db->query($sql, $idclube);

        return $result->result();
    }

    public function findClassByModFase($mod, $fase) {
        $sql = "SELECT c.apelido AS nome_clube, tg.nome AS nome_grupo, f.idfase AS id_fase, f.descricao AS nome_fase, t.nome AS nome_turno, pontos, jogos, vitorias, derrotas, empates, gols_pro, gols_contra, aproveitamento, eliminado FROM classificacao cf "
                . "INNER JOIN convidado cc INNER JOIN clube c INNER JOIN grupo g INNER JOIN tipo_grupo tg INNER JOIN fase f INNER JOIN tipo_fase tf INNER JOIN modulo m\n"
                . "INNER JOIN turno t INNER JOIN competicao co ON cf.idconvidado = cc.idconvidado AND cc.idclube = c.idclube AND cc.idgrupo = g.idgrupo AND g.idtipo_grupo = tg.idtipo_grupo AND cc.idfase = f.idfase AND f.idtipo_fase = tf.idtipo_fase AND f.idmodulo = m.idmodulo AND m.idturno = t.idturno "
                . "AND m.idcompeticao = co.idcompeticao AND m.idmodulo = ? AND f.idfase = ? order by f.descricao, tg.nome, eliminado, pontos desc";
        
        $result = $this->db->query($sql, array($mod, $fase));

        return $result->result();
    }

}
