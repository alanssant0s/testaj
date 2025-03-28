<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateProcesses extends AbstractMigration
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
        $table = $this->table('processes', ['id' => false, 'primary_key' => 'process_number']);
        $table
            ->addColumn('process_number', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addPrimaryKey('process_number')
            ->addColumn('nature_id', 'integer', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('object_id', 'integer', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('case_id', 'integer', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('description', 'text', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('jurisprudence', 'text', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('airline_company_id', 'integer', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('district_id', 'integer', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('date', 'date', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('result_id', 'integer', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('type_id', 'integer', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('value_requests', 'decimal', [
                'default' => null,
                'precision' => 10,
                'scale' => 2,
                'null' => true,
            ])
            ->addColumn('judge_id', 'integer', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('deleted', 'datetime', [
                'default' => null,
                'null' => true,
            ])
            ->addForeignKey('airline_company_id', 'airline_companies', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addForeignKey('district_id', 'districts', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addForeignKey('judge_id', 'judges', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addForeignKey('nature_id', 'natures', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addForeignKey('objective_id', 'objectives', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addForeignKey('case_id', 'cases', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addForeignKey('result_id', 'results', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addForeignKey('type_id', 'types', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->create();
    }

    public function down()
    {
        $this->table('processes')->drop()->save();
    }

}
