<?php

namespace app\modules\gow\models;

use Yii;

/**
 * This is the model class for table "gow_bank_daily_logs".
 *
 * @property integer $id
 * @property integer $bank_id
 * @property string $date
 * @property integer $daily_stone
 * @property integer $daily_wood
 * @property integer $daily_food
 * @property integer $daily_ore
 * @property integer $daily_silver
 * @property integer $daily_total
 * @property integer $sum_stone
 * @property integer $sum_wood
 * @property integer $sum_food
 * @property integer $sum_ore
 * @property integer $sum_silver
 * @property integer $sum_total
 *
 * @property Bank $bank
 */
class BankDailyLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gow_bank_daily_logs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bank_id', 'date', 'daily_stone', 'daily_wood', 'daily_food', 'daily_ore', 'daily_silver', 'daily_total', 'sum_stone', 'sum_wood', 'sum_food', 'sum_ore', 'sum_silver', 'sum_total'], 'required'],
            [['bank_id'], 'integer'],
            [['date'], 'safe'],
            [['daily_stone', 'daily_wood', 'daily_food', 'daily_ore', 'daily_silver', 'daily_total', 'sum_stone', 'sum_wood', 'sum_food', 'sum_ore', 'sum_silver', 'sum_total'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bank_id' => 'Bank ID',
            'date' => 'Date',
            'daily_stone' => 'Daily Stone',
            'daily_wood' => 'Daily Wood',
            'daily_food' => 'Daily Food',
            'daily_ore' => 'Daily Ore',
            'daily_silver' => 'Daily Silver',
            'daily_total' => 'Daily Total',
            'sum_stone' => 'Sum Stone',
            'sum_wood' => 'Sum Wood',
            'sum_food' => 'Sum Food',
            'sum_ore' => 'Sum Ore',
            'sum_silver' => 'Sum Silver',
            'sum_total' => 'Sum Total',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBank()
    {
        return $this->hasOne(Bank::className(), ['id' => 'bank_id']);
    }
}
