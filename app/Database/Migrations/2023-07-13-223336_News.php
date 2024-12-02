<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class News extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel news
		$this->forge->addField([
            'id'        => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'title'     => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'author'    => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
                'default'           => 'Tirsa P',
            ],
            'content'   => [
                'type'              => 'TEXT',
                'null'              => true,
            ],
            'status'    => [
                'type'              => 'VARCHAR',
                'constraint'        => 10,
                'default'           => 'draft',
                'check'             => "status IN ('published', 'draft')"
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel news
		$this->forge->createTable('news', TRUE);
    }

    public function down()
    {
        // menghapus tabel news
		$this->forge->dropTable('news');
    }
}
