<?php

namespace app\modules\cms\models;

use Yii;

/**
 * This is the model class for table "cms_posts".
 *
 * @property integer $id
 * @property integer $author
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property string $date_created
 * @property string $date_updated
 * @property string $date_published
 * @property string $content
 * @property integer $votes_up
 * @property integer $votes_down
 * @property integer $views
 * @property string $date_lastview
 *
 * @property CmsComments[] $cmsComments
 * @property CmsPostHistories[] $cmsPostHistories
 * @property CmsPostViews[] $cmsPostViews
 * @property CmsPostVotes[] $cmsPostVotes
 * @property AcUsers $author0
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author', 'name', 'slug', 'description', 'date_created', 'content', 'votes_up', 'votes_down', 'views'], 'required'],
            [['author', 'votes_up', 'votes_down', 'views'], 'integer'],
            [['description', 'content'], 'string'],
            [['date_created', 'date_updated', 'date_published', 'date_lastview'], 'safe'],
            [['name', 'slug'], 'string', 'max' => 150],
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
            'author' => 'Author',
            'name' => 'Name',
            'slug' => 'Slug',
            'description' => 'Description',
            'date_created' => 'Date Created',
            'date_updated' => 'Date Updated',
            'date_published' => 'Date Published',
            'content' => 'Content',
            'votes_up' => 'Votes Up',
            'votes_down' => 'Votes Down',
            'views' => 'Views',
            'date_lastview' => 'Date Lastview',
        ];
    }
	
	public static function findPublishedPosts($limit = NULL)
    {
		$sql = 'SELECT * FROM cms_posts WHERE `date_published` IS NOT NULL ORDER BY `date_published` DESC';
		if($limit) {
			$sql .= ' LIMIT ' . $limit;
		}
		return static::findBySql($sql)->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsComments()
    {
        return $this->hasMany(CmsComments::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsPostHistories()
    {
        return $this->hasMany(CmsPostHistories::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsPostViews()
    {
        return $this->hasMany(CmsPostViews::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsPostVotes()
    {
        return $this->hasMany(CmsPostVotes::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor0()
    {
        return $this->hasOne(AcUsers::className(), ['id' => 'author']);
    }
}
