<?php


use Phinx\Migration\AbstractMigration;

class CreateSkillTable extends AbstractMigration
{
    public function up()
    {
        $tab = $this->table('skill');
        $tab->addColumn('name','string')
            ->addColumn('description', 'string')
            ->addTimestamps()
            ->save();
    }
    public function down()
    {
        $this->dropTable('skill');
    }
}
