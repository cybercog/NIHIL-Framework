<?php

namespace app\modules\ecom\models;

use Yii;

/**
 * This is the model class for table "ecom_contacts".
 *
 * @property integer $id
 * @property integer $active
 * @property integer $user_id
 * @property string $first
 * @property string $middle
 * @property string $last
 * @property string $suffix
 * @property string $company
 * @property string $email
 * @property string $phone
 * @property string $address1
 * @property string $address2
 * @property string $address3
 * @property string $city
 * @property string $state
 * @property string $zipcode
 * @property string $country
 * @property string $date_created
 * @property string $date_confirmed
 * @property string $date_last_used
 * @property string $details
 *
 * @property AcUsers $user
 * @property EcomInvoices[] $ecomInvoices
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_contacts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active', 'user_id'], 'integer'],
            [['first', 'last', 'email', 'phone', 'address1', 'city', 'state', 'zipcode', 'country'], 'required'],
            [['date_created', 'date_confirmed', 'date_last_used'], 'safe'],
            [['details'], 'string'],
            [['first', 'middle', 'last'], 'string', 'max' => 100],
            [['suffix'], 'string', 'max' => 8],
            [['company', 'email', 'address1', 'address2', 'address3', 'city'], 'string', 'max' => 150],
            [['phone'], 'string', 'max' => 16],
            [['state', 'country'], 'string', 'max' => 2],
            [['zipcode'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'active' => 'Active',
            'user_id' => 'User ID',
            'first' => 'First',
            'middle' => 'Middle',
            'last' => 'Last',
            'suffix' => 'Suffix',
            'company' => 'Company',
            'email' => 'Email',
            'phone' => 'Phone',
            'address1' => 'Address1',
            'address2' => 'Address2',
            'address3' => 'Address3',
            'city' => 'City',
            'state' => 'State',
            'zipcode' => 'Zipcode',
            'country' => 'Country',
            'date_created' => 'Date Created',
            'date_confirmed' => 'Date Confirmed',
            'date_last_used' => 'Date Last Used',
            'details' => 'Details',
        ];
    }
	
	/**
     * Get list of users for creating dropdowns
     *
     * @return array
     */
    public static function nameDropdown() {

        // get data if needed
        static $dropdown;
        if ($dropdown === null) {

            // get all records from database and generate
            $models = static::find()->all();
            foreach ($models as $model) {
                $dropdown[$model->id] = $model->first . ' ' . $model->last;
            }
        }

        return $dropdown;
    }
	


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(AcUsers::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEcomInvoices()
    {
        return $this->hasMany(EcomInvoices::className(), ['shipping_id' => 'id']);
    }

}
