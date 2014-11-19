<?php

namespace app\modules\gow\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\gow\models\BankDailyLog;

/**
 * BankDailyLogSearch represents the model behind the search form about `app\modules\gow\models\BankDailyLog`.
 */
class BankDailyLogSearch extends BankDailyLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'bank_id'], 'integer'],
            [['date'], 'safe'],
            [['daily_stone', 'daily_wood', 'daily_food', 'daily_ore', 'daily_silver', 'daily_total', 'sum_stone', 'sum_wood', 'sum_food', 'sum_ore', 'sum_silver', 'sum_total'], 'number'],
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
        $query = BankDailyLog::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'bank_id' => $this->bank_id,
            'date' => $this->date,
            'daily_stone' => $this->daily_stone,
            'daily_wood' => $this->daily_wood,
            'daily_food' => $this->daily_food,
            'daily_ore' => $this->daily_ore,
            'daily_silver' => $this->daily_silver,
            'daily_total' => $this->daily_total,
            'sum_stone' => $this->sum_stone,
            'sum_wood' => $this->sum_wood,
            'sum_food' => $this->sum_food,
            'sum_ore' => $this->sum_ore,
            'sum_silver' => $this->sum_silver,
            'sum_total' => $this->sum_total,
        ]);

        return $dataProvider;
    }
}
