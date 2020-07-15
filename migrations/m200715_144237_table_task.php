<?php

use yii\db\Migration;

/**
 * Class m200715_144237_table_task
 */
class m200715_144237_table_task extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(), 
            'description' => $this->text()->notNull(), 
            'date_finish' => $this->date()->null(), 
            'priority' => $this->integer()->notNull(),
            'status' => $this->boolean()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%task}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200715_144237_table_task cannot be reverted.\n";

        return false;
    }
    */
}
