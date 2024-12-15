<?php

use Phinx\Migration\AbstractMigration;

class AddFileBlobToBooks extends AbstractMigration
{
    public function up()
    {
        $this->table('books')
            ->addColumn('file', 'binary', ['null' => false, 'limit' => 100000000])
            ->update();
    }

    public function down()
    {
        $this->table('books')
            ->removeColumn('file')
            ->update();
    }
}
