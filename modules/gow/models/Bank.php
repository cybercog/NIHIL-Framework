<?php

namespace app\modules\gow\models;

use Yii;

/**
 * This is the model class for table "gow_banks".
 *
 * @property integer $id
 * @property integer $alliance_id
 * @property integer $stone
 * @property integer $wood
 * @property integer $food
 * @property integer $ore
 * @property integer $silver
 * @property string $date_created
 * @property string $date_updated
 * @property string $date_reconciled
 *
 * @property BankDailyLogs[] $bankDailyLogs
 * @property BankTransactions[] $bankTransactions
 * @property Alliance $alliance
 */
class Bank extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gow_banks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alliance_id', 'stone', 'wood', 'food', 'ore', 'silver', 'date_created'], 'required'],
            [['alliance_id'], 'integer'],
            [['stone', 'wood', 'food', 'ore', 'silver'], 'integer'],
            [['date_created', 'date_updated', 'date_reconciled'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alliance_id' => 'Alliance ID',
            'stone' => 'Stone',
            'wood' => 'Wood',
            'food' => 'Food',
            'ore' => 'Ore',
            'silver' => 'Silver',
            'date_created' => 'Date Created',
            'date_updated' => 'Date Updated',
            'date_reconciled' => 'Date Reconciled',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBankDailyLogs()
    {
        return $this->hasMany(BankDailyLog::className(), ['bank_id' => 'id'])
			->where('date > :threshold', [':threshold' => date("Y-m-d H:i:s", strtotime("-1 month"))])
            ->orderBy('date ASC');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBankTransactions()
    {
        return $this->hasMany(BankTransaction::className(), ['bank_id' => 'id'])->orderBy('timestamp DESC');;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlliance()
    {
        return $this->hasOne(Alliance::className(), ['id' => 'alliance_id']);
    }
}
