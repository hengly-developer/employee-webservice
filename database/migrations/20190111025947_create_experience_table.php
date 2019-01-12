<?php


use Phinx\Migration\AbstractMigration;

class CreateExperienceTable extends AbstractMigration
{
    public function up()
    {
        $tab = $this->table('experience');
        $tab->addColumn('postion','string')
            ->addColumn('company', 'string')
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
        $this->dropTable('experience');
    }
}
