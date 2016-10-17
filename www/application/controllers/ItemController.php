<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ItemController extends CI_Controller {

    public $auth;
    public $itemRepo;

    public function __construct()
    {
        parent::__construct();

        $this->auth = Factory::auth();
        if( !$this->auth->check() ){
            redirect('/auth');
        }

        $this->load->library('session');
        $this->itemRepo = Factory::itemRepo();
    }


    public function create($listId)
    {
        $data['listId'] = $listId;
        $this->load->view('items/create', $data);
    }

    public function store()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('item_name', 'Name of item', 'required');
        $this->form_validation->set_rules('list_id', '', 'required|callback_list_exists');

        if( $this->form_validation->run() === true ){
            $this->itemRepo->create(
                $this->input->post('item_name'),
                $this->input->post('secret_content'),
                $this->input->post('list_id')
            );
            $this->session->set_flashdata('globalMessage', 'New item has added');
            redirect(site_url(['list/show', $this->input->post('list_id')]));
        }

        $this->load->view('items/create', ['listId' => $this->input->post('list_id')]);
    }

    public function show($id)
    {
        if( null === $item =  $this->itemRepo->first($id)){
            redirect('lists');
        }
        Factory::logRepo()->itemOpened($id);

        $data['item'] = $item;
        $this->load->view('items/item', $data);
    }


    public function edit($id)
    {
        if( null === $item =  $this->itemRepo->first($id)){
            redirect('lists');
        }

        $data['item'] = $item;
        $this->load->view('items/edit', $data);
    }

    public function save()
    {
        if(null !== $item = $this->itemRepo->first($this->input->post('item_id'))){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('item_name', 'Name of item', 'required');
            if( $this->form_validation->run() === true ){
                $this->itemRepo->update(
                    $item->id,
                    $this->input->post('item_name'),
                    $this->input->post('secret_content')
                );
                $this->session->set_flashdata('globalMessage', 'Item has updated');
                redirect(site_url(['list/show', $item->list_id]));
            }
            $this->load->view('items/edit', ['item' => $item]);
        } else {
            $this->load->view('lists');
        }


    }

    /**
     * Validation helper method
     * @param $str
     * @return bool
     */
    public function list_exists($str)
    {
        $listRepo = Factory::listRepo();
        return $listRepo->first($str) !== null ? true : false;
    }

}
