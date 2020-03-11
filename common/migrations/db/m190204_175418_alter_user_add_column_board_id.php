<?php

use yii\db\Migration;

/**
 * Class m190204_175418_alter_user_add_column_board_id
 */
class m190204_175418_alter_user_add_column_board_id extends Migration
{
    public function up()
    {
        $this->addColumn('{{%base_user}}', 'board_id', $this->integer());
    }

    /**
     * @return bool|void
     */
    public function down()
    {
        $this->dropColumn('{{%base_user}}', 'board_id');
    }
}
