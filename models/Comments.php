<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property string $post_id
 * @property string $name
 * @property string $email
 * @property string $message
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','email', 'message'], 'required'],
            [['email'], 'email'],
            [['message'], 'string'],
            [['post_id'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post_id' => 'Post ID',
            'name' => 'Name',
            'email' => 'Email',
            'message' => 'Message',
        ];
    }
}
