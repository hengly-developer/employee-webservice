<?php


use Phinx\Migration\AbstractMigration;

class CreateRolePermissionTable extends AbstractMigration
{
    public function up()
    {
        $tab = $this->table('role_permission');
        $tab->addColumn('role_id', 'integer')
            ->addColumn('permission_id', 'integer')
            ->addTimestamps()
            ->addForeignKey('role_id', 'role', 'id', ['delete'=>'cascade', 'update'=>'cascade'])
            ->addForeignKey('permission_id', 'permissions', 'id', ['delete'=>'cascade', 'update'=>'cascade'])
            ->save();
    }
    public function down()
    {
        $this->dropTable('role_permission');
    }
}
