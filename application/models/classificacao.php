<?php

if (!defined("BASEPATH")) {
    exit("No direct access script allowed");
}

/**
 * Description of arbitragem
 *
 * @author joasaraujo
 */
class Classificacao extends MY_Model {

    private $jogo;

    /*
     * Representa o convidado que joga em casa
     */
    private $cConv = array("idjogo" => 0, "idconvidado" => 0, "jogos" => 1, "pontos" => 0,
        "vitoria" => 0, "empate" => 0, "derrota" => 0, "gols_pro" => 0,
        "gols_contra" => 0);

    /*
     * Representa o convidado que joga fora de casa
     */
    private $fConv = array("idjogo" => 0, "idconvidado" => 0, "jogos" => 1, "pontos" => 0,
        "vitoria" => 0, "empate" => 0, "derrota" => 0, "gols_pro" => 0,
        "gols_contra" => 0);

    public function __construct() {
        parent::__construct();
    }

    public function setJogo($jogo) {
        $this->jogo = $jogo;
    }

    /*
     * Método para gerenciar classificação
     */

    public function mngClassi() {
        $this->mngConvMand();
        $this->mngConvVisit();
        $this->verifyWins();

        /*
         * Verificando se o jogo já existe em class_parcial
         */
        $j = $this->findBySimpleValue("class_parcial", $this->ALL, "idjogo", $this->jogo["idjogo"]);
        if ($j) {

            echo " ÁREA SOMBRIA. ";

            /*
             * Ajustando classificação geral mandante.
             * Verificamos se houve alteração no resultado do jogo, bem como, 
             * o time que venceu, perdeu ou empatou.
             */

            if ($j[0]->pontos != $this->cConv['pontos']) {
                $this->cConv['jogos'] = 0;
                $this->fConv['jogos'] = 0;
                /*
                 * Se o time mandante tiver ganhado e depois foi verificado que ele perdeu,
                 * esta condição é realizada
                 */
                if (($this->cConv['pontos'] - $j[0]->pontos) == -3) {
                    $this->cConv['pontos'] = -3; //em caso de troca de vitoria por derrota
//                    $this->fConv['pontos'] = 3;
                    $this->cConv['vitoria'] = -1;
//                    $this->fConv['vitoria'] = 1;
//                    $this->cConv['derrota'] = 1;
                    $this->fConv['derrota'] = -1;
                }
                /*
                 * Senão se o time mandante tiver ganhado e depois foi verificado que ele empatou,
                 * esta condição é realizada
                 */ else if (($this->cConv['pontos'] - $j[0]->pontos) == -2) {
                    $this->cConv['pontos'] = -2; //em caso de troca de vitoria por empate
                    $this->cConv['vitoria'] = -1;
//                    $this->cConv['empate'] = 1;
                    $this->fConv['derrota'] = -1;
//                    $this->fConv['empate'] = 1;
                }
                /*
                 * Senão se o time mandante tiver perdido e depois foi verificado que ele ganhou,
                 * esta condição é realizada
                 */ else if (($this->cConv['pontos'] - $j[0]->pontos) == 3) {
//                    $this->cConv['pontos'] = 3; //em caso de troca de vitoria por derrota
                    $this->fConv['pontos'] = -3;
//                    $this->cConv['vitoria'] = 1;
                    $this->fConv['vitoria'] = -1;
                    $this->cConv['derrota'] = -1;
//                    $this->fConv['derrota'] = 1;
                }
                /* 
                 * Senão se o time mandante tiver empatado e depois foi verificado que ele ganhou,
                 * esta condição é realizada
                 */ else if (($this->cConv['pontos'] - $j[0]->pontos) == 2) {
                    $this->cConv['pontos'] = 2; //em caso de troca de vitoria por empate
//                    $this->cConv['vitoria'] = 1;
                    $this->cConv['empate'] = -1;
//                    $this->fConv['derrota'] = 1;
                    $this->fConv['empate'] = -1;
                }
            }

            /*
             * Verificamos se houver mudança no placar, gols marcados e gols contra
             */
            $this->ajustaPlacar($j);
            /*
             * Ajustando classificação parcial mandante
             */
            $this->updateClassParcial($this->cConv);
            /*
             * Ajustando classificação parcial do visitante
             */
            $this->updateClassParcial($this->fConv);
        } else {
            $this->insertSimple("class_parcial", $this->cConv);
            $this->insertSimple("class_parcial", $this->fConv);
        }

        $this->updateClassGeral();
    }

    private function ajustaPlacar($j) {
        if (($this->cConv['gols_pro'] - $j[0]->gols_pro) != 0) {
            $this->cConv['gols_pro'] = $this->cConv['gols_pro'] - $j[0]->gols_pro;
        }

        if (($this->fConv['gols_pro'] - $j[1]->gols_pro) != 0) {
            $this->fConv['gols_pro'] = $this->fConv['gols_pro'] - $j[1]->gols_pro;
        }

        if (($this->cConv['gols_contra'] - $j[0]->gols_contra) != 0) {
            $this->cConv['gols_contra'] = $this->cConv['gols_contra'] - $j[0]->gols_contra;
        }

        if (($this->fConv['gols_contra'] - $j[1]->gols_contra) != 0) {
            $this->fConv['gols_contra'] = $this->fConv['gols_contra'] - $j[1]->gols_contra;
        }
    }

