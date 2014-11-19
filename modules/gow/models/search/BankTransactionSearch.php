<?php

namespace app\modules\gow\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\gow\models\BankTransaction;

/**
 * BankTransactionSearch represents the model behind the search form about `app\modules\gow\models\BankTransaction`.
 */
class BankTransactionSearch extends BankTransaction
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'reconciled', 'bank_id', 'player_id'], 'integer'],
            [['stone', 'wood', 'food', 'ore', 'silver'], 'number'],
            [['timestamp', 'notes'], 'safe'],
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
        $query = BankTransaction::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort' => [
                'defaultOrder' => [
                    'timestamp' => SORT_DESC,
                ]
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'reconciled' => $this->reconciled,
            'bank_id' => $this->bank_id,
            'player_id' => $this->player_id,
            'stone' => $this->stone,
            'wood' => $this->wood,
            'food' => $this->food,
            'ore' => $this->ore,
            'silver' => $this->silver,
            'timestamp' => $this->timestamp,
        ]);

        $query->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
	
	/**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function reconcile($params)
    {
        $query = BankTransaction::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort' => [
                'defaultOrder' => [
                    'timestamp' => SORT_DESC,
                ]
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'bank_id' => $this->bank_id,
            'player_id' => $this->player_id,
            'stone' => $this->stone,
            'wood' => $this->wood,
            'food' => $this->food,
            'ore' => $this->ore,
            'silver' => $this->silver,
            'timestamp' => $this->timestamp,
        ]);

        $query->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
