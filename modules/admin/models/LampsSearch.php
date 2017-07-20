<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Lamps;

/**
 * LampsSearch represents the model behind the search form about `app\modules\admin\models\Lamps`.
 */
class LampsSearch extends Lamps
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'luminous', 'length', 'width', 'lifetime', 'sortorder'], 'integer'],
            [['article', 'name', 'shape', 'description', 'cap'], 'safe'],
            [['price', 'power'], 'number'],
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
        $query = Lamps::find();

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
            'price' => $this->price,
            'power' => $this->power,
            'luminous' => $this->luminous,
            'length' => $this->length,
            'width' => $this->width,
            'lifetime' => $this->lifetime,
            'sortorder' => $this->sortorder,
        ]);

        $query->andFilterWhere(['like', 'article', $this->article])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'shape', $this->shape])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'cap', $this->cap]);

        return $dataProvider;
    }
}
