<?php

class Log_ci_repo
{
    private $CI;
    private $auth;

    public function __construct($auth)
    {
        $this->CI =& get_instance();
        $this->CI->config->load('logs_statuses',true);
        $this->statuses = $this->CI->config->item('logs_statuses');
        $this->CI->load->model('log_model');
        $this->auth = $auth;
    }

    public function itemCreated($itemId)
    {
        $this->CI->log_model->create([
            'item_id' => $itemId,
            'member' => $this->auth->user()['email'],
            'action' => $this->statuses['item-created'],
        ]);
    }

    public function itemUpdated($itemId)
    {
        $this->CI->log_model->create([
            'item_id' => $itemId,
            'member' => $this->auth->user()['email'],
            'action' => $this->statuses['item-updated'],
        ]);
    }

    public function itemOpened($itemId)
    {
        $this->CI->log_model->create([
            'item_id' => $itemId,
            'member' => $this->auth->user()['email'],
            'action' => $this->statuses['item-opened'],
        ]);
    }




    /**
     * @param $name
     * @param $content
     * @param $listId
     */
    public function create($name, $content, $listId)
    {
        $this->CI->item_model->create([
            'name' => $name,
            'content' => $content,
            'list_id' => $listId
        ]);
    }

    /**
     * @param int $itemId
     * @return array  - collection of stdClass
     */
    public function getAllForItem($itemId)
    {
        $query = $this->CI->db->get_where('logs',['item_id' => $itemId]);
        return $query->result();
    }


}