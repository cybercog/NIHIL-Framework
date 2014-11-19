<?php

namespace app\modules\gow\models;

use Yii;

/**
 * This is the model class for table "gow_alliances".
 *
 * @property integer $id
 * @property string $abbr
 * @property string $name
 * @property string $image
 * @property string $description
 * @property string $date_created
 *
 * @property Banks[] $banks
 * @property Players[] $players
 */
class Alliance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gow_alliances';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['abbr', 'name', 'description', 'date_created'], 'required'],
            [['description'], 'string'],
            [['date_created'], 'safe'],
            [['abbr'], 'string', 'max' => 3],
            [['name'], 'string', 'max' => 100],
            [['image'], 'string', 'max' => 255],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'abbr' => 'Abbr',
            'name' => 'Name',
            'image' => 'Image',
            'description' => 'Description',
            'date_created' => 'Date Created',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBanks()
    {
        return $this->hasMany(BanksclassName(), ['alliance_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlayers()
    {
        return $this->hasMany(Player::className(), ['alliance_id' => 'id']);
    }
}
