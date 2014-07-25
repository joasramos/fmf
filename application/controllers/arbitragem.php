<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed!");
}

/**
 * Description of arbitragem
 *
 * @author joasaraujo
 */
class Arbitragem extends MY_Controller{

    public function __construct($template = null) {
        parent::__construct($template);
        $this->setTitle("Arbitragem");
    }
    
    public function index(){
        $this->load->view("site/arbitragem");
    }

    public function drop() {
        
    }

    public function find() {
        
    }

    public function insert() {
        
    }

    public function setObject() {
        
    }

    public function update() {
        
    }

}
