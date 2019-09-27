<?php

use yii\db\Migration;

/**
 * Class m190927_160825_add_admin_collumn_to_user
 */
class m190927_160825_add_admin_collumn_to_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'is_admin', $this->string()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'is_admin');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190927_160825_add_admin_collumn_to_user cannot be reverted.\n";

        return false;
    }
    */
}
