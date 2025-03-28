<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreatePlans extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $table = $this->table('plans');
        $table
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('type', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('recurrence', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('plan_value', 'decimal', [
                'default' => null,
                'precision' => 10,
                'scale' => 2,
                'null' => false,
            ])
            ->addColumn('paid_value', 'decimal', [
                'default' => null,
                'precision' => 10,
                'scale' => 2,
                'null' => false,
            ])
            ->addColumn('discount', 'decimal', [
                'default' => null,
                'precision' => 5,
                'scale' => 2,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('deleted', 'datetime', [
                'default' => null,
                'null' => true,
            ])
            ->create();
    }

    public function down()
    {
        $this->table('plans')
            ->drop()
            ->save();
    }

}
