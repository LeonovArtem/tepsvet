<?php

use yii\db\Migration;

/**
 * Handles adding login to table `test`.
 */
class m170817_125623_add_login_column_to_test_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('test', 'login', $this->string(30));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('test', 'login');
    }
}
