<?php

namespace app\modules\ac\models;

use Yii;

/**
 * This is the model class for table "ac_auth_keys".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $type
 * @property string $key
 * @property string $date_created
 * @property string $date_expires
 * @property string $date_used
 */
class AuthKeys extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ac_auth_keys';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'type', 'key'], 'required'],
            [['user_id', 'type'], 'integer'],
            [['date_created', 'date_expires', 'date_used'], 'safe'],
            [['key'], 'string', 'max' => 128]
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
            'type' => 'Type',
            'key' => 'Key',
            'date_created' => 'Date Created',
            'date_expires' => 'Date Expires',
            'date_used' => 'Date Used',
        ];
    }
	
	/**
     * Finds authkey by code
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByCode($code)
    {
        $authkey = static::findOne(['key' => $code, 'date_used' => NULL]);
		if($authkey) {
			$ctime = strtotime($authkey->date_created);
			$etime = strtotime($authkey->date_expires);
			$ntime = time();
			if($ctime <= $ntime AND $etime >= $ntime) {
				return $authkey;
			}
		}
		
		return FALSE;
    }
}
