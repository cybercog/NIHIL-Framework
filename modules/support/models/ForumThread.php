<?php

namespace app\modules\support\models;

use Yii;

/**
 * This is the model class for table "support_forum_threads".
 *
 * @property integer $id
 * @property integer $parent
 * @property integer $forum_id
 * @property string $name
 * @property string $slug
 * @property integer $posts_count
 *
 * @property SupportForumPosts[] $supportForumPosts
 * @property ForumTread $parent0
 * @property ForumTread[] $forumTreads
 * @property SupportForums $forum
 */
class ForumThread extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'support_forum_threads';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'forum_id', 'name', 'slug', 'posts_count'], 'required'],
            [['parent', 'forum_id', 'posts_count'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 128]
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
            'forum_id' => 'Forum ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'posts_count' => 'Posts Count',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupportForumPosts()
    {
        return $this->hasMany(SupportForumPosts::className(), ['thread_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(ForumTread::className(), ['id' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForumThreads()
    {
        return $this->hasMany(ForumThread::className(), ['parent' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForum()
    {
        return $this->hasOne(SupportForums::className(), ['id' => 'forum_id']);
    }
}
