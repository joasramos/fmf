<?php

if (!defined("BASEPATH")) {
    exit("No direct access script allowed");
}

/**
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

//    public function validate($user, $pass) {
//        $this->db->where("user", $user);
//        $this->db->where("pass", $pass);
//
//        $query = $this->db->get("usuario");
//
//        if ($query->num_rows == 1) {
//            return true;
//        }
//
//        return false;
//    }


    public function validate($user, $pass) {
        $this->db->where("user", $user);
        $this->db->where("pass", $pass);

        $query = $this->db->get("usuario");

//        print_r($query->result());

        if ($query->num_rows == 1) {
            return $query->result();
        }

        return array();
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

    /*
     * Verifica permissão do usuário
     */

    public function hasPermission($p) {
        if(is_array($p)){
            $this->verifyAllPermission($p);
        }else{
            $this->verifyOnePermission($p);
        }
    }

    public function verifyAllPermission($p_list) {

        $permission = $this->session->userdata("tipo_usuario");
        $x = false;
        foreach ($p_list as $p) {
            if ($p == $permission) {
                $x = true;
            }
        }

        if ($x == false) {
            echo "Voce nao tem permissao para entrar nessa pagina. ";
            die();
        }
    }

    public function verifyOnePermission($p) {
        $permission = $this->session->userdata("tipo_usuario");
        if ($p != $permission) {
            echo "Voce nao tem permissao para entrar nessa pagina. ";
            die();
        }
    }

}
