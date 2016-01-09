<?php

use yii\db\Schema;
use yii\db\Migration;

class m160109_170753_comments extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('comments', [
            'id'               => $this->primaryKey(),
            'post_id'            => $this->string(255),
            'name'             => $this->string(50),
            'email'             => $this->string(100),
            'message'             => $this->text(),
            'created_at'             => $this->integer(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('comments');
    }
}