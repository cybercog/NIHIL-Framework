<?php

namespace app\modules\ecom\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\ecom\models\AuthnetTransaction;

/**
 * AuthnetTransactionSearch represents the model behind the search form about `app\modules\ecom\models\AuthnetTransaction`.
 */
class AuthnetTransactionSearch extends AuthnetTransaction
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'response_code', 'transaction_id'], 'integer'],
            [['ip_address', 'timestamp', 'response_text', 'authorization_type', 'result', 'data_sent', 'data_received', 'session_id', 'details'], 'safe'],
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
        $query = AuthnetTransaction::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'timestamp' => $this->timestamp,
            'response_code' => $this->response_code,
            'transaction_id' => $this->transaction_id,
        ]);

        $query->andFilterWhere(['like', 'ip_address', $this->ip_address])
            ->andFilterWhere(['like', 'response_text', $this->response_text])
            ->andFilterWhere(['like', 'authorization_type', $this->authorization_type])
            ->andFilterWhere(['like', 'result', $this->result])
            ->andFilterWhere(['like', 'data_sent', $this->data_sent])
            ->andFilterWhere(['like', 'data_received', $this->data_received])
            ->andFilterWhere(['like', 'session_id', $this->session_id])
            ->andFilterWhere(['like', 'details', $this->details]);

        return $dataProvider;
    }
}
