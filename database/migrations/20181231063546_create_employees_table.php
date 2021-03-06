<?php


use Phinx\Migration\AbstractMigration;

class CreateEmployeesTable extends AbstractMigration
{
    public function up()
    {
        $tab = $this->table('employees');
        $tab->addColumn('department_id', 'integer')
            ->addColumn('branch_id', 'integer')
            ->addColumn('fullname','string', ['limit' => 50])
            ->addColumn('user_id', 'integer', ['limit' => 50])
            ->addColumn('post_id', 'integer', ['limit' => 50])
            ->addColumn('email', 'string', ['limit' => 50])
            ->addColumn('address', 'string', ['limit' => 50])
            ->addColumn('phone', 'string', ['limit' => 50])
            ->addTimestamps()
            ->addForeignKey('department_id', 'department', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addForeignKey('branch_id', 'branch', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addForeignKey('post_id', 'posts', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->save();
    }
    public function down()
    {
        $this->dropTable('employees');
    }
}
