<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed!");
}

/**
 * Description of estadios
 *
 * @author joasaraujo
 */
class Fases extends MY_Controller {

    public function __construct($template = null) {
        parent::__construct("admin");
        $this->load->model("fase");
    }

    public function index() {
        
    }

    public function drop() {
        $this->output->unset_template();
        $idfase = $this->input->post("idfase");
        $this->fase->drop('idfase', $idfase, "fase");
    }

    /**
     * Método é chamado na aba classificação de uma competição, na página
     * cliente do site.
     * 
     * Toda vez que um módulo, na mesma página, é selecionado esse método
     * é executado
     * 
     * @return lista de fases de um determinado modulo
     */
    public function getFasesByMod() {
        $this->output->unset_template();
        echo json_encode($this->fase->findFaseByMod($this->input->post("idmod")));
    }

    public function find() {
        
    }

    public function insert() {
        $this->output->unset_template();
        $obj = $this->setObject();

        $this->fase->setColInsert(array("idtipo_fase", "idmodulo", "n_jogos", "n_grupos", "regra_ida_e_volta", "descricao"));
        $idfase = 0;
        /* Insere */
        if (!$obj[6]) {
            $idfase = $this->fase->insert("fase", $obj);
        } else {
            $this->fase->update("idfase", $obj[6], "fase", $obj);
        }

        /*
         * Inserimos grupo padrão caso não haja grupo
         */
        if (!$obj[3]) {
            $this->load->model("grupo");
            $g[0] = 3;
            $g[1] = !$obj[6] ? $idfase : $obj[6];
            $this->grupo->setColInsert(array("idtipo_grupo", "idfase"));
            $this->grupo->insert("grupo", $g);
        }
    }

    public function setObject() {
        $obj = array();

        $obj[0] = $this->input->post("tipo_fase");
        $obj[1] = $this->input->post("idmod");
        $obj[2] = $this->input->post("fase_n_jog");
        $obj[3] = !$this->input->post("fase_n_gru") ? 1 : $this->input->post("fase_n_gru");
        $obj[4] = $this->input->post("fase_ida_volta") ? 1 : 0;
        $obj[5] = $this->input->post("fase_desc");

        if ($this->input->post("idfase")) {
            $obj[6] = $this->input->post("idfase");
        }

        return $obj;
    }

    public function showGrupos() {
        $this->output->unset_template();
        $this->load->model("grupo");
        /*
         * Buscar Fases de um modulo especificado por ID
         */
        $data['grupos'] = $this->grupo->findGrupoByFase($this->input->post("idfase"));

        /**
         * Carregar view
         */
        $this->load->view("admin/list-grupo", $data);
    }

    public function showRodadas() {
        $this->output->unset_template();
        $idfase = $this->input->post('idfase');

        $this->load->model("rodada");
        $data['rodadas'] = $this->rodada->findRodByFase($idfase);

        $this->load->view('admin/list-rodada', $data);
    }

    /*
     * Exibe jogos de uma determinada rodada
     */
    public function showJogos() {
        $this->output->unset_template();

//        $apelido = $this->input->post('apelido');
        $rodada = $this->input->post('idrodada');

        $this->load->model("rodada");
        $data['jogos'] = $this->rodada->findJogByRod($rodada);

        $this->load->view('admin/list-jogos', $data);
    }

    public function cadFaseView($idfase = null) {
        $this->output->unset_template();
        $data['fase'] = $this->fase->findBySimpleValueExact("fase", array(), "idfase", $idfase, array());
        $data['tipo_fases'] = $this->fase->findTipoFase();
        $this->load->view("admin/cad-fase", $data);
    }

}
