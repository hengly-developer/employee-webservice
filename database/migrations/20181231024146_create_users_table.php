<?php


use Phinx\Migration\AbstractMigration;

class CreateUsersTable extends AbstractMigration
{
    public function up()
    {
        $tab = $this->table('users');
        $tab->addColumn('username', 'string', ['limit' => 50])
            ->addColumn('email', 'string', ['limit' => 50])
            ->addColumn('password', 'string', ['limit' => 255])
            ->addColumn('remember_token', 'string',  ['limit' => 50])
            ->addColumn('remember_identifier', 'string',  ['limit' => 20])
            ->addTimestamps()
            ->save();
    }
    public function down()
    {
        $this->dropTable('users');
    }
}
