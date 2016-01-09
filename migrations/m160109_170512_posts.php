<?php

use yii\db\Schema;
use yii\db\Migration;

class m160109_170512_posts extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('posts', [
            'id'               => $this->primaryKey(),
            'title'            => $this->string(255),
            'text'             => $this->text(),
            'date'             => $this->integer(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('posts');
    }
}
