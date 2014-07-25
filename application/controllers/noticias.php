<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed!");
}

/**
 * Description of noticias
 *
 * @author joasaraujo
 */
class Noticias extends MY_Controller {

    private $info_img_up = array();

    public function __construct($template = null) {
        parent::__construct($template);
        $this->setTitle("Notícias");
        $this->load->model("noticia");
    }

    public function index($aba = NULL, $url_news = NULL) {
        $data['last_news'] = $this->noticia->getLastNews();
        $data['last_news_fmf'] = $this->noticia->getLastNewsFmf();
        $data['last_news_clubes'] = $this->noticia->getLastNewsClubes();
        $data['last_news_arbitragem'] = $this->noticia->getLastNewsArbitragem();
        $noticia_selecionada = $this->noticia->findBySimpleValueExact('noticia', $this->noticia->ALL, 'url', $url_news, array());
        $data['news_selected'] = $this->managerNews($aba, $noticia_selecionada);
        $data['aba_active'] = $aba;
        $this->load->view("site/noticias", $data);
    }

    private function managerNews($aba, $noticia) {
        $news_selected = array();

        switch ($aba) {
            case 'Ultimas':
                $news_selected = array("news_selected_last" => $noticia);
                break;
            case 'Clubes':
                $news_selected = array("news_selected_clubes" => $noticia);
                break;
            case 'Arbitragem':
                $news_selected = array("news_selected_arbitro" => $noticia);
                break;
            case 'FMF_Acontece':
                $news_selected = array("news_selected_fmf" => $noticia);
                break;
        }

        return $news_selected;
    }

    public function showAll() {
        $value = $this->input->post("input_nome") ? $this->input->post("input_nome") : "";

        $list = $this->noticia->findBySimpleValue("noticia", array("titulo", "descricao", "data"), "titulo", $value);

        $this->loadTable("noticias", array("Título", "Descrição", "Data"), $list);
    }

    public function newElement() {
        $this->output->set_template("admin");
        $this->load->js("assets/js/tinymce/js/tinymce/tinymce.min.js");
        $this->load->js("assets/themes/admin/js/noticias.js");
        $this->load->js("assets/js/jquery-ui/js/jquery-ui-1.10.3.custom.js");
        $this->load->css("assets/js/jquery-ui/css/south-street/jquery-ui-1.10.4.custom.css");

        $this->load->view("admin/nova-noticia");
    }

    public function drop() {
        
    }

    public function find() {
        $this->output->set_template("admin");
    }

    public function insert() {
        $this->output->set_template("admin");

        $msg = $this->setFileUpload();

        if ($msg == "Ok") {

            /**
             * Seta noticia para ser inserida, apenas se for possivel o upload da imagem
             */
            $obj = $this->setObject();
            $idnoticia;
            /**
             * Set colunas da tabela que serão atualizadas
             */
            $this->noticia->setColInsert(array("titulo", "descricao", "url", "texto", "autor", "data", "fmf_acontece", "imagem"));
            /**
             * Verificar se é uma nova noticia, senão atualiza
             */
            if (isset($obj[8])) {
                //atualiza
            } else {
                $idnoticia = $this->noticia->insert("noticia", $obj);                
                switch ($obj[6]){
                    case "arb":
                        //insere noticia em arbitro
                        break;
                    case "clu":
                        //insere noticia em clube
                        break;
                    case "com":
                        //insere noticia em competicao
                        break;
                }
            }
            redirect(base_url() . "noticias/showAll");
        } else {
            $data['msg'] = $msg;
            $this->load->view("admin/nova-noticia", $data);
        }
    }

    public function setObject() {
        $obj = array();
        $obj[0] = $this->input->post("not_titulo");
        $obj[1] = $this->input->post("not_desc");
        $obj[2] = $this->input->post("not_url");
        $obj[3] = $this->input->post("not_texto");
        $obj[4] = $this->input->post("not_autor");

        /*
         * Formatar data
         */
        $a = $this->input->post("not_data");
        $timestamp = date("Y-m-d", strtotime($a)) . " " . date("H:i:s");
        $obj[5] = $timestamp;

        /*
         * Verificar se é uma noticia da fmf
         */
        $b = $this->input->post("not_opt");
        $obj[6] = $b == "fmf" ? 1 : 0;

        $obj[7] = $this->info_img_up['file_name'];

        return $obj;
    }

    public function setFileUpload() {
        /*
         * HELPERS FORM E URL FORAM CARREGADOS no autoload.php
         */

        /**
         * Setar path onde será salva a imagem
         */
        $config['upload_path'] = "assets/images/noticias";

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
        if (!$this->upload->do_upload('not_img')) {
            $data = array('msg' => $this->upload->display_errors());
        } else {
            $data = array('msg' => "Ok");

            $this->info_img_up = $this->upload->data();
        }

        return $data['msg'];
    }

    public function update() {
        
    }

}
