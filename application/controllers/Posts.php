<?php

class Posts extends CI_Controller
{

    public function index()
    {
        $data['title'] = ucfirst('Latest Posts');
        $data['posts'] = $this->Post_model->getPosts();

        $this->load->view('templates/header');
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug = null)
    {
        $data['post'] = $this->Post_model->getPosts($slug);

        if (empty($data['post'])) {
            show_404();
        } else {
            $data['title'] = ucfirst($data['post']['title']);
            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');
        }
    }

    public function create()
    {
        $data['title'] = 'Create Post';
        $data['categories'] = $this->Post_model->getCategories();

        $this->form_validation->set_rules('postTitle', 'Title', 'required');
        $this->form_validation->set_rules('postContent', 'Content', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('templates/header');
            $this->load->view('posts/create', $data);
            $this->load->view('templates/footer');
        } else {
            //Upload image
            $config['upload_path'] = './assets/images/posts';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '20480';
            $config['max_width'] = '5000';
            $config['max_height'] = '5000';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()) {
                $errors = array('error' => $this->upload->display_errors());
                $post_image = 'noimage.jpg';
            } else {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
            }


            $this->Post_model->createPost($post_image);
            redirect('posts');
        }
    }

    public function delete($id)
    {
        $this->Post_model->deletePost($id);
        redirect('posts');
    }

    public function edit($slug)
    {
        $data['post'] = $this->Post_model->getPosts($slug);
        $data['categories'] = $this->Post_model->getCategories();

        if (empty($data['post'])) {
            show_404();
        } else {
            $data['title'] = 'Edit Post';
            $this->load->view('templates/header');
            $this->load->view('posts/edit', $data);
            $this->load->view('templates/footer');
        }
    }

    public function update()
    {
        $this->Post_model->updatePost();
        redirect('posts');
    }
}
