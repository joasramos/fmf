<?php

if (!defined("BASEPATH")) {
    exit("No direct access script allowed");
}

/**
 * Description of MY_Model
 * Modelo abstrato para funções comuns entres os modelos
 * criados
 * @author joasaraujo
 */
class MY_Model extends CI_Model {

    private $col_insert = array();
    public $ALL = array();

    public function __construct() {
        parent::__construct();
    }

    /**
     * Metodo para retornar todos os dados de uma tabela no banco
     * @param type $entity - representa a tabela 
     * @return type - uma lista com todos os dados
     */
    public function findAll($entity, $columns, $count, $order) {

        if (count($columns) > 0) {
            $this->db->select(implode(", ", $columns));
        }

        if (is_int($count)) {
            $query = $this->db->get($entity, $count);
        } else {
            $query = $this->db->get($entity);
        }

        if (count($order) > 1) {
            $this->db->order_by($order[0] . " " . $order[1]);
        }

        return $query->result();
    }

    /**
     * Metodo para retornar um registro especifico
     * @param type $entity - representa a tabela onde será feita a busca
     * @param type $column - a coluna para filtrar
     * @param type $value - o valor do filtro
     * @param type $count - quantos valores buscar
     * @return type - uma lista de objetos
     */
    public function findBySimpleValue($entity, $columns, $column, $value) {
        if (count($columns) > 0) {
            $this->db->select(implode(", ", $columns));
        }
        $this->db->like($column, $value);
        return $this->db->get($entity)->result();
    }

    public function findBySimpleValueOrder($entity, $columns, $column, $value, $order) {
        if (count($columns) > 0) {
            $this->db->select(implode(", ", $columns));
        }
        $this->db->like($column, $value);
        $this->db->order_by($order);
        return $this->db->get($entity)->result();
    }

    /**
     * Metodo para retornar um registro especifico
     * @param type $entity - representa a tabela onde será feita a busca
     * @param type $column - a coluna para filtrar
     * @param type $value - o valor do filtro
     * @param type $count - quantos valores buscar
     * @return type - uma lista de objetos
     */
    public function findBySimpleValueExact($entity, $columns, $column, $value, $order) {
        if (count($columns) > 0) {
            $this->db->select(implode(", ", $columns));
        }
        if (count($order) > 1) {
            $this->db->order_by($order[0] . " " . $order[1]);
        }
        $this->db->where($column, $value);
        return $this->db->get($entity)->result();
    }

    /**
     * 
     * @param type $entity tabela onde serão inseridos dos dados
     * @param type $values valores que serão inseridos
     * @return type retorn o id do item inserido
     */
    public function insert($entity, $values) {
        $data = array();

        foreach ($this->col_insert as $key => $coluna) {
            $data[$coluna] = $values[$key];
        }

        $this->db->trans_start();
        $this->db->insert($entity, $data);
        $id = $this->db->insert_id();
        $this->db->trans_complete();

        return $id;
    }

    public function insertSimple($entity, $data) {

        $this->db->trans_start();
        $this->db->insert($entity, $data);
        $id = $this->db->insert_id();
        $this->db->trans_complete();

        return $id;
    }

    /**
     * 
     * @param type $id - determina por qual campo o elemento será atualizado
     * @param type $idvalue - valor do campo
     * @param type $entity - a tabela que sofrerá a atualização
     * @param type $values - array com os valores
     * @return type
     */
    public function update($id, $idvalue, $entity, $values) {
        $data = array();

        foreach ($this->col_insert as $key => $coluna) {
            $data[$coluna] = $values[$key];
        }

        $this->db->where($id, $idvalue);
        return $this->db->update($entity, $data);
    }

    public function updateSimple($entity, $data, $id, $value) {
        $this->db->where($id, $value);
        return $this->db->update($entity, $data);
    }

    /**
     * 
     * @param type $id - determina por qual campo o elemento será deletado
     * @param type $value - valor do campo
     * @param type $entity - a tabela que sofrerá a deleção
     */
    public function drop($id, $value, $entity) {
        $this->db->where($id, $value);
        $this->db->delete($entity);
    }

    /**
     * 
     * @param type $values array com as colunas que serão inseridas ou
     * atualizadas
     */
    public function setColInsert($values) {
        $this->col_insert = array();
        foreach ($values as $key => $value) {
            $this->col_insert[$key] = $value;
        }
    }

}
