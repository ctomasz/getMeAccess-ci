<?php

class Item_model extends CI_Model
{
    public $name;
    public $content;
    public $list_id;
    public $created_at;
    public $updated_at;

    /**
     * @param array $arr
     * @return bool
     */
    public function create(Array $arr)
    {
        $this->name = $arr['name'];
        $this->content = $arr['content'];
        $this->list_id = $arr['list_id'];
            $date = Date('Y-m-d H:i:s');
        $this->created_at = $date;
        $this->updated_at = $date;
        return $this->db->insert('items', $this);
    }

    public function update(Array $arr)
    {
        $data = [
            'name' => $arr['name'],
            'content' => $arr['content'],
            'updated_at' => Date('Y-m-d H:i:s')
        ];

        $this->db->where('id', $arr['id']);
        return $this->db->update('items', $data);
    }

}