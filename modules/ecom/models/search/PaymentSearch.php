<?php

namespace app\modules\ecom\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\ecom\models\Payment;

/**
 * PaymentSearch represents the model behind the search form about `app\modules\ecom\models\Payment`.
 */
class PaymentSearch extends Payment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'payment_type_id', 'user_id', 'payment_method_id'], 'integer'],
            [['date_created', 'account_type', 'account_number', 'transaction_id', 'token', 'comments', 'details'], 'safe'],
            [['amount'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Payment::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'payment_type_id' => $this->payment_type_id,
            'user_id' => $this->user_id,
            'date_created' => $this->date_created,
            'amount' => $this->amount,
            'payment_method_id' => $this->payment_method_id,
        ]);

        $query->andFilterWhere(['like', 'account_type', $this->account_type])
            ->andFilterWhere(['like', 'account_number', $this->account_number])
            ->andFilterWhere(['like', 'transaction_id', $this->transaction_id])
            ->andFilterWhere(['like', 'token', $this->token])
            ->andFilterWhere(['like', 'comments', $this->comments])
            ->andFilterWhere(['like', 'details', $this->details]);

        return $dataProvider;
    }
}
