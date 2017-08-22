<?php

use yii\db\Migration;

/**
 * Handles adding pass to table `test`.
 */
class m170817_124949_add_pass_column_to_test_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('test', 'pass', $this->string(12));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('test', 'pass');
    }
}
