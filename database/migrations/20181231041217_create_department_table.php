<?php


use Phinx\Migration\AbstractMigration;

class CreateDepartmentTable extends AbstractMigration
{
    public function up()
    {
        $tab = $this->table('department');
        $tab->addColumn('name', 'string')
            ->addTimestamps()
            ->addIndex('name', ['unique' => true, 'name' => 'idx_department_name'])
            ->save();
    }
    public function down()
    {
        $this->dropTable('department');
    }
}
