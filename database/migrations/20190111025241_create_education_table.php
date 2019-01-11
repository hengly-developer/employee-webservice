<?php


use Phinx\Migration\AbstractMigration;

class CreateEducationTable extends AbstractMigration
{
    public function up()
    {
        $tab = $this->table('education');
        $tab->addColumn('name','string')
            ->addColumn('subject', 'string')
            ->addColumn('startdate', 'integer')
            ->addColumn('enddate','string')
            ->addColumn('description', 'string')
            ->addTimestamps()
            ->save();
    }
    public function down()
    {
        $this->dropTable('education');
    }
}
