<?php

namespace frontend\models;

use CKSource\CKFinder\Acl\Permission;
use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "register_template_form".
 *
 * @property int $id
 * @property string $fullname
 * @property string|null $phone
 * @property string|null $email
 * @property int $category_id
 * @property string|null $content
 * @property int $status
 */
class RegisterTemplateForm extends \yii\db\ActiveRecord
{
    const STATUS_NEW = 1;
    const STATUS_APPROVAL = 3 ;
    const STATUS_REFUSE = 5 ;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'register_template_form';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fullname', 'category_id', 'phone', 'email'], 'required'],
            [['category_id', 'status', 'date_created'], 'integer'],
            [['content'], 'string'],
            [['fullname'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 15],
            [['email'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => 'Họ và tên',
            'phone' => 'Số điện thoại',
            'email' => 'Email',
            'category_id' => 'Danh mục',
            'content' => 'Nội dung',
            'status' => 'Trạng thái',
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
            'status'=>$this->status,
        ]);

        $query->andFilterWhere(['like', 'fullname', $this->name]);

        // filter by order amount

        return $dataProvider;
    }

    public static function listCategory()
    {
        return [
            1 => 'Tin tức',
            3 => 'Công nghệ thông tin',
            5 => 'Điện máy',
            7 => 'Giới thiệu doanh nghiệp',
            9 => 'Spa làm đẹp',
            11 => 'Mỹ phẩm',
            13 => 'Xây dựng',
            99 => 'Khác',
        ];
    }

    public static function listStatus()
    {
        return [
            self::STATUS_NEW => 'Mới',
            self::STATUS_APPROVAL => 'Đã duyệt',
            self::STATUS_REFUSE=> 'Từ chối',
        ];
    }
}
