<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class AddReasonAndImportIdToProcesses extends AbstractMigration
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
        $table->addColumn('reason', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('import_id', 'integer', [
            'default' => null,
            'null' => true,
        ]);
        $table->addForeignKey('import_id', 'imports', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE']);
        $table->update();
    }
}
