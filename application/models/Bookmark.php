<?php

class Bookmark extends CI_Model
{
    public function insert_bookmark($data)
    {
         // Check if a bookmark with the same name exists
        $sql = "SELECT * FROM bookmarks WHERE name = ?";
        $query = $this->db->query($sql, array($data['name']));
        $existing_name = $query->row_array();

         // Check if a bookmark with the same URL exists
        $sql = "SELECT * FROM bookmarks WHERE url = ?";
        $query = $this->db->query($sql, array($data['url']));
        $existing_url = $query->row_array();

         // If either name or URL already exists, return false
        if ($existing_name || $existing_url) 
        {
            return false;
        }

        $sql = "INSERT INTO bookmarks (folder, name, url, action, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?)";
        $data = array(
                    $data['folder'],
                    $data['name'],
                    $data['url'],
                    $data['action'],
                    $data['created_at'],
                    $data['updated_at'] );

        return $this->db->query($sql, $data);
    }

    public function get_bookmarks() 
    {
        $sql = "SELECT * FROM bookmarks";
        return $this->db->query($sql)->result_array();
    }

    public function delete_bookmark($name, $url)
    {
        // Delete the bookmark where both name and URL match
        $sql = "DELETE FROM bookmarks WHERE name = ? AND url = ?";
        $this->db->query($sql, array($name, $url));
    }
}

?>