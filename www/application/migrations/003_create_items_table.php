<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_items_table extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 6,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'list_id' => array(
                'type' => 'INT',
                'constraint' => 6,
                'unsigned' => TRUE,
                'null' => FALSE,
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => FALSE,
            ),
            'content' => array(
                'type' => 'TEXT',
            ),
            'created_at' => array(
                'type' =>  'DATETIME',
            ),
            'updated_at' => array(
                'type' =>  'DATETIME',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('items');
    }

    public function down()
    {
        $this->dbforge->drop_table('items');
    }

}