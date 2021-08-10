<?php

use yii\db\Migration;

/**
 * Class m210809_134242_add_createdate_columns
 */
class m210809_134242_add_create_date_columns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('post', 'created_at',$this->dateTime()->null());
        $this->addColumn('post', 'updated_at',$this->dateTime()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('post', 'created_at');
        $this->dropColumn('post', 'updated_at');
    }
}
