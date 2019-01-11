<?php


use Phinx\Migration\AbstractMigration;

class CreateExperienceTable extends AbstractMigration
{
    public function up()
    {
        $tab = $this->table('experience');
        $tab->addColumn('postion','string')
            ->addColumn('company', 'string')
            ->addColumn('startdate', 'integer')
            ->addColumn('enddate','string')
            ->addColumn('description', 'string')
            ->addTimestamps()
            ->save();
    }
    public function down()
    {
        $this->dropTable('experience');
    }
}
