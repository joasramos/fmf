<?php

/**
 * Description of MY_Controller
 *
 * @author joasaraujo
 */
abstract class MY_Controller extends CI_Controller {

    public $extra_action = array();

    public function __construct($template = null) {
        parent::__construct();
        /*
         * Carregando-se o helper url
         */
        $this->load->helper('url');

        /**
         * Carregando models necessários
         */
        $this->load->model('clube');
        $this->load->model('competicao');

        /*
         * Carregamos os clubes exibidos na homepage
         */
        $this->loadClubes();

        /**
         * Carregamos as competições exibidas na combobox na home page
         */
        $this->loadCompeticao();
        $this->_init($template);
    }

    protected function _init($template) {
        /**
         * Carrega Jquery para todas as views
         */
//        $this->load->js("assets/themes/default/js/jquery-1.9.1.min.js");
        $this->load->js("assets/js/iview_slider/js/jquery-1.7.1.min.js");
        $this->load->js("assets/js/jquery-ui/js/jquery-ui-1.10.4.custom.min.js");
        $this->load->js("assets/js/jquery.bpopup.min.js");
        $this->load->js("assets/themes/default/js/views/default.js");
        $this->load->css("assets/js/jquery-ui/css/cupertino/jquery-ui-1.10.3.custom.css");

        if ($template == null) {
            $template = 'default';
        }

        $this->output->set_template($template);
    }

    /*
     * Método para ajustar titulo da página
     */

    function setTitle($title) {
        $this->output->set_title($title);
    }

    /**
     * 
     * Método para passar dados para a home page
     */
    function setData($data) {
        $this->output->set_data($data);
    }

    /*
     * Carrega table padrão para entity utilizadas na área admin.
     */

    function loadTable($controle, $colunas, $list) {
        $data['controle'] = $controle;
        $data['colunas'] = $colunas;
        $data['list'] = $list;
        $data['extra'] = $this->extra_action;
        $this->output->set_template("admin");
        $this->load->view("listagem", $data);
    }

    /*
     * Carrega clubes
     */

    private function loadClubes() {
        $data['serie_a'] = $this->clube->getClubeByDivisao('Série A');
        $this->setData($data);
    }

    /*
     * Carrega competições
     */

    private function loadCompeticao() {
        $data['competicao'] = $this->competicao->findBySimpleValueExact("competicao", array('apelido', 'url'), "ano", date('Y'), array());
        $this->setData($data);
    }

    /*
     * Gerar uma url automática do tipo minha-url-gerada.
     * Ex.:  minha url gerada => minha-url-gerada.
     */

    function gerarUrl($str) {
        $variavel_limpa = strtolower(preg_replace("/[^a-zA-Z0-9-]/", "-", strtr(utf8_decode(trim($str)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"), "aaaaeeiooouuncAAAAEEIOOOUUNC-")));

        return $variavel_limpa;
    }

    /*
     * Método utilizado para upload de arquivos
     */

    public function realizaUpload($path = "", $tipo_arq = "", $html_item, $dir = false) {
        /*
         * HELPERS FORM E URL FORAM CARREGADOS no autoload.php
         */
        $input = $html_item ? $html_item : FALSE;

        if (!$input) {
            echo "NÃO FOI POSSIVEL MANIPULAR ARQUIVO PARA UPLOAD";
            return FALSE;
        }

        $this->criarDiretorio($path);

        /**
         * Setar path onde será salva a imagem
         */
        if (!$dir) {
            $config['upload_path'] = "uploads/" . $path;
        } else {
            $config['upload_path'] = $path;
        }



        /**
         * Imagens permitidas
         */
        $config['allowed_types'] = "gif|jpg|png|" . $tipo_arq;

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
        /**
         * Verifica se foi possivel realizar o upload
         */
        if (!$this->upload->do_upload($input)) {
            $data = array('msg' => $this->upload->display_errors());
        } else {
            $data = array('file' => $this->upload->data(), 'status' => 1);
        }

        return $data;
    }

    /**
     * Método para criar um diretorio caso ele não exista
     */
    function criarDiretorio($dir) {
        if (!is_dir('uploads/' . $dir)) {
            mkdir('./uploads/' . $dir, 0777, TRUE);
        }
    }

    abstract function insert();

    abstract function drop();

    abstract function find();

    abstract function setObject();
}
