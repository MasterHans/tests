<?php

use yii\db\Migration;

/**
 * Class m210808_131849_add_columns_for_markdown
 */
class m210808_131849_add_columns_for_markdown extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%post}}','content_markdown', $this->string()->null());
        $this->addColumn('{{%post}}','content_html', $this->string()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%post}}','content_markdown');
        $this->dropColumn('{{%post}}','content_html');
    }


}
