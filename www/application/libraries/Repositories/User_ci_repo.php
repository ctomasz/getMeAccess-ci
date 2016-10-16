<?php

class User_ci_repo
{
    private $CI;
    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model('user_model');
        $this->CI->load->database();
    }

    public function create($email, $password)
    {
        $this->CI->user_model->create([
            'email' => $email,
            'password' => $password
        ]);
    }

    /**
     * @param $email
     * @return array|null
     */
    public function fetchUserToAuth($email)
    {
        $query = $this->CI->db->query('SELECT * FROM users WHERE email = ? LIMIT 1', [$email]);
        if( $query->num_rows() > 0){
            return $query->first_row();
        }
        return null;
    }
}