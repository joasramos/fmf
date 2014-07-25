<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed!");
}

/**
 * Description of federacao
 *
 * @author joasaraujo
 */
class Federacao extends MY_Controller {

    public function __construct($template = null) {
        parent::__construct($template);
        $this->setTitle("Federação");
    }

    public function index() {
        $this->load->view("site/federacao");
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
