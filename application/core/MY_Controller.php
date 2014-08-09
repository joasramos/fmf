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
        $this->loadClubes();
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

    function setTitle($title) {
        $this->output->set_title($title);
    }

    function setData($data) {
        $this->output->set_data($data);
    }

    function loadTable($controle, $colunas, $list) {
        $data['controle'] = $controle;
        $data['colunas'] = $colunas;
        $data['list'] = $list;
        $data['extra'] = $this->extra_action;
        $this->output->set_template("admin");
        $this->load->view("listagem", $data);
    }

    private function loadClubes() {
        $data['serie_a'] = $this->clube->getClubeByDivisao('Série A');
        $this->setData($data);
    }

    private function loadCompeticao() {
        $data['competicao'] = $this->competicao->findBySimpleValueExact("competicao", array('apelido', 'url'), "ano", date('Y'), array());
        $this->setData($data);
    }

    function gerarUrl($str) {
        $variavel_limpa = strtolower(preg_replace("/[^a-zA-Z0-9-]/", "-", strtr(utf8_decode(trim($str)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"), "aaaaeeiooouuncAAAAEEIOOOUUNC-")));

        return $variavel_limpa;
    }

    abstract function insert();

    abstract function drop();

    abstract function find();

    abstract function setObject();
}
