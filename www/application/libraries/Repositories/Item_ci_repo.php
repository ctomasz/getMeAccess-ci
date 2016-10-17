<?php

class Item_ci_repo
{
    private $CI;
    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model('item_model');
        $this->CI->load->database();
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
     * @param int $listId
     * @return array    - collection of stdClass
     */
    public function getItemsForList($listId)
    {
        $query = $this->CI->db->get_where('items',['list_id' => (int)$listId]);
        return $query->result();
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function first($id)
    {
        $query = $this->CI->db->get_where('items', ['id' => (int)$id], 1);
        return ( $query->num_rows() > 0 ) ? current($query->result()) : null;
    }

    /**
     * @param int $id
     * @param string $name
     * @param string $content
     */
    public function update($id, $name, $content)
    {
        $this->CI->item_model->update([
            'id' => $id,
            'name' => $name,
            'content' => $content
        ]);
    }

}