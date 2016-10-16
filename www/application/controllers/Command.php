<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Command extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if( $this->input->is_cli_request() == false ){
             exit('It should be call via CLI');
        }
    }

    public function migrate()
    {
        $this->load->library('migration');

        if ( ! $this->migration->current())
        {
            show_error($this->migration->error_string());
        }
    }
}
