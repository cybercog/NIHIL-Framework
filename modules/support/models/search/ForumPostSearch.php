<?php

namespace app\modules\support\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\support\models\ForumPost;

/**
 * ForumPostSearch represents the model behind the search form about `app\modules\support\models\ForumPost`.
 */
class ForumPostSearch extends ForumPost
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'thread_id', 'views_count', 'replies_count', 'votes_up', 'votes_down', 'sticky', 'locked', 'deleted', 'accepted_answer'], 'integer'],
            [['title', 'slug', 'content', 'date_created', 'date_modified', 'date_edited'], 'safe'],
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
        $query = ForumPost::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'thread_id' => $this->thread_id,
            'views_count' => $this->views_count,
            'replies_count' => $this->replies_count,
            'votes_up' => $this->votes_up,
            'votes_down' => $this->votes_down,
            'sticky' => $this->sticky,
            'date_created' => $this->date_created,
            'date_modified' => $this->date_modified,
            'date_edited' => $this->date_edited,
            'locked' => $this->locked,
            'deleted' => $this->deleted,
            'accepted_answer' => $this->accepted_answer,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
