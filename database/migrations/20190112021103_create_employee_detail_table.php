<?php


use Phinx\Migration\AbstractMigration;

class CreateEmployeeDetailTable extends AbstractMigration
{
    public function up()
    {
        $tab = $this->table('employee_detail');
        $tab->addColumn('employee_id','integer')
            ->addColumn('education_id', 'integer')
            ->addColumn('experience_id', 'integer')
            ->addColumn('skill_id', 'integer')
            ->addTimestamps()
            ->save();
    }
    public function down()
    {
        $this->dropTable('employee_detail');
    }
}
