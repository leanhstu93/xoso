<?php

namespace frontend\models;

use frontend\models\Base;
use Yii;

/**
 * This is the model class for table "config_website".
 *
 * @property int $id
 * @property string $setting
 */
class ConfigWebsite extends Base
{
    const TYPE_MIEN_NAM = 1;
    const TYPE_MIEN_BAC = 2;
    const TYPE_MIEN_TRUNG = 3;

    const TYPE_XO_SO_THU  = 1;    

    const URL_TPHCM = 'https://www.xoso.net/getkqxs/tp-hcm.js';
    const URL_DONG_THAP = 'https://www.xoso.net/getkqxs/dong-thap.js';
    const URL_CA_MAU = 'https://www.xoso.net/getkqxs/ca-mau.js';
    const URL_BEN_TRE = 'https://www.xoso.net/getkqxs/ben-tre.js';
    const URL_VUNG_TAU = 'https://www.xoso.net/getkqxs/vung-tau.js';
    const URL_BAC_LIEU = 'https://www.xoso.net/getkqxs/bac-lieu.js';
    const URL_DONG_NAI = 'https://www.xoso.net/getkqxs/dong-nai.js';
    const URL_CAN_THO = 'https://www.xoso.net/getkqxs/can-tho.js';
    const URL_SOC_TRANG = 'https://www.xoso.net/getkqxs/soc-trang.js';
    const URL_TAY_NINH = 'https://www.xoso.net/getkqxs/tay-ninh.js';
    const URL_AN_GIANG = 'https://www.xoso.net/getkqxs/an-giang.js';
    const URL_BINH_THUAN = 'https://www.xoso.net/getkqxs/binh-thuan.js';

    const URL_VINH_LONG = 'https://www.xoso.net/getkqxs/vinh-long.js';
    const URL_BINH_DUONG = 'https://www.xoso.net/getkqxs/binh-duong.js';
    const URL_TRA_VINH = 'https://www.xoso.net/getkqxs/tra-vinh.js';
    const URL_LONG_AN = 'https://www.xoso.net/getkqxs/long-an.js';
    const URL_HAU_GIANG = 'https://www.xoso.net/getkqxs/hau-giang.js';
    const URL_BINH_PHUOC = 'https://www.xoso.net/getkqxs/binh-phuoc.js';

    const URL_TIEN_GIANG = 'https://www.xoso.net/getkqxs/tien-giang.js';
    const URL_KIEN_GIANG = 'https://www.xoso.net/getkqxs/kien-giang.js';
    const URL_DA_LAT = 'https://www.xoso.net/getkqxs/da-lat.js';

