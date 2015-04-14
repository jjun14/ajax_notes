<?php 

class Note extends CI_Model
{
  public function get_all_notes(){
    $query = "SELECT * FROM notes";
    $notes = $this->db->query($query)->result_array();
    return $notes;
  }

  public function create($post){
    $query = "INSERT INTO notes (title) VALUES (?)";
    $this->db->query($query, array($post['title']));
  }

  public function update($post){
    $query = "UPDATE notes SET title = ?, content = ? WHERE id = ?";
    $this->db->query($query, array($post['title'], $post['content'], $post['id']));
  }

  public function delete($post){
    $query = "DELETE FROM notes WHERE id = ?";
    $this->db->query($query, array($post['id']));
  }
}

?>