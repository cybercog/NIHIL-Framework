<?php

namespace app\modules\cms\models;

use Yii;

/**
 * This is the model class for table "cms_comment_histories".
 *
 * @property integer $id
 * @property integer $comment_id
 * @property integer $user_id
 * @property string $date_created
 * @property string $content
 */
class CommentHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_comment_histories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment_id', 'user_id', 'date_created', 'content'], 'required'],
            [['comment_id', 'user_id'], 'integer'],
            [['date_created'], 'safe'],
            [['content'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'comment_id' => 'Comment ID',
            'user_id' => 'User ID',
            'date_created' => 'Date Created',
            'content' => 'Content',
        ];
    }
}
