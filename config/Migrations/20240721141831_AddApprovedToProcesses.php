<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class AddApprovedToProcesses extends AbstractMigration
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
        $table->addColumn('approved_date', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('approved_by', 'integer', [
            'default' => null,
            'null' => true,
        ]);
        $table->addForeignKey('approved_by', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE']);
        $table->addColumn('user_id', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE']);
        $table->update();
    }

    public function down(): void
    {
        $table = $this->table('processes');
        $table->removeColumn('approved_date');
        $table->removeColumn('approved_by');
        $table->removeColumn('user_id');
        $table->update();
    }
}
