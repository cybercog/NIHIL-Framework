<?php

namespace app\modules\gow\models;

use Yii;

/**
 * This is the model class for table "gow_bank_transactions".
 *
 * @property integer $id
 * @property integer $reconciled
 * @property integer $bank_id
 * @property integer $sending_player
 * @property integer $receiving_player
 * @property integer $stone
 * @property integer $wood
 * @property integer $food
 * @property integer $ore
 * @property integer $silver
 * @property string $timestamp
 * @property string $notes
 *
 * @property bank $bank
 * @property player $sendingPlayer
 * @property player $receivingPlayer
 */
class BankTransaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gow_bank_transactions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reconciled', 'bank_id', 'sending_player', 'receiving_player'], 'integer'],
            [['bank_id', 'sending_player', 'receiving_player', 'stone', 'wood', 'food', 'ore', 'silver', 'timestamp', 'notes'], 'required'],
            [['stone', 'wood', 'food', 'ore', 'silver'], 'integer'],
            [['timestamp'], 'safe'],
            [['notes'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reconciled' => 'Reconciled',
            'bank_id' => 'Bank ID',
            'sending_player' => 'Player',
			'receiving_player' => 'Receiver',
            'stone' => 'Stone',
            'wood' => 'Wood',
            'food' => 'Food',
            'ore' => 'Ore',
            'silver' => 'Silver',
            'timestamp' => 'Timestamp',
            'notes' => 'Notes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBank()
    {
        return $this->hasOne(Bank::className(), ['id' => 'bank_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSendingPlayer()
    {
        return $this->hasOne(Player::className(), ['id' => 'sending_player']);
    }
	
	/**
     * @return \yii\db\ActiveQuery
     */
    public function getReceivingPlayer()
    {
        return $this->hasOne(Player::className(), ['id' => 'receiving_player']);
    }
}
