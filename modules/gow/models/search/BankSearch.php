<?php

namespace app\modules\gow\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\gow\models\Bank;

/**
 * BankrSearch represents the model behind the search form about `app\modules\gow\models\Bank`.
 */
class BankSearch extends Bank
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'alliance_id'], 'integer'],
            [['stone', 'wood', 'food', 'ore', 'silver'], 'number'],
            [['date_created', 'date_updated', 'date_reconciled'], 'safe'],
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
        $query = Bank::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'alliance_id' => $this->alliance_id,
            'stone' => $this->stone,
            'wood' => $this->wood,
            'food' => $this->food,
            'ore' => $this->ore,
            'silver' => $this->silver,
            'date_created' => $this->date_created,
            'date_updated' => $this->date_updated,
            'date_reconciled' => $this->date_reconciled,
        ]);

        return $dataProvider;
    }
}
