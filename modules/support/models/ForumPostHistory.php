<?php

namespace app\modules\support\models;

use Yii;

/**
 * This is the model class for table "support_forum_post_histories".
 *
 * @property integer $id
 * @property integer $post_id
 * @property integer $user_id
 * @property string $date_created
 * @property string $content
 */
class ForumPostHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'support_forum_post_histories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'user_id', 'date_created', 'content'], 'required'],
            [['post_id', 'user_id'], 'integer'],
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
            'post_id' => 'Post ID',
            'user_id' => 'User ID',
            'date_created' => 'Date Created',
            'content' => 'Content',
        ];
    }
}
