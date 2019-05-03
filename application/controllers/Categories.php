<?php

class Categories extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Categories';
        $data['categories'] = $this->Category_model->getCategories();

        $this->load->view('templates/header');
        $this->load->view('categories/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['title'] = 'Create category';

        $this->form_validation->set_rules('name', 'Name', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('templates/header');
            $this->load->view('categories/create', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Category_model->createCategory();
            redirect('categories');
        }
    }

    public function posts($id)
    {
        $data['title'] = $this->Category_model->getCategory($id)->name;
        $data['posts'] = $this->Post_model->getPostsByCategory($id);

        $this->load->view('templates/header');
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer');
    }
}
