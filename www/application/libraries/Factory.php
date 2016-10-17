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

    public static function listRepo()
    {
        $CI =& get_instance();
        $CI->load->library('Repositories/List_ci_repo', null,'listRepo');

        return $CI->listRepo;
    }

    public static function itemRepo()
    {
        $CI =& get_instance();
        $CI->load->library('Repositories/Item_ci_repo', null,'itemRepo');

        return $CI->itemRepo;
    }



}