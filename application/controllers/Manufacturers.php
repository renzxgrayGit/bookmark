<?php

class Manufacturers extends CI_Controller {

    public function index()
    {
        echo "nmc";
    }
    public function show($id)
    {   
        $this->output->enable_profiler(TRUE); //enables the profiler
        $this->load->model("Manufacturer"); //loads the model
        $manufacturer_id = $id;
        $manufacturer = $this->Manufacturer->get_manufacturer_by_id($manufacturer_id);  //calls the get_manufacturer_by_id method
        var_dump($manufacturer);
    }

    public function show_all()
    {
        $this->output->enable_profiler(TRUE);
        $this->load->model("Manufacturer");
        $manufacturer = $this->Manufacturer->get_all_manufacturers();
        var_dump($manufacturer);
    }

    public function add()
    {
        $this->load->model("Manufacturer");
        $manufacturer_details = array("name" => "Manufacturer3"); //or you can adjust this as non-array
        $add_manufacturer = $this->Manufacturer->add_manufacturer($manufacturer_details );
        if($add_manufacturer === TRUE) {
            echo "Manufacturer is added!";
        }
    }
}

?>