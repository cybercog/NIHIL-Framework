<?php

namespace app\modules\cms\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\cms\models\ProjectStep;

/**
 * ProjectStepSearch represents the model behind the search form about `app\modules\cms\models\ProjectStep`.
 */
class ProjectStepSearch extends ProjectStep
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'project_id', 'type', 'order'], 'integer'],
            [['image', 'time_estimated', 'content'], 'safe'],
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
        $query = ProjectStep::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'project_id' => $this->project_id,
            'type' => $this->type,
            'time_estimated' => $this->time_estimated,
            'order' => $this->order,
        ]);

        $query->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
