<?php


use Phinx\Migration\AbstractMigration;

class CreateEducationTable extends AbstractMigration
{
    public function up()
    {
        $tab = $this->table('education');
        $tab->addColumn('name','string')
            ->addColumn('subject', 'string')
            ->addColumn('startdate', 'datetime')
            ->addColumn('enddate','datetime')
            ->addColumn('description', 'string')
            ->addColumn('employee_id', 'integer')
            ->addTimestamps()
            ->addForeignKey('employee_id', 'employees','id', ['delete'=>'CASCADE','update'=>'CASCADE'])
            ->save();
    }
    public function down()
    {
        $this->dropTable('education');
    }
}
