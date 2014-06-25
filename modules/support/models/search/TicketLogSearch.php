<?php

namespace app\modules\support\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\support\models\TicketLog;

/**
 * TicketLogSearch represents the model behind the search form about `app\modules\support\models\TicketLog`.
 */
class TicketLogSearch extends TicketLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ticket_id'], 'integer'],
            [['timestamp', 'action'], 'safe'],
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
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = static::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'ticket_id' => $this->ticket_id,
            'timestamp' => $this->timestamp,
        ]);

        $query->andFilterWhere(['like', 'action', $this->action]);

        return $dataProvider;
    }
}
