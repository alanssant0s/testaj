<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class AddForeingKeyToUserIdInImports extends AbstractMigration
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
        $table = $this->table('imports');
        $table->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE']);
        $table->update();
    }

    public function down(): void
    {
        $table = $this->table('imports');
        $table->dropForeignKey('user_id');
        $table->update();
    }
}
