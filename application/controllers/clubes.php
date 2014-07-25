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
        $value = $this->input->post("input_nome") ? $this->input->post("input_nome") : "";

        $list = $this->clube->findBySimpleValue("clube", array("nome", "apelido"), "nome", $value);
        $this->loadTable("clubes", array("Nome", "Apelido"), $list);
    }

    public function newElement() {
        $this->output->set_template("admin");
        $data['divisoes'] = $this->clube->findAll("divisao", $this->clube->ALL, null, array());
        $this->load->view("admin/novo-clube", $data);
    }

    public function removeConv() {
        $this->output->unset_template();

        print_r($_POST);
    }

    public function drop() {
        
    }

    public function find() {
        $this->output->set_template("admin");
        redirect(base_url() . 'clubes/showAll');
    }

    public function insert() {
        $this->output->set_template("admin");

        $msg = $this->setFileUpload();

        if ($msg == "Ok") {

            $obj = $this->setObject();
            $idclube;
            $this->clube->setColInsert(array("nome", "apelido", "bandeira", "url", "fundacao", "categoria"));
            if ($obj[7]) {
                //atualiza
            } else {
                //insere clube
                $idclube = $this->clube->insert("clube", $obj);
                //insere divisão
                $dv = array();
                $dv[1] = $obj[6];
                $dv[0] = $idclube;
                $this->clube->setColInsert(array("idclube", "iddivisao"));
                $this->clube->insert("divisao_clube", $dv);
            }

            redirect(base_url() . "clubes/showAll");
        } else {
            $data['msg'] = $msg;
            $data['divisoes'] = $this->clube->findAll("divisao", $this->clube->ALL, null, array());
            $this->load->view("admin/novo-clube", $data);
            echo $msg;
        }
    }

    public function setObject() {
        $obj = array();
        $obj[0] = $this->input->post("clu_nome");
        $obj[1] = $this->input->post("clu_ape");
        $obj[2] = $this->info_img_up['file_name'];
        $obj[3] = $this->input->post("clu_url");
        $obj[4] = date("Y-m-d", strtotime($this->input->post("clu_fund")));
        $obj[5] = $this->input->post("clu_cat");
        $obj[6] = $this->input->post("clu_div");
        $obj[7] = $this->input->post("clu_id") ? $this->input->post("clu_id") : null;

        print_r($obj);

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

}
