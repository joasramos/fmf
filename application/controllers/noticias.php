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

    public function __construct($template = null) {
        parent::__construct($template);
        $this->setTitle("Notícias");
        $this->load->model("noticia");
    }

    /**
     * 
     * @param type $aba
     * @param type $url_news
     */
    public function index($aba = NULL, $url_news = NULL) {
        $data['last_news'] = $this->noticia->getLastNews();
        $data['last_news_fmf'] = $this->noticia->getLastNewsFmf();
        $data['last_news_clubes'] = $this->noticia->getLastNewsClubes();
        $data['last_news_arbitragem'] = $this->noticia->getLastNewsArbitragem();
        $noticia_selecionada = $this->noticia->findBySimpleValueExact('noticia', $this->noticia->ALL, 'url', $url_news, array());
        $data['news_selected'] = $this->managerNews($aba, $noticia_selecionada);
        $data['aba_active'] = $aba;

        $this->load->js('assets/js/slide-noticia/source/jquery.slides.min.js');
        $this->load->view("site/noticias", $data);
    }

    /**
     * Método para gerenciar qual ABA noticia exibir, quando o usuário
     * selecionar uma noticia. 
     * @param type $aba - ABA SELECIONADA
     * @param type $noticia - OBJETO QUE REPRESENTA A NOTICIA
     * @return type
     */
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

        $news_selected["galeria"] = $this->getGaleria($noticia);

        return $news_selected;
    }

    /*
     * Verificamos a galeria
     */
    private function getGaleria($n) {
        if (count($n)) {
            $dir = 'uploads/' . $n[0]->url . "/";
            if (file_exists($dir)) {
                $files = scandir($dir, 1);
                return $files;
            }
        }
        return array();
    }

    public function showAll() {
        $value = $this->input->post("input_nome") ? $this->input->post("input_nome") : "";

        $list = $this->noticia->findBySimpleValueOrder("noticia", array("idnoticia", "titulo", "descricao", "data"), "titulo", $value, "data desc");

        /*
         * Adicionando ações a tabela padrão
         */
        foreach ($list as $k => $l) {
            $this->extra_action[$k]['url'] = "noticias/mngGallery/" . $l->idnoticia; //função para chamar
            $this->extra_action[$k]['url_icon'] = "assets/images/icon/edit-icon.png"; //icone da ação
        }

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
        $data['noticia'] = $this->noticia->findBySimpleValueExact("noticia", array(), "idnoticia", $id, array());

        /*
         * Verificamos se existe um diretório para essa noticia
         */

        if (!is_dir('uploads/' . $data['noticia'][0]->url)) {
            mkdir('./uploads/' . $data['noticia'][0]->url, 0777, TRUE);
        }


        /**
         * Carregamos area de upload, passando a url da noticia e o id da mema.
         */
        redirect("upload/index/" . $data['noticia'][0]->url . "/" . $id);
    }

    /**
     * Exibe view para cadastro de nova noticia
     */
    public function newElement() {
        $this->output->set_template("admin");

        /*
         * Editor de texto
         */
        $this->load->js("assets/js/tinymce/js/tinymce/tinymce.min.js");
        $this->load->js("assets/themes/admin/js/noticias.js");

        /*
         * Jquery Library necessária para carregarmos o módulo do calendário
         */
        $this->load->js("assets/js/jquery-ui/js/jquery-ui-1.10.3.custom.js");

        /**
         * Estilo do calendário
         */
        $this->load->css("assets/js/jquery-ui/css/south-street/jquery-ui-1.10.4.custom.css");

        /*
         * Carregamos tipo da noticia
         */
        $data['tipo_n'] = $this->noticia->getTipoNoticia();

//        GAMBIARRA DETECTADA - (Deveriamos ter entidades clube e arbitragem chamando o metodo findAll, mas assim funciona :) )
        $data['clubes'] = $this->noticia->findAll("clube", array(), array(), array());
        $data['arbitragem'] = $this->noticia->findAll("arbitro", array(), array(), array());
//        END GAMBIARRA

        $this->load->view("admin/nova-noticia", $data);
    }

    public function drop() {
        $idnot = $this->input->post('idnoticia');
        $idtipo = $this->input->post('idtipo');

        /**
         * Verificamos qual o tipo da noticia e excluimos-o
         */
        //CODIGO AQUI

        /*
         * Excluimos a Galeria
         */

        //CODIGO AQUI
        /*
         * Enfim, deletamos a noticia
         */
        //CODIGO AQUI
    }

    public function find() {
        $this->output->set_template("admin");
    }

    /**
     *  Método para seta um objeto array que representa uma noticia.
     * Dados são recuperados via POST
     * @return um objeto que representa uma noticia
     */
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

    /**
     * Método para inserir ou atualizar uma noticia no banco
     */
    public function insert() {
        $this->output->set_template("admin");

        /**
         * Setamos o objeto noticia
         */
        $obj = $this->setObject();

        if (isset($obj["idnoticia"])) {
            //SE ESTAMOS EDITANDO
        } else {

            /**
             * Inserimos e recuperamos o id da noticia inserida
             */
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

}
