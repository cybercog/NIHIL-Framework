<?php

namespace app\modules\support\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\support\models\Ticket;

/**
 * TicketSearch represents the model behind the search form about `app\modules\support\models\Ticket`.
 */
class TicketsSearch extends Ticket
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent', 'type', 'status', 'priority', 'reporter', 'assignee', 'resolution'], 'integer'],
            [['ref_code', 'name', 'slug', 'date_reported', 'date_assigned', 'date_edited', 'date_estimated', 'date_resolved', 'time_estimated', 'time_actual', 'message', 'details'], 'safe'],
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
            'parent' => $this->parent,
            'type' => $this->type,
            'status' => $this->status,
            'priority' => $this->priority,
            'reporter' => $this->reporter,
            'assignee' => $this->assignee,
            'date_reported' => $this->date_reported,
            'date_assigned' => $this->date_assigned,
            'date_edited' => $this->date_edited,
            'date_estimated' => $this->date_estimated,
            'date_resolved' => $this->date_resolved,
            'time_estimated' => $this->time_estimated,
            'time_actual' => $this->time_actual,
            'resolution' => $this->resolution,
        ]);

        $query->andFilterWhere(['like', 'ref_code', $this->ref_code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'details', $this->details]);

        return $dataProvider;
    }
}
