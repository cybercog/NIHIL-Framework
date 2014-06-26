<?php

namespace app\modules\cms\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\cms\models\Post;

/**
 * PostSearch represents the model behind the search form about `app\modules\cms\models\Post`.
 */
class PostSearch extends Post
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type', 'author', 'views', 'votes_up', 'votes_down'], 'integer'],
            [['name', 'slug', 'date_created', 'date_updated', 'date_published', 'content', 'date_lastview'], 'safe'],
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
            'type' => $this->type,
            'author' => $this->author,
            'date_created' => $this->date_created,
            'date_updated' => $this->date_updated,
            'date_published' => $this->date_published,
            'votes_up' => $this->votes_up,
			'votes_down' => $this->votes_down,
			'views' => $this->views,
            'date_lastview' => $this->date_lastview,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
