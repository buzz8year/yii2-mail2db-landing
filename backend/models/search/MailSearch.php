<?php


namespace backend\models\search;


use backend\models\MailFile;
use yii\data\ActiveDataProvider;


class MailSearch extends MailFile
{
    public $type;

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = MailFile::find()->where(['type' => $this->type]);

        if ($this->type == MailFile::TYPE_INCOMING)
            $query->orderBy(['epoch_received' => SORT_DESC]);

        else $query->orderBy(['epoch_recorded' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        return $dataProvider;
    }
}