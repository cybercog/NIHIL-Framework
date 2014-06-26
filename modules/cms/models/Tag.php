<?php

namespace app\modules\cms\models;

use Yii;

/**
 * This is the model class for table "cms_tags".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $color
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'color'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['color'], 'string', 'max' => 16]
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
            'description' => 'Description',
            'color' => 'Color',
        ];
    }
}
