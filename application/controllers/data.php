<?php

Class Data extends CI_Controller {

    function __construct() {
        parent::__construct();

    }

    function index() {
        
    }

    public function employees() {
        // instance object
        $crud = new grocery_crud();
        // pilih tabel yang akan digunakan
        $crud->set_table('employees');
        // simpan hasilnya kedalam variabel output
        $output = $crud->render();
        // tampilkan di view 
        //$this->_example_output($output);
        $this->load->view('template.php', $output);
        
    }

}