<?php

namespace app\modules\cms\models;

use Yii;

/**
 * This is the model class for table "cms_post_histories".
 *
 * @property integer $id
 * @property integer $post_id
 * @property integer $author
 * @property string $name
 * @property string $slug
 * @property string $date_created
 * @property string $content
 * @property integer $votes_up
 * @property integer $votes_down
 *
 * @property CmsPosts $post
 * @property AcUsers $author0
 */
class PostHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_post_histories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'author', 'name', 'slug', 'date_created', 'content', 'votes_up', 'votes_down'], 'required'],
            [['post_id', 'author', 'votes_up', 'votes_down'], 'integer'],
            [['date_created'], 'safe'],
            [['content'], 'string'],
            [['name', 'slug'], 'string', 'max' => 128],
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
            'post_id' => 'Post ID',
            'author' => 'Author',
            'name' => 'Name',
            'slug' => 'Slug',
            'date_created' => 'Date Created',
            'content' => 'Content',
            'votes_up' => 'Votes Up',
            'votes_down' => 'Votes Down',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(CmsPosts::className(), ['id' => 'post_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor0()
    {
        return $this->hasOne(AcUsers::className(), ['id' => 'author']);
    }
}
