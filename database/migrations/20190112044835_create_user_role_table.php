<?php


use Phinx\Migration\AbstractMigration;

class CreateUserRoleTable extends AbstractMigration
{
    public function up()
    {
        $tab = $this->table('user_role');
        $tab->addColumn('user_id', 'integer')
            ->addColumn('role_id', 'integer')
            ->addTimestamps()
            ->addForeignKey('user_id', 'users', 'id', ['delete'=>'cascade', 'update'=>'cascade'])
            ->addForeignKey('role_id', 'role', 'id', ['delete'=>'cascade', 'update'=>'cascade'])
            ->save();
    }
    public function down()
    {
        $this->dropTable('user_role');
    }
}
