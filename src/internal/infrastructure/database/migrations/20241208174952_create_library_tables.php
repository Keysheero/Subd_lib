<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateLibraryTables extends AbstractMigration
{
    public function change(): void
    {
        $users = $this->table('users');
        $users->addColumn('username', 'string', ['limit' => 50])
            ->addColumn('password', 'string', ['limit' => 255])
            ->addColumn('email', 'string', ['limit' => 100])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'timestamp', ['null' => true])
            ->create();

        $authors = $this->table('authors');
        $authors->addColumn('name', 'string', ['limit' => 100])
            ->addColumn('birthdate', 'date', ['null' => true])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'timestamp', ['null' => true])
            ->create();

        $books = $this->table('books');
        $books->addColumn('title', 'string', ['limit' => 150])
            ->addColumn('author_id', 'integer')
            ->addColumn('published_date', 'date', ['null' => true])
            ->addColumn('genre', 'string', ['limit' => 50, 'null' => true])
            ->addColumn('file_path', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'timestamp', ['null' => true])
            ->addForeignKey('author_id', 'authors', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->create();
    }
}
