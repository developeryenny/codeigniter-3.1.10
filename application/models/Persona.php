<?php
class Persona extends CI_Model {
    public $table = 'personas';
    public $table_id = 'persona_id';

    public function __construct(){

    }

    function find($id){
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where($this->table_id, $id);

        $query = $this->db->get();
        return $query->row(); /*nos devuelve una fila*/

    }
    function findAll(){
        $this->db->select();
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result(); /**nos devuelve una colección de objetos un array */

    }
    function insert($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();

    }
    function update($id, $data){
        $this->db->update($this->table, $data);
        $this->db->where($this->table_id, $id);
    }
    function delete($id){
        $this->db->update($this->table);
        $this->db->where($this->table_id, $id);
    }




}


?>