<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\UserOperation;

/**
 * UserOperationSearch represents the model behind the search form of `backend\models\UserOperation`.
 */
class UserOperationSearch extends UserOperation
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'role', 'status', 'created_at', 'updated_at', 'lang'], 'integer'],
            [['username', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'last_name', 'first_name', 'patronymic', 'filename', 'avatar', 'organization_name', 'organization_email', 'organization_phone', 'organization_address', 'organization_web', 'organization_position_held'], 'safe'],
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
        $query = UserOperation::find();

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
            'role' => $this->role,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'lang' => $this->lang,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'patronymic', $this->patronymic])
            ->andFilterWhere(['like', 'filename', $this->filename])
            ->andFilterWhere(['like', 'avatar', $this->avatar])
            ->andFilterWhere(['like', 'organization_name', $this->organization_name])
            ->andFilterWhere(['like', 'organization_email', $this->organization_email])
            ->andFilterWhere(['like', 'organization_phone', $this->organization_phone])
            ->andFilterWhere(['like', 'organization_address', $this->organization_address])
            ->andFilterWhere(['like', 'organization_web', $this->organization_web])
            ->andFilterWhere(['like', 'organization_position_held', $this->organization_position_held]);

        return $dataProvider;
    }
}
