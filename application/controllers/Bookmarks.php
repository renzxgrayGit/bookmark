<?php

class Bookmarks extends CI_Controller
{
    public function index()
    {
        $this->load->model("Bookmark");
        $data['bookmarks'] = $this->Bookmark->get_bookmarks();
        $data['error_message'] = $this->session->flashdata('error_message');
        $this->load->view("index", $data);
    }


    public function add()
    {
    $this->load->model("Bookmark");
    date_default_timezone_set('Asia/Manila');

        // Check if the form has been submitted with delete action
        if ($this->input->post('delete')) 
        {
            $this->delete();
        } 
        else 
        {
            $data = array(
                    'folder' => $this->input->post("folder"),
                    'name' => $this->input->post('name'),
                    'url' => $this->input->post('url'),
                    'action' => 'delete', // Correct action for deletion
                    'created_at' => date('Y-m-d h:i:a'),
                    'updated_at' => date('Y-m-d h:i:a') );

            // Attempt to insert the bookmark
            $inserted = $this->Bookmark->insert_bookmark($data);

            if ($inserted)
            {
                // Insertion successful 
                redirect('bookmarks');
            } 
            else 
            {
                // Bookmark with the same URL and name already exists
                $this->session->set_flashdata('error_message', 'Bookmark with the same URL or name already exists.');
                redirect('bookmarks');
            }
        }
    }

    private function delete()
    {
        // Retrieve name and URL from the form submission
        $name = $this->input->post('name');
        $url = $this->input->post('url');

        // Delete the bookmark
        $this->Bookmark->delete_bookmark($name, $url);
        redirect('bookmarks');
    }
    
}

/* public function add()
    {
        $this->load->model("Bookmark");
        date_default_timezone_set('Asia/Manila');

        $data = array(
                'folder' => $this->input->post("folder"),
                'name' => $this->input->post('name'),
                'url' => $this->input->post('url'),
                'action' => 'delete',    // Assuming action is always 'delete' for now
                'created_at' => date('Y-m-d h:i:a'),
                'updated_at' => date('Y-m-d h:i:a') );

        // Attempt to insert the bookmark
        $inserted = $this->Bookmark->insert_bookmark($data);

        if ($inserted) {
            // Insertion successful 
            redirect('bookmarks');
        } 
        else 
        {
            // Bookmark with the same URL and name already exists
            $this->session->set_flashdata('error_message', 'Bookmark with the same URL or name already exists.');
            redirect('bookmarks');
        }
    } */
?>
