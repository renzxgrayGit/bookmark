<?php 

class Manufacturer extends CI_Model {
    function get_all_manufacturers()
    {
        return $this->db->query("SELECT * FROM Manufacturers")->result_array();
    }
    function get_manufacturer_by_id($manufacturer_id)
    {
        return $this->db->query("SELECT * FROM Manufacturers WHERE id = ?", array($manufacturer_id))->row_array();
    }
    function add_manufacturer($manufacturer)
    {
        date_default_timezone_set('Asia/Manila');
        $current_time = date("Y-m-d H:i:s");

         // Prepare the query to insert manufacturer data
        $query = "INSERT INTO Manufacturers(name, created_at, updated_at) VALUES (?,?,?)";

        // Bind the values to be inserted
        $values = array($manufacturer['name'], $current_time, $current_time); 

         // Execute the query
        return $this->db->query($query, $values);
    }
}

?>