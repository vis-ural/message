<?php

use yii\db\Migration;

/**
 * Class m200311_141415_message_counter
 */
class m200311_141415_message_counter extends Migration
{
    public function up()
    {
        $this->addColumn('{{%message}}', 'counter', $this->integer());
    }

    /**
     * @return bool|void
     */
    public function down()
    {
        $this->dropColumn('{{%message}}', 'counter');
    }
}
