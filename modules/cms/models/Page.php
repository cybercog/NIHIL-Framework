<?php

namespace app\modules\cms\models;

use Yii;
use app\modules\cms\models\Page;

/**
 * This is the model class for table "cms_pages".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $author
 * @property string $name
 * @property string $slug
 * @property string $image
 * @property string $description
 * @property string $date_created
 * @property string $date_updated
 * @property string $date_published
 * @property string $content
 * @property integer $views
 * @property string $date_lastview
 *
 * @property CmsPageHistories[] $cmsPageHistories
 * @property CmsPageViews[] $cmsPageViews
 * @property AcUsers $author0
 * @property Parent $parent
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
            [['author', 'name', 'slug', 'description', 'date_created', 'content', 'views'], 'required'],
            [['parent_id', 'author', 'views'], 'integer'],
            [['description', 'content'], 'string'],
            [['parent_id', 'date_created', 'date_updated', 'date_published', 'date_lastview'], 'safe'],
            [['name', 'slug'], 'string', 'max' => 150],
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
			'parent_id' => 'Parent',
            'author' => 'Author',
            'name' => 'Name',
            'slug' => 'Slug',
            'image' => 'Image',
            'description' => 'Description',
            'date_created' => 'Date Created',
            'date_updated' => 'Date Updated',
            'date_published' => 'Date Published',
            'content' => 'Content',
            'views' => 'Views',
            'date_lastview' => 'Date Lastview',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsPageHistories()
    {
        return $this->hasMany(CmsPageHistories::className(), ['page_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsPageViews()
    {
        return $this->hasMany(CmsPageViews::className(), ['page_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor0()
    {
        return $this->hasOne(User::className(), ['id' => 'author']);
    }
	
	/**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Page::className(), ['id' => 'parent_id']);
    }
}
