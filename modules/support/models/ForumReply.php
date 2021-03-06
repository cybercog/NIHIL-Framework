<?php

namespace app\modules\support\models;

use Yii;

/**
 * This is the model class for table "support_forum_replies".
 *
 * @property integer $id
 * @property integer $parent
 * @property integer $post_id
 * @property integer $user_id
 * @property string $content
 * @property string $date_created
 * @property string $date_modified
 * @property string $date_edited
 * @property integer $votes_up
 * @property integer $votes_down
 * @property integer $accepted
 */
class ForumReply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'support_forum_replies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'post_id', 'user_id', 'votes_up', 'votes_down', 'accepted'], 'integer'],
            [['post_id', 'user_id', 'content', 'votes_up', 'votes_down'], 'required'],
            [['content'], 'string'],
            [['date_created', 'date_modified', 'date_edited'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent' => 'Parent',
            'post_id' => 'Post ID',
            'user_id' => 'User ID',
            'content' => 'Content',
            'date_created' => 'Date Created',
            'date_modified' => 'Date Modified',
            'date_edited' => 'Date Edited',
            'votes_up' => 'Votes Up',
            'votes_down' => 'Votes Down',
            'accepted' => 'Accepted',
        ];
    }
}
