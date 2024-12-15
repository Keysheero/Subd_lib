<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

class AddUserRelationToBoo extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('books');
        $table->addColumn('user_id', 'integer', ['null' => true])
            ->addForeignKey('user_id', 'users', 'id', [
                'delete' => 'SET NULL',
                'update' => 'CASCADE'
            ])
            ->update();
    }
}

