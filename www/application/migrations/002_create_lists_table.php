<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_lists_table extends CI_Migration
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
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'created_at' => array(
                'type' =>  'DATETIME',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('lists');
    }

    public function down()
    {
        $this->dbforge->drop_table('lists');
    }

}