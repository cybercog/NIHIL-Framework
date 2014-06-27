<?php

namespace app\modules\cms\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\cms\models\Project;

/**
 * ProjectSearch represents the model behind the search form about `app\modules\cms\models\Project`.
 */
class ProjectSearch extends Project
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent', 'author_id', 'votes_up', 'votes_down', 'views'], 'integer'],
            [['title', 'slug', 'image', 'description', 'date_created', 'date_updated', 'date_published', 'date_lastview'], 'safe'],
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
        $query = Project::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'parent' => $this->parent,
            'author_id' => $this->author_id,
            'date_created' => $this->date_created,
            'date_updated' => $this->date_updated,
            'date_published' => $this->date_published,
            'votes_up' => $this->votes_up,
            'votes_down' => $this->votes_down,
            'views' => $this->views,
            'date_lastview' => $this->date_lastview,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
