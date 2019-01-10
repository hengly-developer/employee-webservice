<?php


use Phinx\Migration\AbstractMigration;

class CreatePostTable extends AbstractMigration
{
    public function up()
    {
        $tab = $this->table('posts');
        $tab->addColumn('title', 'string');
        $tab->addColumn('description', 'text');
        $tab->addColumn('user_id', 'integer')
            ->addTimestamps()
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->save();
    }
    public function down()
    {
        $this->dropTable('posts');
    }
}
