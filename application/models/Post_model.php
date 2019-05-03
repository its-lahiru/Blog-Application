<?php

class Post_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getPosts($slug = FALSE)
    {
        if ($slug === FALSE) {
            $this->db->order_by('posts.id', 'DESC');
            $this->db->join('categories', 'categories.id = posts.category_id');
            $query = $this->db->get('posts');
            return $query->result_array();
        }

        $query = $this->db->get_where('posts', array('slug' => $slug));
        return $query->row_array();
    }

    public function createPost($post_image)
    {
        $slug = url_title($this->input->post('postTitle'));

        $data = array(
            'title' => $this->input->post('postTitle'),
            'slug' => $slug,
            'body' => $this->input->post('postContent'),
            'category_id' => $this->input->post('category'),
            'post_image' => $post_image
        );
        $this->db->insert('posts', $data);
    }

    public function deletePost($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('posts');
        return true;
    }

    public function updatePost()
    {
        $slug = url_title($this->input->post('postTitle'));

        $data = array(
            'title' => $this->input->post('postTitle'),
            'slug' => $slug,
            'body' => $this->input->post('postContent'),
            'category_id' => $this->input->post('category')
        );
        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('posts', $data);
    }

    public function getCategories()
    {
        $this->db->order_by('name');
        $query = $this->db->get('categories');
        return $query->result_array();
    }
}
