<?php

namespace app\modules\cms\models;

use Yii;

/**
 * This is the model class for table "cms_comments".
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
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'post_id', 'user_id', 'votes_up', 'votes_down'], 'integer'],
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
        ];
    }
}
