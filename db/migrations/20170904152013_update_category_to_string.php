<?php

use Phinx\Migration\AbstractMigration;
use Pragma\Dailyrecap\MailQueue;

class UpdateCategoryToString extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up()
    {
        $this->table(MailQueue::getTableName())
            ->changeColumn('category', 'string', ["default" => null])
            ->update();
    }
    public function down()
    {
        $this->table(MailQueue::getTableName())
            ->changeColumn('category', 'integer', ["default" => 0])
            ->update();
    }
}
