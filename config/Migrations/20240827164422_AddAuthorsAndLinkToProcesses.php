<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class AddAuthorsAndLinkToProcesses extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('processes');
        $table->addColumn('authors', 'integer', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('link', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->update();
    }

    public function down(): void
    {
        $table = $this->table('processes');
        $table->removeColumn('authors');
        $table->removeColumn('link');
        $table->update();
    }
}
