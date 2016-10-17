<?php

class List_ci_repo
{
    private $CI;
    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model('list_model');
        $this->CI->load->database();
    }

    /**
     * @param string $name
     */
    public function create($name)
    {
        $this->CI->list_model->create([
            'name' => $name,
        ]);
    }

    /**
     * Fetch all data of lists; sort by name
     * @return array    - collection of stdClass [id, name]
     */
    public function all()
    {
        $this->CI->db->order_by('name', 'asc');
        $query = $this->CI->db->get('lists');
        return $query->result();
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        return $this->CI->db->delete('lists',['id' => (int)$id]);
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function getDetails($id)
    {
        $query = $this->CI->db->get_where('lists',['id' => (int)$id], 1);
        return ( $query->num_rows() > 0 ) ? current($query->result()) : null;
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function first($id)
    {
        $query = $this->CI->db->get_where('lists', ['id' => (int)$id], 1);
        return ( $query->num_rows() > 0 ) ? current($query->result()) : null;
    }
}