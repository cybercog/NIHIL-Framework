<?php

namespace app\modules\support\models;

use Yii;

/**
 * This is the model class for table "support_faqs".
 *
 * @property integer $id
 * @property string $question
 * @property string $answer
 * @property integer $order
 */
class Faq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'support_faqs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question', 'answer'], 'required'],
            [['question', 'answer'], 'string'],
            [['order'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question' => 'Question',
            'answer' => 'Answer',
            'order' => 'Order',
        ];
    }
}
