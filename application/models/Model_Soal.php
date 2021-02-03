<?php
class Model_soal extends CI_Model
{
    function get_all()
    {
        return $this->db->get("soal")->result();
    }
    function get_by_cat($cat)
    {
        return $this->db->get_where("soal", array("cat" => $cat))->result();
    }
    function delete($id){
        $this->db->delete("soal", array("id" => $id));
        return $this->db->affected_rows();
    }
    function insert($data){
        $this->db->insert("soal", $data);
        return $this->db->affected_rows();
    }
    function update($data,$id){
        $this->db->update("soal", $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
    // function cek_role(){
    //     return $this->db->get()->result()->row('name');
    // }
}
