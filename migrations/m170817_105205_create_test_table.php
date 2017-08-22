<?php

use yii\db\Migration;

/**
 * Handles the creation of table `test`.
 */
class m170817_105205_create_test_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('test', [
            'id' => $this->primaryKey(),
            'content' => $this->text(),
            'name' => $this->string(20)->notNull(),
            'num'=>$this->integer(10),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('test');
    }
}
