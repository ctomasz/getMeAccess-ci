<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AuthController extends CI_Controller {

    private $auth;
    public $userRepo;

    public function __construct()
    {
        parent::__construct();

        $this->auth = Factory::auth();
        $this->userRepo = Factory::userRepo();

        if( $this->auth->check() ){
            redirect('/lists');
        }
    }

    public function signin()
    {
        $this->load->library('form_validation');
        $vData = [
            'signInErrorMessage' => ''
        ];
        $this->form_validation->set_rules('email', 'Email address', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if( $this->form_validation->run() === true ){
            if( $this->auth->signin($this->input->post('email'), $this->input->post('password')) ){
                redirect('/lists');
            } else {
                $vData['signInErrorMessage'] = 'Login or password is incorrect';
            }
        }

        $this->load->view('auth/auth', $vData);
    }

    public function signup()
    {
        $this->load->library('form_validation');
        $vData = [
            'signUpErrorMessage' => ''
        ];
        $this->form_validation->set_rules('email', 'Email address', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password_confirm', 'Confirm password ', 'required|callback_matchPassword');

        $this->form_validation->set_message('emailUnique', 'Email exists');
        $this->form_validation->set_message('matchPassword', 'Confirmation password is incorrect');

        if( $this->form_validation->run() === true ){
            $this->userRepo->create($this->input->post('email'), $this->auth->encodePassword($this->input->post('password')));
            $this->auth->signin($this->input->post('email'), $this->input->post('password'));

            redirect('/lists');

        }

        $this->load->view('auth/auth', $vData);
    }


    /**
     * Validation role - helper
     * @param $str
     * @return bool
     */
    public function matchPassword($str)
    {
        return $this->input->post('password') === $str;
    }

}
