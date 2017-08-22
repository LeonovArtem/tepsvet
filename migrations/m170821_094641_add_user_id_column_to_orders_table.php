<?php

use yii\db\Migration;

/**
 * Handles adding user_id to table `orders`.
 */
class m170821_094641_add_user_id_column_to_orders_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('orders', 'user_id', $this->string(30));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('orders', 'user_id');
    }
}
