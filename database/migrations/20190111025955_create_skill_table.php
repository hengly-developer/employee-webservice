<?php


use Phinx\Migration\AbstractMigration;

class CreateSkillTable extends AbstractMigration
{
    public function up()
    {
        $tab = $this->table('skill');
        $tab->addColumn('name','string')
            ->addColumn('description', 'string')
            ->addColumn('employee_id', 'integer')
            ->addTimestamps()
            ->addForeignKey('employee_id', 'employees','id', ['delete'=>'CASCADE','update'=>'CASCADE'])
            ->save();
    }
    public function down()
    {
        $this->dropTable('skill');
    }
}