    const NUMBER_HOURSE_XOSO_MIEN_NAM = 16;
    const NUMBER_HOURSE_XOSO_MIEN_TRUNG = 17;
    const NUMBER_HOURSE_XOSO_MIEN_BAC = 18;
    const NUMBER_MINUTE_XOSO_FROM = 15;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'config_website';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['setting'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'setting' => 'Setting',
        ];
    }

    /**
     * Lay url xo so theo thu
     */
    public static function getUrlXoSoFollowThu($date)
    {
        $date = date('N', strtotime($date)); // Kết quả: 1 (thứ Hai) đến 7 (Chủ nhật)
       
        switch($date) {
            case 1: // thu 2
                return [
                    [
                        'label' => 'Cà Mau',
                        'url' => self::URL_CA_MAU
                    ],
                    [
                        'label' => 'Hồ Chí Minh',
                        'url' => self::URL_TPHCM
                    ],
                    [
                        'label' => 'Đồng Tháp',
                        'url' => self::URL_DONG_THAP
                    ],
                ];
            case 2: // thu 3
                return [
                    [
                        'label' => 'Bạc Liêu',
                        'url' => self::URL_BAC_LIEU
                    ],
                    [
                        'label' => 'Bến Tre',
                        'url' => self::URL_BEN_TRE
                    ],
                    [
                        'label' => 'Vũng Tàu',
                        'url' => self::URL_VUNG_TAU
                    ],
                ];
            case 3: // thu 4
                return [
                    [
                        'label' => 'Cần Thơ',
                        'url' => self::URL_CAN_THO
                    ],
                    [
                        'label' => 'Sóc Trăng',
                        'url' => self::URL_SOC_TRANG
                    ],
                    [
                        'label' => 'Đồng Nai',
                        'url' => self::URL_DONG_NAI
                    ],
                ];
            case 4: // thu 5
                return [
                    [
                        'label' => 'An Giang',
                        'url' => self::URL_AN_GIANG
                    ],
                    [
                        'label' => 'Bình Thuận',
                        'url' => self::URL_BINH_THUAN
                    ],
                    [
                        'label' => 'Tây Ninh',
                        'url' => self::URL_TAY_NINH
                    ],
                ];
            case 5: // thu 6
                return [
                    [
                        'label' => 'Bình Dương',
                        'url' => self::URL_BINH_DUONG
                    ],
                    [
                        'label' => 'Trà Vinh',
                        'url' => self::URL_TRA_VINH
                    ],
                    [
                        'label' => 'Vĩnh Long',
                        'url' => self::URL_VINH_LONG
                    ],
                ];
            case 6: // thu 7
                return [
                    [
                        'label' => 'Bình Phước',
                        'url' => self::URL_BINH_PHUOC
                    ],
                    [
                        'label' => 'Hậu Giang',
                        'url' => self::URL_HAU_GIANG
                    ],
                    [
                        'label' => 'Long An',
                        'url' => self::URL_LONG_AN
                    ],
                    [
                        'label' => 'Hồ Chí Minh',
                        'url' => self::URL_TPHCM
                    ],
                ];
                case 7: // thu cn
                    return [
                        [
                            'label' => 'Kiên Giang',
                            'url' => self::URL_KIEN_GIANG
                        ],
                        [
                            'label' => 'Tiền Giang',
                            'url' => self::URL_TIEN_GIANG
                        ],
                        [
                            'label' => 'Đà Lạt',
                            'url' => self::URL_DA_LAT
                        ],
                    ];
        }
    }

    public static function analyticXoso($url)
    {
        $response = [
            'code' => 200,
            'data' => []
        ];


        $dataRaw  = file_get_contents($url);
        $giaidb = 'class=\"giaidb\">(.*)<\/td>.*<\/tr>';
        $giai1 = 'class=\"giai1\">(.*)<\/td>.*<\/tr>';
        $giai2 = 'class=\"giai2\">(.*)<\/td>.*<\/tr>';
        $giai3 = 'class=\"giai3\">(.*)<\/td>.*<\/tr>';
        $giai4 = 'class=\"giai4\">(.*)<\/td>.*<\/tr>';
        $giai5 = 'class=\"giai5\">(.*)<\/td>.*<\/tr>';
        $giai6 = 'class=\"giai6\">(.*)<\/td>.*<\/tr>';
        $giai7 = 'class=\"giai7\">(.*)<\/td>.*<\/tr>';
        $giai8 = 'class=\"giai8\">(.*)<\/td>.*<\/tr>';
        $preg = '/.*class=\"bkqtinhmiennam_mini\".*<tbody>.*' . $giaidb . '.*' 
        .$giai1.'.*'
        .$giai2.'.*'
        .$giai3.'.*'
        .$giai4.'.*'
        .$giai5.'.*'
        .$giai6.'.*'
        .$giai7.'.*'
        .$giai8.'.*<\/tbody>.*<\/table>.*/msi';
   //     echo $preg;exit;
        $dataAna = preg_match_all($preg, $dataRaw, $result);

        if (empty($result) || empty($result[1][0])) {
            $response['code'] = 400;
        } else {
            unset($result[0]);

            $result = array_values($result);
            $result = array_column($result, 0);
           
            foreach($result as $key => $value) {
                $value = trim($value);

                if (in_array($key, [3, 4, 6]) && !empty($value)) { // giai 3
                    $value = explode( '-', $value);
                }

                $response['data'][] = $value;
            }
        }
       
        return $response;
    }

    public static function checkTimeXoSoMienNam()
    {
        return date('H') == 16 &&  $dateMinu > 15 &&  $dateMinu < 35;
    }

    public static function checkTimeXoSoMienTrung()
    {
        return date('H') == 17 &&  $dateMinu > 15 &&  $dateMinu < 35;
    }

    public static function checkTimeXoSoMienBac()
    {
        return date('H') == 18 &&  $dateMinu > 15 &&  $dateMinu < 35;
    }
}
