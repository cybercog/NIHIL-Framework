<?php

namespace app\modules\core\models;

use Yii;

/**
 * This is the model class for table "core_directory_listings".
 *
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property string $image
 * @property string $description
 */
class DirectoryListing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'core_directory_listings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'url', 'image', 'description'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 150],
            [['url', 'image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'url' => 'Url',
            'image' => 'Image',
            'description' => 'Description',
        ];
    }
}
