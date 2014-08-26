<?php

if (!defined('BASEPATH')) {
    exit("No direct script access allowed");
}

class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->setTitle("Inicio");
        $this->load->model('noticia');
        $this->load->model('documento');
    }

    public function index() {
        $this->load->js("assets/js/camera_slider/jquery.mobile.customized.min.js");  
        $this->load->js("assets/js/camera_slider/jquery.easing.1.3.js");
        $this->load->js("assets/js/camera_slider/camera.js");
        $this->load->css("assets/js/camera_slider/camera.css");
        $this->load->css("assets/themes/default/css/index.css");
        $this->load->js("assets/themes/default/js/views/default.js");

        $data['news'] = $this->noticia->getLastNews();
        
        $data['news_destaque'] = $this->noticia->getLastDestaques();
        
        $data['documentos'] = $this->documento->findAll("documento", array(), $this->documento->ALL, array('data', 'asc'));
        $this->load->view("site/index", $data);
    }

    public function drop() {
        
    }

    public function insert() {
        
    }

    public function find() {
        
    }

    public function update() {
        
    }

    public function setObject() {
        
    }

}
