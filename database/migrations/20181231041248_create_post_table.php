<?php


use Phinx\Migration\AbstractMigration;

class CreatePostTable extends AbstractMigration
{
    public function up()
    {
        $tab = $this->table('posts');
        $tab->addColumn('title', 'string')
            ->addColumn('description', 'text')
            ->addTimestamps()
            ->save();
    }
    public function down()
    {
        $this->dropTable('posts');
    }
}
