<?php

namespace frontend\models;

use Yii;
use frontend\models\Base;
use PSpell\Config;
use common\components\MyHelpers;

/**
 * This is the model class for table "banner".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $status
 * @property int $type
 */
class TemplateNews extends Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'template_news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'status'], 'required'],
            [['title', 'content'], 'string'],
            [['type', 'status'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Tiêu đề',
            'content' => 'Nội dung',
            'status' => 'Trạng thái',
            'type' => 'Loại'
        ];
    }

    public function getContent($date, $label, $provinceType, $typeMien)
    {
        $dataProvince = ConfigWebsite::getDataFollowProvince($provinceType);
        $contentLogan = ConfigWebsite::getContentLoGan($dataProvince['url_so_gan']);
        $content10SoXuatHienNhieuNhat = ConfigWebsite::getContent10SoXuatHienNhieuNhat($dataProvince['url_so_gan']);
        $contentThongKeGiaiDacBiet = ConfigWebsite::getContentThongKeGiaiDacBiet($dataProvince['url_so_gan']);
        $txt_thu = ConfigWebsite::getWeekday($date);
        $dateXoSoKyTruoc = ConfigWebsite::getTimeStampXoSoKyTruoc($provinceType, $date, $typeMien);

        // Lay table so so ky truoc
        $contentXoSoKyTruoc = ConfigWebsite::getTableXoSo(Yii::$app->request->hostInfo."/site/get-content-xo-so-province?province=" . $provinceType . "&date=" . $dateXoSoKyTruoc);
       
        $vars = [
            '{{ten_dai}}' => $label,
            '{{ngay_xo}}' => date('d/m/Y', $date),
            '{{ngay_xo_ky_truoc}}' => date('d/m/Y', $dateXoSoKyTruoc),
            '{{table_xo_so_ky_truoc}}' => $contentXoSoKyTruoc,
            '{{thu}}' => $txt_thu,
            '{{auto_2so_1}}' => rand(10, 99),
            '{{auto_2so_2}}' => rand(10, 99),
            //
            '{{auto_5so_1}}' => rand(10000, 99999),
            '{{auto_5so_2}}' => rand(10000, 99999),
            '{{auto_5so_3}}' => rand(10000, 99999),
            '{{auto_5so_4}}' => rand(10000, 99999),
            //
            '{{table_lo_gan}}' => $contentLogan,
            '{{table_10_so_xuat_hien_nhieu_nhat}}' => $content10SoXuatHienNhieuNhat,
            '{{thong_ke_giai_dac_biet}}' => $contentThongKeGiaiDacBiet,
        ];

        return str_replace(array_keys($vars), array_values($vars), $this->content);
    }

    public function getContentCut($length) {
        if (mb_strlen($this->content, 'UTF-8') <= $length) {
            return $this->content;
        }
        return mb_substr($this->content, 0, $length, 'UTF-8') . '...';
    }
}
