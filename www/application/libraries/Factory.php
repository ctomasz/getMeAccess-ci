<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Factory
{
    public static function auth()
    {
        $CI =& get_instance();
        $CI->load->library('session');
        $CI->load->library('Repositories/User_ci_repo', null,'userRepo');
        $CI->load->library('encrypt');

        require_once __DIR__.'/Auth/Auth.php';
        return new Auth($CI->session, $CI->userRepo, $CI->encrypt);
    }

    public static function userRepo()
    {
        $CI =& get_instance();
        $CI->load->library('Repositories/User_ci_repo', null,'userRepo');

        return $CI->userRepo;
    }


}