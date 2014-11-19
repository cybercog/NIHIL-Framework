<?php

namespace app\modules\gow\models;

use Yii;

/**
 * This is the model class for table "gow_players".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $alliance_id
 * @property string $rank
 * @property string $name
 * @property integer $stone
 * @property integer $wood
 * @property integer $food
 * @property integer $ore
 * @property integer $silver
 * @property string $date_joined
 * @property string $date_updated
 *
 * @property BankTransactions[] $gowBankTransactions
 * @property Alliance $alliance
 */
class Player extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gow_players';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'alliance_id'], 'integer'],
            [['alliance_id', 'name', 'date_joined'], 'required'],
            [['stone', 'wood', 'food', 'ore', 'silver'], 'integer'],
            [['date_joined', 'date_updated'], 'safe'],
            [['rank'], 'string', 'max' => 3],
            [['name'], 'string', 'max' => 100],
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
            'user_id' => 'User ID',
            'alliance_id' => 'Alliance ID',
            'rank' => 'Rank',
            'name' => 'Name',
            'stone' => 'Stone',
            'wood' => 'Wood',
            'food' => 'Food',
            'ore' => 'Ore',
            'silver' => 'Silver',
            'date_joined' => 'Date Joined',
            'date_updated' => 'Date Updated',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBankTransactions()
    {
        return $this->hasMany(BankTransaction::className(), ['player_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlliance()
    {
        return $this->hasOne(Alliance::className(), ['id' => 'alliance_id']);
    }
}
