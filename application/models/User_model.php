<?php

class User_model extends CI_Model{
    public function getUser($table, $where){
        return $this->db->get_where($table, $where);
    }

    public function tampilUser($id = null){
        if($id === null){
            return $this->db->get('user')->result_array();
        }else{
            return $this->db->get_where('user',['id_user' => $id])->row_array();
        }
    }

    public function createUser(){
        $data = [
            "id_user" => $this->input->post('id_user', true),
            "username" => $this->input->post('username', true),
            "name" => $this->input->post('name', true),
            "password" => $this->input->post('password', true)
        ];
        $this->db->insert('user', $data);
    }

    public function deleteUser($id){
        $this->db->delete('user', ['id_user' => $id]);
        return $this->db->affected_rows();
    }

    public function updateUser($data, $id){
        $this->db->update('user', $data, ['id_user' => $id]);
        return $this->db->affected_rows();
    }

    public function searchUser(){
        $keyword = $this->input->post('keyword');
        $this->db->like('name', $keyword);
        return $this->db->get('user')->result_array();
    }
}