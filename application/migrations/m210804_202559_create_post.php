<?php

use yii\db\Migration;

/**
 * Class m210804_202559_create_post
 */
class m210804_202559_create_post extends Migration
{
    public function up()
    {
        $this->createTable('{{%post}}', [
                'id' => $this->primaryKey(),
                'title' => $this->string()->notNull(),
                'text' => $this->text()->notNull(),
                'status' => $this->smallInteger()->notNull() ->defaultValue(0),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%post}}');
    }

}
