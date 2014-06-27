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
 * @property string $date_created
 * @property string $date_updated
 * @property string $date_published
 * @property string $content
 * @property integer $votes_up
 * @property integer $votes_down
 * @property integer $views
 * @property string $date_lastview
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
            [['author', 'name', 'slug', 'date_created', 'date_updated', 'date_published', 'content', 'votes_up', 'votes_down', 'views', 'date_lastview'], 'required'],
            [['author', 'views', 'votes_up', 'votes_down'], 'integer'],
            [['date_created', 'date_updated', 'date_published', 'date_lastview'], 'safe'],
            [['content'], 'string'],
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
            'date_created' => 'Date Created',
            'date_updated' => 'Date Updated',
            'date_published' => 'Date Published',
            'content' => 'Content',
            'votes_up' => 'Votes Up',
			'votes_down' => 'Votes Down',
			'views' => 'Views',
            'date_lastview' => 'Date Last View',
        ];
    }
	
	/**
     * Finds recent posts
     *
     * @param  int      $limit
     * @return static|null
     */
    public static function findRecentPosts($limit=5)
    {
		$sql = 'SELECT * FROM cms_posts WHERE `date_published` IS NOT NULL ORDER BY `date_published` DESC LIMIT ' . $limit;
		return static::findBySql($sql)->all();
    }
}
