<?php

namespace app\modules\cms\models;

use Yii;
use app\modules\cms\models\ProjectStep;

/**
 * This is the model class for table "cms_projects".
 *
 * @property integer $id
 * @property integer $parent
 * @property integer $author_id
 * @property string $title
 * @property string $slug
 * @property string $image
 * @property string $description
 * @property string $date_created
 * @property string $date_updated
 * @property string $date_published
 * @property integer $votes_up
 * @property integer $votes_down
 * @property integer $views
 * @property string $date_lastview
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_projects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'author_id', 'votes_up', 'votes_down', 'views'], 'integer'],
            [['author_id', 'title', 'slug', 'description', 'date_created', 'votes_up', 'votes_down', 'views'], 'required'],
            [['description'], 'string'],
            [['date_created', 'date_updated', 'date_published', 'date_lastview'], 'safe'],
            [['title', 'slug'], 'string', 'max' => 128],
            [['image'], 'string', 'max' => 255],
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
            'parent' => 'Parent',
            'author_id' => 'Author ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'image' => 'Image',
            'description' => 'Description',
            'date_created' => 'Date Created',
            'date_updated' => 'Date Updated',
            'date_published' => 'Date Published',
            'votes_up' => 'Votes Up',
            'votes_down' => 'Votes Down',
            'views' => 'Views',
            'date_lastview' => 'Date Lastview',
        ];
    }
	
	/**
     * Finds recent projects
     *
     * @param  int      $limit
     * @return static|null
     */
    public static function findRecentProjects($limit=5)
    {
		$sql = 'SELECT * FROM cms_projects WHERE `date_published` IS NOT NULL ORDER BY `date_published` DESC LIMIT ' . $limit;
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
	
	/**
     * Finds by slug
     *
     * @param  int      $limit
     * @return static|null
     */
    public static function findProjectIntroduction($project_id)
    {
		return ProjectStep::find()->where(['project_id' => $project_id, 'type' => 1])->orderBy('order ASC')->all();
    }
	
	/**
     * Finds by slug
     *
     * @param  int      $limit
     * @return static|null
     */
    public static function findProjectSteps($project_id)
    {
		return ProjectStep::find()->where(['project_id' => $project_id, 'type' => 2])->orderBy('order ASC')->all();
    }
	
	/**
     * Finds by slug
     *
     * @param  int      $limit
     * @return static|null
     */
    public static function findProjectConclusion($project_id)
    {
		return ProjectStep::find()->where(['project_id' => $project_id, 'type' => 3])->orderBy('order ASC')->all();
    }
}