    /*
     * Gerencia classificação do mandante
     */

    private function mngConvMand() {
        /*
         * Setamos dados do convidado mandante
         */
        $this->cConv['idjogo'] = $this->jogo['idjogo'];
        $this->cConv['idconvidado'] = $this->jogo['mandante'];
        $this->cConv['gols_pro'] = $this->jogo['clube_casa_gols'];
        $this->cConv['gols_contra'] = $this->jogo['clube_fora_gols'];
    }

    /*
     * Gerencia classificação do mandante
     */

    private function mngConvVisit() {
        /*
         * Setamos dados do convidado mandante
         */
        $this->fConv['idjogo'] = $this->jogo['idjogo'];
        $this->fConv['idconvidado'] = $this->jogo['visitante'];
        $this->fConv['gols_pro'] = $this->jogo['clube_fora_gols'];
        $this->fConv['gols_contra'] = $this->jogo['clube_casa_gols'];
    }

    /*
     * Verifica quem ganhou e seta as variaveis correspondentes.
     */

    private function verifyWins() {
        if ($this->jogo['clube_casa_gols'] > $this->jogo['clube_fora_gols']) {
            $this->cConv['pontos'] = 3;
            $this->cConv['vitoria'] = 1;
            $this->fConv['derrota'] = 1;
        } else if ($this->jogo['clube_casa_gols'] < $this->jogo['clube_fora_gols']) {
            $this->fConv['pontos'] = 3;
            $this->fConv['vitoria'] = 1;
            $this->cConv['derrota'] = 1;
        } else {
            $this->cConv['pontos'] = 1;
            $this->fConv['pontos'] = 1;
            $this->cConv['empate'] = 1;
            $this->fConv['empate'] = 1;
        }
    }

    private function updateClassGeral() {
        $this->updateMandante();
        $this->updateVisitante();
    }

    private function updateMandante() {
        $c_after = array();
        $c = array();

        $c_after = $this->findBySimpleValue("classificacao", $this->ALL, "idconvidado", $this->cConv['idconvidado']);

        /* Se c_after for vazio inserimos nova classificação para o convidado */
        if ($c_after) {
            $c['jogos'] = $this->cConv['jogos'] + $c_after[0]->jogos;
            $c['pontos'] = $this->cConv['pontos'] + $c_after[0]->pontos;
            $c['vitorias'] = $this->cConv['vitoria'] + $c_after[0]->vitorias;
            $c['derrotas'] = $this->cConv['derrota'] + $c_after[0]->derrotas;
            $c['empates'] = $this->cConv['empate'] + $c_after[0]->empates;
            $c['gols_pro'] = $this->cConv['gols_pro'] + $c_after[0]->gols_pro;
            $c['gols_contra'] = $this->cConv['gols_contra'] + $c_after[0]->gols_contra;

            $this->updateSimple("classificacao", $c, "idconvidado", $this->cConv['idconvidado']);
        } else {
            $c['idconvidado'] = $this->cConv['idconvidado'];
            $c['jogos'] = $this->cConv['jogos'];
            $c['pontos'] = $this->cConv['pontos'];
            $c['vitorias'] = $this->cConv['vitoria'];
            $c['derrotas'] = $this->cConv['derrota'];
            $c['empates'] = $this->cConv['empate'];
            $c['gols_pro'] = $this->cConv['gols_pro'];
            $c['gols_contra'] = $this->cConv['gols_contra'];

            $this->insertSimple("classificacao", $c);
        }
    }

    private function updateVisitante() {
        $c_after = array();
        $c = array();

        $c_after = $this->findBySimpleValue("classificacao", $this->ALL, "idconvidado", $this->fConv['idconvidado']);

        /* Se c_after for vazio inserimos nova classificação para o convidado */
        if ($c_after) {
            $c['jogos'] = $this->fConv['jogos'] + $c_after[0]->jogos;
            $c['pontos'] = $this->fConv['pontos'] + $c_after[0]->pontos;
            $c['vitorias'] = $this->fConv['vitoria'] + $c_after[0]->vitorias;
            $c['derrotas'] = $this->fConv['derrota'] + $c_after[0]->derrotas;
            $c['empates'] = $this->fConv['empate'] + $c_after[0]->empates;
            $c['gols_pro'] = $this->fConv['gols_pro'] + $c_after[0]->gols_pro;
            $c['gols_contra'] = $this->fConv['gols_contra'] + $c_after[0]->gols_contra;

            $this->updateSimple("classificacao", $c, "idconvidado", $this->fConv['idconvidado']);
        } else {
            $c['idconvidado'] = $this->fConv['idconvidado'];
            $c['jogos'] = $this->fConv['jogos'];
            $c['pontos'] = $this->fConv['pontos'];
            $c['vitorias'] = $this->fConv['vitoria'];
            $c['derrotas'] = $this->fConv['derrota'];
            $c['empates'] = $this->fConv['empate'];
            $c['gols_pro'] = $this->fConv['gols_pro'];
            $c['gols_contra'] = $this->fConv['gols_contra'];

            $this->insertSimple("classificacao", $c);
        }
    }

    private function updateClassParcial($data) {

        $this->db->where("idconvidado", $data["idconvidado"]);
        $this->db->where("idjogo", $data["idjogo"]);

        $this->db->update("class_parcial", $data);
    }

}
