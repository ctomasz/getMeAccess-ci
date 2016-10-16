<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    private $auth;

    public function __construct()
    {
        parent::__construct();

        $this->private = $this->auth = Factory::auth();
        $this->load->helper('url');
    }
	public function index()
	{
        if( !$this->auth->check() ) {
            $this->load->view('auth/auth');
        } else {
            redirect('/lists');
        }
	}

    public function wip()
    {
        $this->load->view('wip');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */