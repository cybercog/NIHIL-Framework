<?php

namespace app\modules\ac\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\ac\models\SessionLogs;

/**
 * SessionLogsSearch represents the model behind the search form about `app\modules\ac\models\SessionLogs`.
 */
class SessionLogsSearch extends SessionLogs
{
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['timestamp', 'label', 'description', 'ip_address', 'user_agent'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = SessionLogs::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'timestamp' => $this->timestamp,
        ]);

        $query->andFilterWhere(['like', 'label', $this->label])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'ip_address', $this->ip_address])
            ->andFilterWhere(['like', 'user_agent', $this->user_agent]);

        return $dataProvider;
    }
}
