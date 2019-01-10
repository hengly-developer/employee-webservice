<?php


use Phinx\Migration\AbstractMigration;

class CreateBranchTable extends AbstractMigration
{
    public function up()
    {
        $tab = $this->table('branch');
        $tab->addColumn('name', 'string')
            ->addTimestamps()
            ->addIndex('name', ['unique' => true, 'name' => 'idx_branch_name'])
            ->save();
    }
    public function down()
    {
        $this->dropTable('branch');
    }
}
