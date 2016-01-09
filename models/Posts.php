<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property integer $date
 */
class Posts extends \yii\db\ActiveRecord
{

    /**
     * Date from datepicker as string in format "03-Feb-2016".
     * @var
     */
    public $strDate;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * Validation rules
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text', 'strDate'], 'required'],
            [['text', 'text', 'strDate'], 'string'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * Labels for form fields
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Title',
            'text' => 'Text',
            'strDate' => 'Date',
        ];
    }

    /**
     * Method is used to get preview text of each post list item.
     * @param $text. Full text of post item passed here as param.
     * @return string, which is preview string showed in posts list.
     */
    public static function getPreviewText($text)
    {
        if(strlen($text) > 200){
            $cutPiece = substr($text, 0, 200);
            $lastSpaceInCP = strrpos($cutPiece, ' ');
            if(!$lastSpaceInCP){
                $lastSpaceInCP = 30;
            }
            $thePreviewMessageBefore = substr($cutPiece, 0, $lastSpaceInCP) . '...';
            $thePreviewMessage = self::checkPreviewSpaces($thePreviewMessageBefore);
        }else{
            $thePreviewMessage = self::checkPreviewSpaces($text);
        }
        return $thePreviewMessage;
    }

    /**
     * Method checks preview spaces.
     * Used in static function getPreviewText() as helper.
     * @param $fullMessageText
     * @return string
     */
    public static function checkPreviewSpaces($fullMessageText){
        $words = explode(' ', $fullMessageText);
        $newFullMessageArray = [];
        foreach($words as $word){
            if(strlen($word) > 33){
                $word = substr($word,0,30) . '...';
            }
            array_push($newFullMessageArray, $word);
        }
        $newFullMessageText = implode(' ', $newFullMessageArray);
        return $newFullMessageText;
    }
}
