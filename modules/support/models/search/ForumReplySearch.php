<?php

namespace app\modules\support\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\support\models\ForumReply;

/**
 * ForumReplySearch represents the model behind the search form about `app\modules\support\models\ForumReply`.
 */
class ForumReplySearch extends ForumReply
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent', 'post_id', 'user_id', 'votes_up', 'votes_down', 'accepted'], 'integer'],
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
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ForumReply::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'parent' => $this->parent,
            'post_id' => $this->post_id,
            'user_id' => $this->user_id,
            'date_created' => $this->date_created,
            'date_modified' => $this->date_modified,
            'date_edited' => $this->date_edited,
            'votes_up' => $this->votes_up,
            'votes_down' => $this->votes_down,
            'accepted' => $this->accepted,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
