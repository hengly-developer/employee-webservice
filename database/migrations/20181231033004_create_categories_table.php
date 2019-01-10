<?php


use Phinx\Migration\AbstractMigration;

class CreateCategoriesTable extends AbstractMigration
{
    public function up()
    {
        $tab = $this->table('categories');
        $tab->addColumn('name', 'string')
            ->addTimestamps()
            ->addIndex('name', ['unique' => true, 'name' => 'idx_categories_name'])
            ->save();
    }
    public function down()
    {
        $this->dropTable('categories');
    }
}
