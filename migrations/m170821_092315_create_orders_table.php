<?php

use yii\db\Migration;

/**
 * Handles the creation of table `orders`.
 */
class m170821_092315_create_orders_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('orders', [
            'id' => $this->primaryKey(),
            'price' => $this->double(),
            'quantity' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('orders');
    }
}
