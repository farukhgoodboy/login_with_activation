<?php
defined('BASEPATH') or exit('No direct script access allowed');

class menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">New Menu Added!</div>'
            );
            redirect('menu');
        }
    }

    public function submenu()
    {
        $data['title'] = 'Sub Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $data['subMenu'] = $this->menu->getSubMenu();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'url', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() == false) {


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active'),
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">New subMenu Added!</div>'
            );
            redirect('menu/submenu');
        }
    }

    public function editmenu()
    {
        $this->form_validation->set_rules('menu', 'Menu', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">Change  Failed</div>'
            );
            redirect('menu');
        } else {
            $this->db->set('menu', $this->input->post('menu'));
            $this->db->where('id', $this->input->post('menu_id'));
            $this->db->update('user_menu');
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">Menu Change</div>'
            );
            redirect('menu');
        }
    }

    public function submenuedit()
    {
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('url', 'url', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">Change Failed</div>'
            );
            redirect('menu/submenu');
        } else {
            $data = array(
                'title' => $_POST['title'],
                'menu_id' => $_POST['menu_id'],
                'url' => $_POST['url'],
                'icon' => $_POST['icon'],
                'is_active' => $_POST['is_active'],


            );
            $this->db->where('id', $_POST['id']);
            $this->db->update('user_sub_menu', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">Menu Change</div>'
            );
            redirect('menu/submenu');
        }
    }


    public function hapus($id)
    {
        $this->db->where('menu_id', $id);
        $this->db->delete('user_sub_menu');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger" role="alert">Menu Deleted</div>'
        );
        redirect('menu/submenu');
    }

    public function hapusmenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger" role="alert">Sub Menu Deleted</div>'
        );
        redirect('menu/index');
    }
}
