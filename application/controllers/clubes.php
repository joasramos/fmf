<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed!");
}

/**
 * Description of clubes
 *
 * @author joasaraujo
 */
class Clubes extends MY_Controller {

    private $info_img_up = array();
    private $msg;

    public function __construct($template = null) {
        parent::__construct($template);
        $this->setTitle("Clubes");
        $this->load->model("clube");
    }

    public function index() {
        $data['serie_a'] = $this->clube->getClubeByDivisao('Série A');
        $this->load->view("site/clubes", $data);
    }

    public function showAll() {
        $this->load->model('usuario');
        $this->usuario->logged();
        $this->usuario->hasPermission(1);

        $this->output->set_template("admin");
        $value = $this->input->post("input_nome") ? $this->input->post("input_nome") : "";

        $list = $this->clube->findBySimpleValue("clube", array('idclube', "nome", "apelido"), "nome", $value);
        $this->loadTable("clubes", array("ID", "Nome", "Apelido"), $list);
    }

    public function newElement() {
        $this->output->set_template("admin");
        $data['divisoes'] = $this->clube->findAll("divisao", $this->clube->ALL, null, array());
        $this->load->view("admin/novo-clube", $data);
    }

    public function insertConv() {
        $this->output->unset_template();
        /*
         * Pega variaveis via post
         */
        $idgrupo = $this->input->post("idgrupo");
        $idclube = $this->input->post("idclube");
        $idfase = $this->input->post("idfase");
        /*
         * Verifica-se se o convidado já não foi inserido
         */
        if (count($this->clube->findConv($idfase, $idgrupo, $idclube)) == 0) {
            /*
             * Insere convidado no grupo
             */
            $this->clube->insereConv($idfase, $idgrupo, $idclube);
        }
        /*
         * Busca os convidados
         */
        $data['conv'] = $this->clube->findCluByGru($idgrupo);

        /*
         * Carrega lista com novos convidados
         */
        $this->load->view("admin/list-conv-add", $data);
    }

    public function removeConv() {
        $this->output->unset_template();
        /*
         * Pega variaveis via post
         */
        $idconv = $this->input->post("idconvidado");
        $idgrupo = $this->input->post("idgrupo");
        /*
         * Insere convidado no grupo
         */
        $this->clube->drop("idconvidado", $idconv, "convidado");
        /*
         * Busca os convidados
         */
        $data['conv'] = $this->clube->findCluByGru($idgrupo);

        /*
         * Carrega lista com novos convidados
         */
        $this->load->view("admin/list-conv-add", $data);
    }

    public function drop($idclube = null) {
        $this->output->unset_template();

        $this->clube->drop("idclube", $idclube, "divisao_clube");
        $this->clube->drop("idclube", $idclube, "clube");

        redirect("clubes/showAll");
    }

    public function find($idclube = null) {
        $this->output->set_template("admin");
        $data["clube"] = $this->clube->findBySimpleValue("clube", $this->clube->ALL, "idclube", $idclube);
        $data['divisoes'] = $this->clube->findAll("divisao", $this->clube->ALL, null, array());
        $this->load->view("admin/novo-clube", $data);
    }

    public function insert() {
        $this->output->set_template("admin");

//        $msg = $this->setFileUpload();
        //if ($this->msg == "Ok") {

        $obj = $this->setObject();
        $idclube;

        if ($obj[7]) {
            $this->clube->setColInsert(array("nome", "apelido", "url", "fundacao", "categoria"));
            //atualiza
            $this->clube->update("idclube", $obj[7], "clube", $obj);
            $idclube = $obj[7];
        } else {
            $this->clube->setColInsert(array("nome", "apelido", "url", "fundacao", "categoria", "bandeira"));
            //insere clube
            $idclube = $this->clube->insert("clube", $obj);
        }

        //insere divisão
        $dv = array();
        $dv[1] = $obj[5];
        $dv[0] = $idclube;
        $dv[2] = date("Y");
        $this->clube->setColInsert(array("idclube", "iddivisao", "ano"));

        //verifica se registro em divisão já existe
        $this->db->where("idclube", $dv[0]);
        $this->db->where("iddivisao", $dv[1]);
        $this->db->where("ano", $dv[2]);

        $result = $this->db->get("divisao_clube")->result();

        if (count($result) == 0) {
            $this->clube->insert("divisao_clube", $dv);
        }

        redirect(base_url() . "clubes/showAll");

        //} else {
        /* $data['msg'] = $this->msg;
          $data['divisoes'] = $this->clube->findAll("divisao", $this->clube->ALL, null, array());
          $this->load->view("admin/novo-clube", $data);
          echo $this->msg; */
        //}
    }

    public function setObject() {
        $obj = array();

        $obj[7] = $this->input->post("idclube") ? $this->input->post("idclube") : null;

        $obj[0] = $this->input->post("clu_nome");
        $obj[1] = $this->input->post("clu_ape");

        if ($obj[7] == null) {
            $this->msg = $this->setFileUpload();
            $obj[8] = $this->info_img_up['file_name'];
        }

        $obj[2] = $this->gerarUrl($obj[0]);
        $obj[3] = date("Y-m-d", strtotime($this->input->post("clu_fund")));
        $obj[4] = $this->input->post("clu_cat");
        $obj[5] = $this->input->post("clu_div");

//        print_r($obj);

        return $obj;
    }

    public function setFileUpload() {
        /*
         * HELPERS FORM E URL FORAM CARREGADOS no autoload.php
         */

        /**
         * Setar path onde será salva a imagem
         */
        $config['upload_path'] = "assets/images/escudos";

        /**
         * Imagens permitidas
         */
        $config['allowed_types'] = "gif|jpg|png";

        /**
         * Sobrescrever caso imagem já exista
         */
        $config['overwrite'] = "TRUE";

        /**
         * Carregar a biblioteca que realiza upload
         */
        $this->load->library('upload');

        /**
         * Inicializa a programa de upload
         */
        $this->upload->initialize($config);

        /**
         * Seta tipos permitidos
         */
//        $this->upload->set_allowed_types("*");
        //$data['upload_data'] = '';

        /**
         * Verifica se foi possivel realizar o upload
         */
        if (!$this->upload->do_upload('clu_band')) {
            $data = array('msg' => $this->upload->display_errors());
        } else {
            $data = array('msg' => "Ok");

            $this->info_img_up = $this->upload->data();
        }

        return $data['msg'];
    }

    public function showDetailClube($idclube = null) {
        $this->output->unset_template();
        /**
         * Buscar o clube
         */
        $data['clube_info'] = $this->clube->findBySimpleValueExact("clube", $this->clube->ALL, "idclube", $idclube, array());

        /**
         * Buscar jogos do clube
         */
        $this->load->model("rodada");
        $data['clube_jogos']['casa'] = $this->rodada->findRodadaByClube($idclube);
        $data['clube_jogos']['fora'] = $this->rodada->findRodadaByClubeOut($idclube);

        /**
         * Buscar classificação do clube
         */
        $this->load->model("competicao");
        $data["cla"] = $this->competicao->findClassificacaoByClube(null, $idclube);

        /**
         * Exibir view com detalhes do clube
         */
        $this->load->view("site/detail-clube", $data);
    }

    function mngClubes() {
        $this->output->unset_template();

        $serie = $this->input->post('serie');

        $data['clubes'] = $this->clube->getClubeByDivisao($serie);

        $this->load->view("site/club-div", $data);
    }

}
