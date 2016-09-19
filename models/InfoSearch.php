<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Info;

/**
 * InfoSearch represents the model behind the search form about `app\models\Info`.
 */
class InfoSearch extends Info
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['std_id', 'std_classroom', 'std_roll_no', 'std_profile', 'std_family', 'std_education'], 'integer'],
            [['std_id_no', 'std_citizenship', 'std_nickname', 'std_fname', 'std_lname', 'std_fname_en', 'std_lname_en', 'std_classteacher'], 'safe'],
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
        $query = Info::find();

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
            'std_id' => $this->std_id,
            'std_classroom' => $this->std_classroom,
            'std_roll_no' => $this->std_roll_no,
            'std_profile' => $this->std_profile,
            'std_family' => $this->std_family,
            'std_education' => $this->std_education,
        ]);

        $query->andFilterWhere(['like', 'std_id_no', $this->std_id_no])
            ->andFilterWhere(['like', 'std_citizenship', $this->std_citizenship])
            ->andFilterWhere(['like', 'std_nickname', $this->std_nickname])
            ->andFilterWhere(['like', 'std_fname', $this->std_fname])
            ->andFilterWhere(['like', 'std_lname', $this->std_lname])
            ->andFilterWhere(['like', 'std_fname_en', $this->std_fname_en])
            ->andFilterWhere(['like', 'std_lname_en', $this->std_lname_en])
            ->andFilterWhere(['like', 'std_classteacher', $this->std_classteacher]);

        return $dataProvider;
    }
}
