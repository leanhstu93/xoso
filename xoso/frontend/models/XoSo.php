<?php

namespace frontend\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "bill".
 *
 * @property int $id
 * @property int $member_id
 * @property int $date_create
 * @property int $fullname
 * @property string $email
 * @property string $phone
 * @property string $receive_fullname
 * @property string $receive_email
 * @property string $receive_phone
 * @property string $address
 * @property string $receive_address
 * @property string $note
 * @property int $status
 * @property string $total_cost
 */
class XoSo extends \yii\db\ActiveRecord
{

    const STATUS_ACTIVE = 1;
    const STATUS_UNACTIVE = 3;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bill';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id', 'date_create', 'status'], 'integer'],
            [['note'], 'string'],
            [['fullname', 'email', 'receive_fullname', 'receive_email', 'receive_phone', 'total_cost'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 15],
            [['address', 'receive_address'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'member_id' => 'Member ID',
            'date_create' => 'Thời gian đặt hàng',
            'fullname' => 'Họ tên người đặt hàng',
            'email' => 'Email',
            'phone' => 'Phone',
            'receive_fullname' => 'Họ tên người nhận',
            'receive_email' => 'Receive Email',
            'receive_phone' => 'Receive Phone',
            'address' => 'Address',
            'receive_address' => 'Receive Address',
            'note' => 'Note',
            'status' => 'Status',
            'total_cost' => 'Total Cost',
        ];
    }

    public function search($params = []) {
        $query = self::find();

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
        ]);

        $query->andFilterWhere(['like', 'fullname', $this->fullname]);

        // filter by order amount

        return $dataProvider;
    }
}
