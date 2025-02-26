<?php

namespace frontend\models;

use common\models\Member;
use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "logs".
 *
 * @property int $id
 * @property string $action
 * @property string $content
 * @property int $time
 * @property string $ip
 */
class Logs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'logs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['action',  'time', 'ip', 'user_id'], 'required'],
            [['id', 'time', 'user_id'], 'integer'],
            [['content'], 'string'],
            [['action'], 'string', 'max' => 255],
            [['ip'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'action' => 'Hành động',
            'content' => 'Nội dung',
            'time' => 'Thời gian',
            'ip' => 'Ip',
            'user_id' => 'user_id'
        ];
    }

    public function search($params) {
        $query = self::find();
        $query->joinWith(['member']);
        $dataProvider = new ActiveDataProvider([
            'query'=>$query,
            'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]]
        ]);

        /**
         * Setup your sorting attributes
         * Note: This is setup before the $this->load($params)
         * statement below
         */

        if (!($this->load($params))) {

            return $dataProvider;
        }

        $query->andFilterWhere([
            'id'=>$this->id,
            'action' =>$this->action,
            'ip' =>$this->ip,
        ]);

        if ($this->member) {
            $query->andFilterWhere(['like', 'member.username', $this->member->username]);
        }


        // filter by order amount

        return $dataProvider;
    }

    /**
     * @return array|\yii\db\ActiveRecord|null
     */
    public function getMember() {
        return $this->hasOne(Member::className(), ['id' => 'user_id']);
    }
}
