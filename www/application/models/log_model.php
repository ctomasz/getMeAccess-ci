<?php

class Log_model extends CI_Model
{
    public $item_id;
    public $member;
    public $action;
    public $created_at;

    /**
     * @param array $arr
     * @return bool
     */
    public function create(Array $arr)
    {
        $this->item_id = $arr['item_id'];
        $this->member = $arr['member'];
        $this->action = $arr['action'];
        $this->created_at = Date('Y-m-d H:i:s');

        return $this->db->insert('logs', $this);
    }

}