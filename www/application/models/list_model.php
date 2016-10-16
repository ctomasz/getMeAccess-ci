<?php

class List_model extends CI_Model
{
    public $name;
    public $created_at;

    /**
     * @param array $arr
     * @return bool
     */
    public function create(Array $arr)
    {
        $this->name = $arr['name'];
        $this->created_at = Date('Y-m-d H:i:s');
        return $this->db->insert('lists', $this);
    }

}