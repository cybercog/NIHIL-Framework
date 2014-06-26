<?php

namespace app\modules\cms\models;

use Yii;

/**
 * This is the model class for table "cms_content_histories".
 *
 * @property integer $id
 * @property integer $content_id
 * @property integer $type
 * @property integer $author
 * @property string $name
 * @property string $slug
 * @property string $date_created
 * @property string $content
 * @property integer $votes_up
 * @property integer $votes_down
 */
class ContentHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_content_histories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content_id', 'type', 'author', 'name', 'slug', 'date_created', 'content', 'votes_up', 'votes_down'], 'required'],
            [['content_id', 'type', 'author', 'votes_up', 'votes_down'], 'integer'],
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
            'content_id' => 'Content ID',
            'type' => 'Type',
            'author' => 'Author',
            'name' => 'Name',
            'slug' => 'Slug',
            'date_created' => 'Date Created',
            'content' => 'Content',
            'votes_up' => 'Votes Up',
            'votes_down' => 'Votes Down',
        ];
    }
}
