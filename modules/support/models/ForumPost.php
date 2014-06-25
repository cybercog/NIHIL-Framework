<?php

namespace app\modules\support\models;

use Yii;

/**
 * This is the model class for table "support_forum_posts".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $thread_id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property string $views_count
 * @property string $replies_count
 * @property string $votes_up
 * @property string $votes_down
 * @property integer $sticky
 * @property string $date_created
 * @property string $date_modified
 * @property string $date_edited
 * @property integer $locked
 * @property integer $deleted
 * @property integer $accepted_answer
 */
class ForumPost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'support_forum_posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'thread_id', 'title', 'slug', 'views_count', 'replies_count'], 'required'],
            [['user_id', 'thread_id', 'views_count', 'replies_count', 'votes_up', 'votes_down', 'sticky', 'locked', 'deleted', 'accepted_answer'], 'integer'],
            [['content'], 'string'],
            [['date_created', 'date_modified', 'date_edited'], 'safe'],
            [['title'], 'string', 'max' => 128],
            [['slug'], 'string', 'max' => 64],
            [['slug'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'thread_id' => 'Thread ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'content' => 'Content',
            'views_count' => 'Views Count',
            'replies_count' => 'Replies Count',
            'votes_up' => 'Votes Up',
            'votes_down' => 'Votes Down',
            'sticky' => 'Sticky',
            'date_created' => 'Date Created',
            'date_modified' => 'Date Modified',
            'date_edited' => 'Date Edited',
            'locked' => 'Locked',
            'deleted' => 'Deleted',
            'accepted_answer' => 'Accepted Answer',
        ];
    }
}
