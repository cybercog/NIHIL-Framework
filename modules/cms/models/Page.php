<?php

namespace app\modules\cms\models;

use Yii;

/**
 * This is the model class for table "cms_pages".
 *
 * @property integer $id
 * @property integer $author
 * @property string $name
 * @property string $slug
 * @property string $date_created
 * @property string $date_updated
 * @property string $date_published
 * @property string $content
 * @property integer $views
 * @property string $date_lastview
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author', 'name', 'slug', 'date_created', 'date_updated', 'date_published', 'content', 'views', 'date_lastview'], 'required'],
            [['author', 'views'], 'integer'],
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
            'views' => 'Views',
            'date_lastview' => 'Date Lastview',
        ];
    }
	
	/**
     * Finds recent pages
     *
     * @param  int      $limit
     * @return static|null
     */
    public static function findRecentPages($limit=5)
    {
		$sql = 'SELECT * FROM cms_pages WHERE `date_published` IS NOT NULL ORDER BY `date_published` DESC LIMIT ' . $limit;
		return static::findBySql($sql)->all();
    }
	
	/**
     * Finds by slug
     *
     * @param  int      $limit
     * @return static|null
     */
    public static function findBySlug($slug)
    {
		return static::findOne(['slug' => $slug]);
    }
	
	public function updateViews()
	{
		$views = $this->views;
		$this->views = $views + 1;
		$this->date_lastview = date("Y-m-d H:i:s");
		
		$this->save();
	}
}
