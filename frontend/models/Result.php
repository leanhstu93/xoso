<?php

namespace frontend\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "result".
 *
 * @property int $id
 * @property string|null $data
 * @property string|null $name
 * @property string|null $email
 * @property string|null $phone
 * @property int|null $date
 * @property int|null $status
 * @property float|null $point
 * @property string|null $result_name
 */
class Result extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'result';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data'], 'string'],
            [['date', 'status'], 'integer'],
            [['point'], 'number'],
            [['name', 'email', 'result_name'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data' => 'Data',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'date' => 'Date',
            'status' => 'Status',
            'point' => 'Point',
            'result_name' => 'Result Name',
        ];
    }

    public function search($params) {
        $query = self::find();

        $dataProvider = new ActiveDataProvider([
            'query'=>$query,
            'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]]
        ]);


        if (!($this->load($params))) {

            return $dataProvider;
        }

        $query->andFilterWhere([
            'id'=>$this->id,
            'name'=>$this->name,
            'phone'=>$this->phone,
            'email'=>$this->email,
            'date'=>$this->date,
            'status'=>$this->status,
        ]);
        // filter by order amount

        return $dataProvider;
    }
}
