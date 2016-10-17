<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_logs_table extends CI_Migration
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
            'item_id' => array(
                'type' => 'INT',
                'constraint' => 6,
                'unsigned' => TRUE,
                'null' => FALSE,
            ),
            'member' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => FALSE,
            ),
            'action' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE,
            ),
            'created_at' => array(
                'type' =>  'DATETIME',
            ),

        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('logs');
    }

    public function down()
    {
        $this->dbforge->drop_table('logs');
    }

}