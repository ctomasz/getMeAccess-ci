<?php

class Item_ci_repo
{
    private $CI;
    private $logRepo;

    public function __construct($logRepo)
    {
        $this->CI =& get_instance();
        $this->CI->load->model('item_model');
        $this->CI->load->database();
        $this->logRepo = $logRepo;
    }

    /**
     * @param $name
     * @param $content
     * @param $listId
     */
    public function create($name, $content, $listId)
    {
        if( false !== $id = $this->CI->item_model->create([
            'name' => $name,
            'content' => $content,
            'list_id' => $listId
            ])
        ) {
            $this->logRepo->itemCreated($id);
        }

    }

    /**
     * @param int $listId
     * @return array    - [items, logs]
     */
    public function getItemsForList($listId)
    {
        $query = $this->CI->db->get_where('items',['list_id' => (int)$listId]);
        $items =  $query->result();

        $logs = [];
        foreach($items as $item){
            $logsData = array_map(
                function($row) use($item) {
                    $row->item_id = $item->name;
                    return $row;
                },
                $this->logRepo->getAllForItem($item->id)
            );
            foreach( $logsData as $log){
                $logs[] = $log;
            }
        }

        usort($logs, function($a,$b){
            return strtotime($a->created_at) <= strtotime($b->created_at);
        });

        return [
            'items' =>$items,
            'logs' => $logs
        ];
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
        if( $this->CI->item_model->update([
            'id' => $id,
            'name' => $name,
            'content' => $content
            ])
        ){
            $this->logRepo->itemUpdated($id);
        }
    }

}