<?php

if (!defined("BASEPATH")) {
    exit("No direct access script allowed");
}

/**
 * Description of arbitragem
 *
 * @author joasaraujo
 */
class Usuario extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
     * Validar usuário
     */

    public function validate($user, $pass) {
        $this->db->where("user", $user);
        $this->db->where("pass", $pass);

        $query = $this->db->get("usuario");

        if ($query->num_rows == 1) {
            return true;
        }

        return false;
    }

    /*
     * Verifica se o usuário está logado
     */

    public function logged() {
        $logged = $this->session->userdata("logado");

        if (!isset($logged) || $logged != true) {
            $path = base_url() . "login";
            echo "Voce nao tem permissao para entrar nessa pagina. "
            . "<a href='$path' >Efetuar Login</a>";

            die();
        }
    }

}
