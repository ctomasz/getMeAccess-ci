<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ListController extends CI_Controller {

    private $auth;
    public $listRepo;

    public function __construct()
    {
        parent::__construct();

        $this->auth = Factory::auth();
        if( !$this->auth->check() ){
            redirect('/auth');
        }

        $this->listRepo = Factory::listRepo();
        $this->load->library('session');
    }

    public function index()
    {
        $data['items'] = $this->listRepo->all();
        $this->load->view('lists/lists', $data);
    }

    public function create()
    {
        $this->load->view('lists/create');
    }

    public function store()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('list_name', 'Name of list', 'required');

        if( $this->form_validation->run() === true ){
            $this->listRepo->create( $this->input->post('list_name') );
            $this->session->set_flashdata('globalMessage', 'New list has added');
            redirect('lists');
        }

        $this->load->view('lists/create');
    }

    public function show($id)
    {
        if( null === $item =  $this->listRepo->getDetails($id)){
            redirect('lists');
        }

        $data['item'] = $item;
        $this->load->view('lists/list', $data);
    }

    public function destroy($id)
    {
        if( $this->listRepo->delete($id) ){
            $this->session->set_flashdata('globalMessage', 'List has deleted');
        }
        redirect('lists');

    }



}
