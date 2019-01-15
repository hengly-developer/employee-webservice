<?php


use Phinx\Migration\AbstractMigration;

class CreateRoleTable extends AbstractMigration
{
    public function up()
    {
        $tab = $this->table('role');
        $tab->addColumn('name', 'string', ['limit' => 50])
            ->addTimestamps()
            ->save();
    }
    public function down()
    {
        $this->dropTable('role');
    }
}
