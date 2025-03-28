<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class ChangeReferenceToUsers extends AbstractMigration
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
        $table = $this->table('audits');
        $table->renameColumn('source_id', 'user_id');
        $table->changeColumn('user_id', 'integer');
        $table->update();
    }

    public function down(): void
    {
        $table = $this->table('audits');
        $table->renameColumn('user_id', 'source_id');
        $table->update();
    }
}
