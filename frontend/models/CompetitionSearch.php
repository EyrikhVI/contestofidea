<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Competition;

/**
 * CompetitionSearch represents the model behind the search form of `frontend\models\Competition`.
 */
class CompetitionSearch extends Competition
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'category_id', 'start_date', 'application_start_date', 'application_end_date', 'end_date', 'application_for_participant', 'application_for_competition', 'views_for_competition', 'status', 'created_at', 'updated_at', 'link_info_letter'], 'integer'],
            [['name', 'note', 'conditions_file', 'conditions', 'inform_letter'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Competition::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'category_id' => $this->category_id,
            'start_date' => $this->start_date,
            'application_start_date' => $this->application_start_date,
            'application_end_date' => $this->application_end_date,
            'end_date' => $this->end_date,
            'application_for_participant' => $this->application_for_participant,
            'application_for_competition' => $this->application_for_competition,
            'views_for_competition' => $this->views_for_competition,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'link_info_letter' => $this->link_info_letter,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'conditions_file', $this->conditions_file])
            ->andFilterWhere(['like', 'conditions', $this->conditions])
            ->andFilterWhere(['like', 'inform_letter', $this->inform_letter]);

        return $dataProvider;
    }
}
