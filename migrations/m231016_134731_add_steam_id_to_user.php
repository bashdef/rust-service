<?php

use yii\db\Migration;

/**
 * Class m231016_134731_add_steam_id_to_user
 */
class m231016_134731_add_steam_id_to_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'steam_id', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'steam_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231016_134731_add_steam_id_to_user cannot be reverted.\n";

        return false;
    }
    */
}
