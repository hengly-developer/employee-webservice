<?php


use Phinx\Migration\AbstractMigration;

class CreatePermissionTable extends AbstractMigration
{
    public function up()
    {
        $tab = $this->table('permissions');
        $tab->addColumn('desription', 'string', ['limit' => 255])
            ->addTimestamps()
            ->save();
    }
    public function down()
    {
        $this->dropTable('permissions');
    }
}
