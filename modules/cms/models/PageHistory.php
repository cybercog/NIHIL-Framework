<?php

namespace app\modules\cms\models;

use Yii;

/**
 * This is the model class for table "cms_page_histories".
 *
 * @property integer $id
 * @property integer $page_id
 * @property integer $author
 * @property string $name
 * @property string $slug
 * @property string $date_created
 * @property string $content
 */
class PageHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_page_histories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_id', 'author', 'name', 'slug', 'date_created', 'content'], 'required'],
            [['page_id', 'author'], 'integer'],
            [['date_created'], 'safe'],
            [['content'], 'string'],
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
            'page_id' => 'Page ID',
            'author' => 'Author',
            'name' => 'Name',
            'slug' => 'Slug',
            'date_created' => 'Date Created',
            'content' => 'Content',
        ];
    }
}
