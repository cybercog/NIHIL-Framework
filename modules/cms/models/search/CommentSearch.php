<?php

namespace app\modules\cms\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\cms\models\Comment;

/**
 * CommentSearch represents the model behind the search form about `app\modules\cms\models\Comment`.
 */
class CommentSearch extends Comment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent', 'content_id', 'user_id', 'votes_up', 'votes_down'], 'integer'],
            [['content', 'date_created', 'date_modified', 'date_edited'], 'safe'],
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
            'content_id' => $this->content_id,
            'user_id' => $this->user_id,
            'date_created' => $this->date_created,
            'date_modified' => $this->date_modified,
            'date_edited' => $this->date_edited,
            'votes_up' => $this->votes_up,
            'votes_down' => $this->votes_down,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
