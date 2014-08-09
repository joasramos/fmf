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

        $list = $this->noticia->findBySimpleValueOrder("noticia", array("idnoticia", "titulo", "descricao", "data"), "titulo", $value, "data desc");

        /*
         * Adicionando ações a tabela padrão
         */
        $this->extra_action[0]['url'] = "noticias/mngGallery/" . $list[0]->idnoticia; //função para chamar
        $this->extra_action[0]['url_icon'] = "assets/images/icon/edit-icon.png"; //icone da ação

        $this->loadTable("noticias", array("ID", "Título", "Descrição", "Data"), $list);
    }

    /*
     * Método para carrega a galeria de imagens de uma
     * noticia.
     * O id da noticia é passado por parametro
     */

    public function mngGallery($id = null) {
        $this->output->set_template("admin");
        
        /**
         * Buscamos dados da noticia
         */
        echo $id;
        
        /*
         * Verificamos se existe um diretório para essa noticia
         */
        
        
        /**
         * Carregamos area de upload
         */
    }

    public function newElement() {
        $this->output->set_template("admin");
        $this->load->js("assets/js/tinymce/js/tinymce/tinymce.min.js");
        $this->load->js("assets/themes/admin/js/noticias.js");
        $this->load->js("assets/js/jquery-ui/js/jquery-ui-1.10.3.custom.js");
        $this->load->css("assets/js/jquery-ui/css/south-street/jquery-ui-1.10.4.custom.css");

        $data['tipo_n'] = $this->noticia->getTipoNoticia();

//        GAMBIARRA DETECTADA
        $data['clubes'] = $this->noticia->findAll("clube", array(), array(), array());
        $data['arbitragem'] = $this->noticia->findAll("arbitro", array(), array(), array());
//        END GAMBIARRA

        $this->load->view("admin/nova-noticia", $data);
    }

    public function drop() {
        
    }

    public function find() {
        $this->output->set_template("admin");
    }

    public function setObject() {
        $obj = array();

        $obj["idtipo_noticia"] = $this->input->post("not_tipo");
        $obj["titulo"] = $this->input->post("not_titulo");
        $obj["descricao"] = $this->input->post("not_desc");

        /*
         * Gerando URL
         */

        $obj["url"] = $this->gerarUrl($obj['descricao']);

        $obj["texto"] = $this->input->post("not_texto");
        $obj["autor"] = $this->input->post("not_autor");

        /*
         * Formatar data
         */
        $a = $this->input->post("not_data");
        $timestamp = date("Y-m-d", strtotime($a)) . " " . date("H:i:s");
        $obj["data"] = $timestamp;

        /*
         * Verifica-se o tipo da noticia. Caso igual a 4, marcamos como noticia do tipo FMF Acontece
         */
        $obj["fmf_acontece"] = $obj["idtipo_noticia"] == 4 ? 1 : 0;

        $tipo = $this->input->post("not_dest");

        if (isset($tipo)) {
            $obj["destaque"] = 1;
        }

        return $obj;
    }

    public function insert() {
        $this->output->set_template("admin");

        $obj = $this->setObject();

//        print_r($this->input->post());
        if (isset($obj["idnoticia"])) {
            
        } else {

            $idnoticia = $this->noticia->insertSimple("noticia", $obj);
            $data["idnoticia"] = $idnoticia;

            switch ($obj["idtipo_noticia"]) {
                case "2":
                    //insere noticia em clube                
                    $data["clube_idclube"] = $this->input->post("not_clube");
                    $this->noticia->insertSimple("noticia_clube", $data);
                    break;
                case "3":
                    //insere noticia em arbitro
                    $data["idarbitro"] = $this->input->post("not_arb");
                    $this->noticia->insertSimple("noticia_arbitro", $data);
                    break;
            }
        }

        redirect("noticias/showAll", "refresh");
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
