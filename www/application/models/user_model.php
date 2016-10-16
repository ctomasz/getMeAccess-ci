<?php

class User_model extends CI_Model
{
    public $email;
    public $password;
    public $created_at;

    /**
     * @param array $arr
     * @return bool
     */
    public function create(Array $arr)
    {
        $this->email = $arr['email'];
        $this->password = $arr['password'];
        $this->created_at = Date('Y-m-d H:i:s');

        return $this->db->insert('users', $this);
    }
}