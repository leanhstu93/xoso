<?php

namespace frontend\models;

use frontend\models\Base;
use Yii;
use common\components\MyHelpers;

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

    const URL_TPHCM = 'https://www.xoso.net/getkqxs/tp-hcm';
    const URL_SO_GAN_TPHCM = 'https://atrungroi.com/thong-ke-lo-gan-xshcm.html';

    const URL_DONG_THAP = 'https://www.xoso.net/getkqxs/dong-thap';
    const URL_SO_GAN_DONG_THAP = 'https://atrungroi.com/thong-ke-lo-gan-xsdt.html';

    const URL_CA_MAU = 'https://www.xoso.net/getkqxs/ca-mau';
    const URL_SO_GAN_CA_MAU = 'https://atrungroi.com/thong-ke-lo-gan-xscm.html';

    const URL_BEN_TRE = 'https://www.xoso.net/getkqxs/ben-tre';
    const URL_SO_GAN_BEN_TRE = 'https://atrungroi.com/thong-ke-lo-gan-xsbt.html';

    const URL_VUNG_TAU = 'https://www.xoso.net/getkqxs/vung-tau';
    const URL_SO_GAN_VUNG_TAU = 'https://atrungroi.com/thong-ke-lo-gan-xsvt.html';

    const URL_BAC_LIEU = 'https://www.xoso.net/getkqxs/bac-lieu';
    const URL_SO_GAN_BAC_LIEU = 'https://atrungroi.com/thong-ke-lo-gan-xsbl.html';

    const URL_DONG_NAI = 'https://www.xoso.net/getkqxs/dong-nai';
    const URL_SO_GAN_DONG_NAI = 'https://atrungroi.com/thong-ke-lo-gan-xsdn.html';

    const URL_CAN_THO = 'https://www.xoso.net/getkqxs/can-tho';
    const URL_SO_GAN_CAN_THO = 'https://atrungroi.com/thong-ke-lo-gan-xsct.html';

    const URL_SOC_TRANG = 'https://www.xoso.net/getkqxs/soc-trang';
    const URL_SO_GAN_SOC_TRANG = 'https://atrungroi.com/thong-ke-lo-gan-xsst.html';

    const URL_TAY_NINH = 'https://www.xoso.net/getkqxs/tay-ninh';
    const URL_SO_GAN_TAY_NINH = 'https://atrungroi.com/thong-ke-lo-gan-xstn.html';

    const URL_AN_GIANG = 'https://www.xoso.net/getkqxs/an-giang';
    const URL_SO_GAN_AN_GIANG = 'https://atrungroi.com/thong-ke-lo-gan-xsag.html';

    const URL_BINH_THUAN = 'https://www.xoso.net/getkqxs/binh-thuan';
    const URL_SO_GAN_BINH_THUAN = 'https://atrungroi.com/thong-ke-lo-gan-xsbth.html';

    const URL_VINH_LONG = 'https://www.xoso.net/getkqxs/vinh-long';
    const URL_SO_GAN_VINH_LONG = 'https://atrungroi.com/thong-ke-lo-gan-xsvl.html';

    const URL_BINH_DUONG = 'https://www.xoso.net/getkqxs/binh-duong';
    const URL_SO_GAN_BINH_DUONG = 'https://atrungroi.com/thong-ke-lo-gan-xsbd.html';

    const URL_TRA_VINH = 'https://www.xoso.net/getkqxs/tra-vinh';
    const URL_SO_GAN_TRA_VINH = 'https://atrungroi.com/thong-ke-lo-gan-xstv.html';

    const URL_LONG_AN = 'https://www.xoso.net/getkqxs/long-an';
    const URL_SO_GAN_LONG_AN = 'https://atrungroi.com/thong-ke-lo-gan-xsla.html';

    const URL_HAU_GIANG = 'https://www.xoso.net/getkqxs/hau-giang';
    const URL_SO_GAN_HAU_GIANG = 'https://atrungroi.com/thong-ke-lo-gan-xshg.html';

    const URL_BINH_PHUOC = 'https://www.xoso.net/getkqxs/binh-phuoc';
    const URL_SO_GAN_BINH_PHUOC = 'https://atrungroi.com/thong-ke-lo-gan-xsbp.html';

    const URL_TIEN_GIANG = 'https://www.xoso.net/getkqxs/tien-giang';
    const URL_SO_GAN_TIEN_GIANG = 'https://atrungroi.com/thong-ke-lo-gan-xstg.html';

    const URL_KIEN_GIANG = 'https://www.xoso.net/getkqxs/kien-giang';
    const URL_SO_GAN_KIEN_GIANG = 'https://atrungroi.com/thong-ke-lo-gan-xskg.html';

    const URL_DA_LAT = 'https://www.xoso.net/getkqxs/da-lat';
    const URL_SO_GAN_DA_LAT = 'https://atrungroi.com/thong-ke-lo-gan-xsdl.html';

    const URL_MIEN_BAC = 'https://www.xoso.net/getkqxs/mien-bac';
    const URL_SO_GAN_MIEN_BAC = 'https://atrungroi.com/thong-ke-lo-gan-xsmb.html';

    const URL_BINH_DINH = 'https://www.xoso.net/getkqxs/binh-dinh';
    const URL_SO_GAN_BINH_DINH = 'https://atrungroi.com/thong-ke-lo-gan-xsbdinh.html';

    const URL_DAK_LAK = 'https://www.xoso.net/getkqxs/dak-lak';
    const URL_SO_GAN_DAK_LAK = 'https://atrungroi.com/thong-ke-lo-gan-xsdlk.html';

    const URL_GIA_LAI = 'https://www.xoso.net/getkqxs/gia-lai';
    const URL_SO_GAN_GIA_LAI = 'https://atrungroi.com/thong-ke-lo-gan-xsgl.html';

    const URL_KHANH_HOA = 'https://www.xoso.net/getkqxs/khanh-hoa';
    const URL_SO_GAN_KHANH_HOA = 'https://atrungroi.com/thong-ke-lo-gan-xskh.html';

    const URL_KON_TUM = 'https://www.xoso.net/getkqxs/kon-tum';
    const URL_SO_GAN_KON_TUM = 'https://atrungroi.com/thong-ke-lo-gan-xs-kontum.html';

    const URL_NINH_THUAN = 'https://www.xoso.net/getkqxs/ninh-thuan';
    const URL_SO_GAN_NINH_THUAN = 'https://atrungroi.com/thong-ke-lo-gan-xsnt.html';

    const URL_PHU_YEN = 'https://www.xoso.net/getkqxs/phu-yen';
    const URL_SO_GAN_PHU_YEN = 'https://atrungroi.com/thong-ke-lo-gan-xspy.html';

    // todo check lai co dai quang ninh khong
    const URL_QUANG_NINH = 'https://www.xoso.net/getkqxs/quang-ninh';
    
    const URL_QUANG_NAM = 'https://www.xoso.net/getkqxs/quang-nam';
    const URL_SO_GAN_QUANG_NAM = 'https://atrungroi.com/thong-ke-lo-gan-xsqn.html';

    const URL_QUANG_BINH = 'https://www.xoso.net/getkqxs/quang-binh';
    const URL_SO_GAN_QUANG_BINH = 'https://atrungroi.com/thong-ke-lo-gan-xsqb.html';

    const URL_QUANG_TRI = 'https://www.xoso.net/getkqxs/quang-tri';
    const URL_SO_GAN_QUANG_TRI = 'https://atrungroi.com/thong-ke-lo-gan-xsqt.html';

    const URL_QUANG_NGAI = 'https://www.xoso.net/getkqxs/quang-ngai';
    const URL_SO_GAN_QUANG_NGAI = 'https://atrungroi.com/thong-ke-lo-gan-xsqng.html';

    const URL_THUA_THIEN_HUE = 'https://www.xoso.net/getkqxs/thua-thien-hue';
    const URL_SO_GAN_THUA_THIEN_HUE = 'https://atrungroi.com/thong-ke-lo-gan-xstth.html';

    const URL_DA_NANG = 'https://www.xoso.net/getkqxs/da-nang'; 
    const URL_SO_GAN_DA_NANG = 'https://atrungroi.com/thong-ke-lo-gan-xsdng.html';

    const URL_DAC_NONG = 'https://www.xoso.net/getkqxs/dak-nong';
    const URL_SO_GAN_DAC_NONG = 'https://atrungroi.com/thong-ke-lo-gan-xsdno.html';

    const NUMBER_HOURSE_XOSO_MIEN_NAM = 16;
    const NUMBER_HOURSE_XOSO_MIEN_TRUNG = 17;
    const NUMBER_HOURSE_XOSO_MIEN_BAC = 18;
    const NUMBER_MINUTE_XOSO_FROM = 15;

    const TYPE_PROVINCE_AN_GIANG = 1;
    const TYPE_PROVINCE_BINH_DUONG = 2;
    const TYPE_PROVINCE_BINH_PHUOC = 3;
    const TYPE_PROVINCE_BINH_THUAN = 4;
    const TYPE_PROVINCE_BAC_LIEU = 5;
    const TYPE_PROVINCE_BEN_TRE = 6;
    const TYPE_PROVINCE_CA_MAU = 7;
    const TYPE_PROVINCE_CAN_THO = 8;
    const TYPE_PROVINCE_HAU_GIANG = 9;
    const TYPE_PROVINCE_HO_CHI_MINH = 10;
    const TYPE_PROVINCE_KIEN_GIANG = 11;
    const TYPE_PROVINCE_LONG_AN = 12;
    const TYPE_PROVINCE_SOC_TRANG = 13;
    const TYPE_PROVINCE_TIEN_GIANG = 14;
    const TYPE_PROVINCE_TRA_VINH = 15;
    const TYPE_PROVINCE_TAY_NINH = 16;
    const TYPE_PROVINCE_VINH_LONG= 17;
    const TYPE_PROVINCE_VUNG_TAU = 18;
    const TYPE_PROVINCE_DA_LAT = 19;
    const TYPE_PROVINCE_DONG_NAI = 20;
    const TYPE_PROVINCE_DONG_THAP = 21;
    const TYPE_PROVINCE_MIEN_BAC = 22;

    const TYPE_PROVINCE_MIEN_TRUNG = 99;

    const TYPE_PROVINCE_BINH_DINH = 23;
    const TYPE_PROVINCE_DAK_LAK = 24;
    const TYPE_PROVINCE_GIA_LAI = 25;
    const TYPE_PROVINCE_KON_TUM = 26;
    const TYPE_PROVINCE_PHU_YEN = 27;
    const TYPE_PROVINCE_QUANG_NINH = 28;
    const TYPE_PROVINCE_QUANG_NAM = 29;
    const TYPE_PROVINCE_QUANG_NGAI = 30;
    const TYPE_PROVINCE_THUA_THIEN_HUE = 31;
    const TYPE_PROVINCE_DA_NANG = 32;
    const TYPE_PROVINCE_DAC_NONG = 33;
    const TYPE_PROVINCE_KHANH_HOA = 34;
    const TYPE_PROVINCE_NINH_THUAN = 35;
    const TYPE_PROVINCE_QUANG_BINH = 36;


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
    public static function getUrlXoSoFollowThuMienTrung($date)
    {
        $dateBefore = $date;
        $date = date('N', strtotime($date)); // Kết quả: 1 (thứ Hai) đến 7 (Chủ nhật)
        $txtDate = date('d-m-Y', strtotime($dateBefore));
     
        switch($date) {
            case 1: // thu 2
                return [
                    [
                        'label' => 'Phú Yên',
                        'province_type' => self::TYPE_PROVINCE_PHU_YEN,
                        'url' => self::URL_PHU_YEN .  '/' .  $txtDate . '.js'
                    ],
                    [
                        'label' => 'Thừa Thiên Huế',
                        'province_type' => self::TYPE_PROVINCE_THUA_THIEN_HUE,
                        'url' => self::URL_THUA_THIEN_HUE .  '/' .  $txtDate . '.js'
                    ]
                ];
            case 2: // thu 3
                return [
                    [
                        'label' => 'DakLak',
                        'province_type' => self::TYPE_PROVINCE_DAK_LAK,
                        'url' => self::URL_DAK_LAK .  '/' .  $txtDate . '.js'
                    ],
                    [
                        'label' => 'Quảng Nam',
                        'province_type' => self::TYPE_PROVINCE_QUANG_NAM,
                        'url' => self::URL_QUANG_NAM .  '/' .  $txtDate . '.js'
                    ]                   
                ];
            case 3: // thu 4
                return [
                    [
                        'label' => 'Khánh Hòa',
                        'province_type' => self::TYPE_PROVINCE_KHANH_HOA,
                        'url' => self::URL_KHANH_HOA .  '/' .  $txtDate . '.js'
                    ],
                    [
                        'label' => 'Đà Nẵng',
                        'province_type' => self::TYPE_PROVINCE_DA_NANG,
                        'url' => self::URL_DA_NANG .  '/' .  $txtDate . '.js'
                    ]
                ];
            case 4: // thu 5
                return [
                    [
                        'label' => 'Bình Định',
                        'province_type' => self::TYPE_PROVINCE_BINH_DINH,
                        'url' => self::URL_BINH_DINH .  '/' .  $txtDate . '.js'
                    ],
                    [
                        'label' => 'Quảng Bình',
                        'province_type' => self::TYPE_PROVINCE_QUANG_BINH,
                        'url' => self::URL_QUANG_BINH .  '/' .  $txtDate . '.js'
                    ], 
                    [
                        'label' => 'Quảng Trị',
                        'url' => self::URL_QUANG_TRI .  '/' .  $txtDate . '.js'
                    ],
                ];
            case 5: // thu 6
                return [
                    [
                        'label' => 'Gia Lai',
                        'province_type' => self::TYPE_PROVINCE_GIA_LAI,
                        'url' => self::URL_GIA_LAI .  '/' .  $txtDate . '.js'
                    ],
                    [
                        'label' => 'Ninh Thuận',
                        'province_type' => self::TYPE_PROVINCE_NINH_THUAN,
                        'url' => self::URL_NINH_THUAN .  '/' .  $txtDate . '.js'
                    ]
                ];
            case 6: // thu 7
                return [
                    [
                        'label' => 'Quảng Ngãi',
                       'province_type' => self::TYPE_PROVINCE_QUANG_NGAI, 
                        'url' => self::URL_QUANG_NGAI   .  '/' .  $txtDate . '.js'
                    ],
                    [
                        'label' => 'Đà Nẵng',
                        'province_type' => self::TYPE_PROVINCE_DA_NANG,
                        'url' => self::URL_DA_NANG   .  '/' .  $txtDate . '.js'
                    ],
                    [
                        'label' => 'Đắc Nông',
                        'province_type' => self::TYPE_PROVINCE_DAC_NONG,
                        'url' => self::URL_DAC_NONG .  '/' .  $txtDate . '.js'
                    ]
                ];
                case 7: // thu cn
                    return [
                        [
                            'label' => 'Khánh Hòa',
                            'province_type' => self::TYPE_PROVINCE_KHANH_HOA,
                            'url' => self::URL_KHANH_HOA .  '/' .  $txtDate . '.js'
                        ],
                        [
                            'label' => 'Kon Tum',
                            'province_type' => self::TYPE_PROVINCE_KON_TUM,
                            'url' => self::URL_KON_TUM .  '/' .  $txtDate . '.js'
                        ],
                        [
                            'label' => 'Thừa Thiên Huế',
                            'province_type' => self::TYPE_PROVINCE_THUA_THIEN_HUE,
                            'url' => self::URL_THUA_THIEN_HUE .  '/' .  $txtDate . '.js'
                        ],
                    ];
        }
    }

    public static function getWeekday($date)
    {
        $weekdays = [
            'Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'
        ];

        $dayIndex = date('w', $date); // Lấy số thứ trong tuần (0: Chủ Nhật, 1: Thứ Hai, ..., 6: Thứ Bảy)
        
        return $weekdays[$dayIndex];
    }

     /**
     * Lay url xo so theo thu
     */
    public static function getUrlXoSoFollowThu($date)
    {
        $dateBefore = $date;
        $date = date('N', strtotime($date)); // Kết quả: 1 (thứ Hai) đến 7 (Chủ nhật)
        $txtDate = date('d-m-Y', strtotime($dateBefore));
     
        switch($date) {
            case 1: // thu 2
                return [
                    [
                        'label' => 'Cà Mau',
                        'province_type' => self::TYPE_PROVINCE_CA_MAU,
                        'url' => self::URL_CA_MAU .  '/' .  $txtDate . '.js'
                    ],
                    [
                        'label' => 'Hồ Chí Minh',
                        'province_type' => self::TYPE_PROVINCE_HO_CHI_MINH,
                        'url' => self::URL_TPHCM .  '/' .  $txtDate . '.js'
                    ],

                    [
                        'label' => 'Đồng Tháp',
                        'province_type' => self::TYPE_PROVINCE_DONG_THAP,
                        'url' => self::URL_DONG_THAP .  '/' .  $txtDate . '.js'
                    ],
                ];
            case 2: // thu 3
                return [
                    [
                        'label' => 'Bạc Liêu',
                        'province_type' => self::TYPE_PROVINCE_BAC_LIEU,
                        'url' => self::URL_BAC_LIEU .  '/' .  $txtDate . '.js'
                    ],
                    [
                        'label' => 'Bến Tre',
                        'province_type' => self::TYPE_PROVINCE_BEN_TRE,
                        'url' => self::URL_BEN_TRE .  '/' .  $txtDate . '.js'
                    ],
                    [
                        'label' => 'Vũng Tàu',
                        'province_type' => self::TYPE_PROVINCE_VUNG_TAU,
                        'url' => self::URL_VUNG_TAU .  '/' .  $txtDate . '.js'
                    ],
                ];
            case 3: // thu 4
                return [
                    [
                        'label' => 'Cần Thơ',
                        'province_type' => self::TYPE_PROVINCE_CAN_THO,
                        'url' => self::URL_CAN_THO .  '/' .  $txtDate . '.js'
                    ],
                    [
                        'label' => 'Sóc Trăng',
                        'province_type' => self::TYPE_PROVINCE_SOC_TRANG,
                        'url' => self::URL_SOC_TRANG .  '/' .  $txtDate . '.js'
                    ],
                    [
                        'label' => 'Đồng Nai',
                        'province_type' => self::TYPE_PROVINCE_DONG_NAI,
                        'url' => self::URL_DONG_NAI .  '/' .  $txtDate . '.js'
                    ],
                ];
            case 4: // thu 5
                return [
                    [
                        'label' => 'An Giang',
                        'province_type' => self::TYPE_PROVINCE_AN_GIANG,
                        'url' => self::URL_AN_GIANG .  '/' .  $txtDate . '.js'
                    ],
                    [
                        'label' => 'Bình Thuận',
                        'province_type' => self::TYPE_PROVINCE_BINH_THUAN,
                        'url' => self::URL_BINH_THUAN .  '/' .  $txtDate . '.js'
                    ], 
                    [
                        'label' => 'Tây Ninh',
                        'province_type' => self::TYPE_PROVINCE_TAY_NINH,
                        'url' => self::URL_TAY_NINH .  '/' .  $txtDate . '.js'
                    ],
                ];
            case 5: // thu 6
                return [
                    [
                        'label' => 'Bình Dương',
                        'province_type' => self::TYPE_PROVINCE_BINH_DUONG,
                        'url' => self::URL_BINH_DUONG .  '/' .  $txtDate . '.js'
                    ],
                    [
                        'label' => 'Trà Vinh',
                        'province_type' => self::TYPE_PROVINCE_TRA_VINH,
                        'url' => self::URL_TRA_VINH .  '/' .  $txtDate . '.js'
                    ],
                    [
                        'label' => 'Vĩnh Long',
                        'province_type' => self::TYPE_PROVINCE_VINH_LONG,
                        'url' => self::URL_VINH_LONG .  '/' .  $txtDate . '.js'
                    ],
                ];
            case 6: // thu 7
                return [
                    [
                        'label' => 'Bình Phước',
                        'province_type' => self::TYPE_PROVINCE_BINH_PHUOC,
                        'url' => self::URL_BINH_PHUOC   .  '/' .  $txtDate . '.js'
                    ],
                    [
                        'label' => 'Hậu Giang',
                        'province_type' => self::TYPE_PROVINCE_HAU_GIANG,
                        'url' => self::URL_HAU_GIANG   .  '/' .  $txtDate . '.js'
                    ],
                    [
                        'label' => 'Long An',
                        'province_type' => self::TYPE_PROVINCE_LONG_AN,
                        'url' => self::URL_LONG_AN .  '/' .  $txtDate . '.js'
                    ],
                    [
                        'label' => 'Hồ Chí Minh',
                        'province_type' => self::TYPE_PROVINCE_HO_CHI_MINH,
                        'url' => self::URL_TPHCM .  '/' .  $txtDate . '.js'
                    ],
                ];
                case 7: // thu cn
                    return [
                        [
                            'label' => 'Kiên Giang',
                            'province_type' => self::TYPE_PROVINCE_KIEN_GIANG,
                            'url' => self::URL_KIEN_GIANG .  '/' .  $txtDate . '.js'
                        ],
                        [
                            'label' => 'Tiền Giang',
                            'province_type' => self::TYPE_PROVINCE_TIEN_GIANG,
                            'url' => self::URL_TIEN_GIANG .  '/' .  $txtDate . '.js'
                        ],
                        [
                            'label' => 'Đà Lạt',
                            'province_type' => self::TYPE_PROVINCE_DA_LAT,
                            'url' => self::URL_DA_LAT .  '/' .  $txtDate . '.js'
                        ],
                    ];
        }
    }

    public static function getDataFollowProvince($type =0)
    {
        $list = [
            self::TYPE_PROVINCE_AN_GIANG => [
                'label' => 'An Giang',
                'alias' => 'an-giang',
                'mien_type' => self::TYPE_MIEN_NAM,
                'step' => 7,
                'url' => self::URL_AN_GIANG,
                'url_so_gan' => self::URL_SO_GAN_AN_GIANG
            ],
            self::TYPE_PROVINCE_BINH_DUONG => [
                'mien_type' => self::TYPE_MIEN_NAM,
                'label' => 'Bình Dương',
                'alias' => 'binh-duong',
                'step' => 7,
                'url' => self::URL_BINH_DUONG,
                'url_so_gan' => self::URL_SO_GAN_BINH_DUONG
            ],
            self::TYPE_PROVINCE_BINH_PHUOC => [
                'mien_type' => self::TYPE_MIEN_NAM,
                'label' => 'Bình Phước ',
                'alias' => 'binh-phuoc',
                'url' => self::URL_BINH_PHUOC,
                'url_so_gan' => self::URL_SO_GAN_BINH_PHUOC,
                'step' => 7
            ],
            self::TYPE_PROVINCE_BINH_THUAN => [
                'mien_type' => self::TYPE_MIEN_NAM,
                'label' => 'Bình Thuận',
                'alias' => 'binh-thuan',
                'url' => self::URL_BINH_THUAN,
                'url_so_gan' => self::URL_SO_GAN_BINH_THUAN,
                'step' => 7
            ],
            self::TYPE_PROVINCE_BAC_LIEU => [
                'mien_type' => self::TYPE_MIEN_NAM,
                'label' => 'Bạc Liêu',
                'alias' => 'bac-lieu',
                'url' => self::URL_BAC_LIEU,
                'url_so_gan' => self::URL_SO_GAN_BAC_LIEU,
                'step' => 7
            ],
            self::TYPE_PROVINCE_BEN_TRE => [
                'mien_type' => self::TYPE_MIEN_NAM,
                'label' => 'Bến Tre',
                'alias' => 'ben-tre',
                'url' => self::URL_BEN_TRE,
                'url_so_gan' => self::URL_SO_GAN_BEN_TRE,
                'step' => 7
            ],
            self::TYPE_PROVINCE_CA_MAU => [
                'mien_type' => self::TYPE_MIEN_NAM,
                'label' => 'Cà Mau',
                'alias' => 'ca-mau',
                'url' => self::URL_CA_MAU,
                'url_so_gan' => self::URL_SO_GAN_CA_MAU,
                'step' => 7
            ],
            self::TYPE_PROVINCE_CAN_THO => [
                'mien_type' => self::TYPE_MIEN_NAM,
                'label' => 'Cần Thơ',
                'alias' => 'can-tho',
                'url' => self::URL_CAN_THO,
                'url_so_gan' => self::URL_SO_GAN_CAN_THO,
                'step' => 7
            ],
            self::TYPE_PROVINCE_HAU_GIANG => [
                'mien_type' => self::TYPE_MIEN_NAM,
                'label' => 'Hậu Giang',
                'alias' => 'hau-giang',
                'url' => self::URL_HAU_GIANG,
                'url_so_gan' => self::URL_SO_GAN_HAU_GIANG,
                'step' => 7
            ],
            self::TYPE_PROVINCE_HO_CHI_MINH => [
                'mien_type' => self::TYPE_MIEN_NAM,
                'label' => 'Hồ Chí Minh',
                'alias' => 'ho-chi-minh',
                'url' => self::URL_TPHCM,
                'url_so_gan' => self::URL_SO_GAN_TPHCM,
                'step' => 7
            ],
            self::TYPE_PROVINCE_KIEN_GIANG => [
                'mien_type' => self::TYPE_MIEN_NAM,
                'label' => 'Kiên Giang',
                'alias' => 'kien-giang',
                'url' => self::URL_KIEN_GIANG,
                'url_so_gan' => self::URL_SO_GAN_KIEN_GIANG,
                'step' => 7
            ],
            self::TYPE_PROVINCE_LONG_AN => [
                'mien_type' => self::TYPE_MIEN_NAM,
                'label' => 'Long An',
                'alias' => 'long-an',
                'url' => self::URL_LONG_AN,
                'url_so_gan' => self::URL_SO_GAN_LONG_AN,
                'step' => 7
            ],
            self::TYPE_PROVINCE_SOC_TRANG => [
                'mien_type' => self::TYPE_MIEN_NAM,
                'label' => 'Sóc Trăng',
                'alias' => 'soc-trang',
                'url' => self::URL_SOC_TRANG,
                'url_so_gan' => self::URL_SO_GAN_SOC_TRANG,
                'step' => 7
            ],
            self::TYPE_PROVINCE_TIEN_GIANG => [
                'mien_type' => self::TYPE_MIEN_NAM,
                'label' => 'Tiền Giang',
                'alias' => 'tien-giang',
                'url' => self::URL_TIEN_GIANG,
                'url_so_gan' => self::URL_SO_GAN_TIEN_GIANG,
                'step' => 7
            ],
            self::TYPE_PROVINCE_TRA_VINH => [
                'mien_type' => self::TYPE_MIEN_NAM,
                'label' => 'Trà Vinh',
                'alias' => 'tra-vinh',
                'url' => self::URL_TRA_VINH,
                'url_so_gan' => self::URL_SO_GAN_TRA_VINH,
                'step' => 7
            ],
            self::TYPE_PROVINCE_TAY_NINH => [
                'mien_type' => self::TYPE_MIEN_NAM,
                'label' => 'Tây Ninh',
                'alias' => 'tay-nonhg',
                'url' => self::URL_TAY_NINH,
                'url_so_gan' => self::URL_SO_GAN_TAY_NINH,
                'step' => 7
            ],
            self::TYPE_PROVINCE_VINH_LONG => [
                'mien_type' => self::TYPE_MIEN_NAM,
                'label' => 'Vĩnh Long',
                'alias' => 'vinh-long',
                'url' => self::URL_VINH_LONG,
                'url_so_gan' => self::URL_SO_GAN_VINH_LONG,
                'step' => 7
            ],
            self::TYPE_PROVINCE_VUNG_TAU => [
                'mien_type' => self::TYPE_MIEN_NAM,
                'label' => 'Vũng Tàu',
                'alias' => 'vung-tau',
                'url' => self::URL_VUNG_TAU,
                'url_so_gan' => self::URL_SO_GAN_VUNG_TAU,
                'step' => 7
            ],
            self::TYPE_PROVINCE_DA_LAT => [
                'mien_type' => self::TYPE_MIEN_NAM,
                'label' => 'Đà Lạt',
                'alias' => 'da-lat',
                'url' => self::URL_DA_LAT,
                'url_so_gan' => self::URL_SO_GAN_DA_LAT,
                'step' => 7
            ],
            self::TYPE_PROVINCE_DONG_NAI => [
                'mien_type' => self::TYPE_MIEN_NAM,
                'label' => 'Đồng Nai',
                'alias' => 'dong-nai',
                'url' => self::URL_DONG_NAI,
                'url_so_gan' => self::URL_SO_GAN_DONG_NAI,
                'step' => 7
            ],
            self::TYPE_PROVINCE_DONG_THAP => [
                'mien_type' => self::TYPE_MIEN_NAM,
                'label' => 'Đồng Tháp',
                'alias' => 'dong-thap',
                'url' => self::URL_DONG_THAP,
                'url_so_gan' => self::URL_SO_GAN_DONG_THAP,
                'step' => 7
            ],
            self::TYPE_PROVINCE_MIEN_BAC => [
                'mien_type' => self::TYPE_MIEN_BAC,
                'label' => 'Miền Bắc',
                'alias' => 'mien-bac',
                'url' => self::URL_MIEN_BAC,
                'url_so_gan' => self::URL_SO_GAN_MIEN_BAC,
                'step' => 1
            ],
            self::TYPE_PROVINCE_BINH_DINH => [
                'mien_type' => self::TYPE_MIEN_TRUNG,
                'label' => 'Bình Định',
                'alias' => 'binh-dinh',
                'url' => self::URL_BINH_DINH,
                'url_so_gan' => self::URL_SO_GAN_BINH_DINH,
                'step' => 1
            ],
            self::TYPE_PROVINCE_DAK_LAK => [
                'label' => 'Đắk Lắk',
                'mien_type' => self::TYPE_MIEN_TRUNG,
                'alias' => 'dak-lak',
                'url' => self::URL_DAK_LAK,
                'url_so_gan' => self::URL_SO_GAN_DAK_LAK,
                'step' => 1
            ],
            self::TYPE_PROVINCE_GIA_LAI => [
                'mien_type' => self::TYPE_MIEN_TRUNG,
                'label' => 'Gia Lai',
                'alias' => 'gia-lai',
                'url' => self::URL_GIA_LAI,
                'url_so_gan' => self::URL_SO_GAN_GIA_LAI,
                'step' => 1
            ],
            self::TYPE_PROVINCE_KHANH_HOA => [
                'mien_type' => self::TYPE_MIEN_TRUNG,
                'label' => 'Khánh Hoà',
                'alias' => 'khanh-hoa',
                'url' => self::URL_KHANH_HOA,
                'url_so_gan' => self::URL_SO_GAN_KHANH_HOA,
                'step' => 1
            ],
            self::TYPE_PROVINCE_KON_TUM => [
                'mien_type' => self::TYPE_MIEN_TRUNG,
                'label' => 'Kon Tum',
                'alias' => 'kon-tum',
                'url' => self::URL_KON_TUM,
                'url_so_gan' => self::URL_SO_GAN_KON_TUM,
                'step' => 1
            ],
            self::TYPE_PROVINCE_NINH_THUAN => [
                'mien_type' => self::TYPE_MIEN_TRUNG,
                'label' => 'Ninh Thuận',
                'alias' => 'ninh-thuan',
                'url' => self::URL_NINH_THUAN,
                'url_so_gan' => self::URL_SO_GAN_NINH_THUAN,
                'step' => 1
            ],
            self::TYPE_PROVINCE_PHU_YEN => [
                'mien_type' => self::TYPE_MIEN_TRUNG,
                'label' => 'Phú Yên',
                'alias' => 'phu-yen',
                'url' => self::URL_PHU_YEN,
                'url_so_gan' => self::URL_SO_GAN_PHU_YEN,
                'step' => 1
            ],
            self::TYPE_PROVINCE_QUANG_NINH => [
                'mien_type' => self::TYPE_MIEN_TRUNG,
                'label' => 'Quảng Ninh',
                'alias' => 'quang-ninh',
                'url' => self::URL_QUANG_NINH,
                'url_so_gan' => self::URL_SO_GAN_QUANG_NINH,
                'step' => 1
            ],
            self::TYPE_PROVINCE_QUANG_NAM => [
                'mien_type' => self::TYPE_MIEN_TRUNG,
                'label' => 'Quảng Nam',
                'alias' => 'quang-nam',
                'url' => self::URL_QUANG_NAM,
                'url_so_gan' => self::URL_SO_GAN_QUANG_NAM,
                'step' => 1
            ],
            self::TYPE_PROVINCE_QUANG_NGAI => [
                'mien_type' => self::TYPE_MIEN_TRUNG,
                'label' => 'Quảng Ngải',
                'alias' => 'quang-ngai',
                'url' => self::URL_QUANG_NGAI,
                'url_so_gan' => self::URL_SO_GAN_QUANG_NGAI,
                'step' => 1
            ],
            self::TYPE_PROVINCE_THUA_THIEN_HUE => [
                'mien_type' => self::TYPE_MIEN_TRUNG,
                'label' => 'Thừa Thiên Huế',
                'alias' => 'thua-thien-hue',
                'url' => self::URL_THUA_THIEN_HUE,
                'url_so_gan' => self::URL_SO_GAN_THUA_THIEN_HUE,
                'step' => 1
            ],
            self::TYPE_PROVINCE_DA_NANG => [
                'mien_type' => self::TYPE_MIEN_TRUNG,
                'label' => 'Đà Nẳng',
                'alias' => 'da-nang',
                'url' => self::URL_DA_NANG,
                'url_so_gan' => self::URL_SO_GAN_DA_NANG,
                'step' => 1
            ],
            self::TYPE_PROVINCE_DAC_NONG => [
                'mien_type' => self::TYPE_MIEN_TRUNG,
                'label' => 'Đắk Nông',
                'alias' => 'dac-nong',
                'url' => self::URL_DAC_NONG,
                'url_so_gan' => self::URL_SO_GAN_DAC_NONG,
                'step' => 1
            ],
            self::TYPE_PROVINCE_QUANG_BINH => [
                'mien_type' => self::TYPE_MIEN_TRUNG,
                'label' => 'Quảng Bình',
                'alias' => 'quang-binh',
                'url' => self::URL_QUANG_BINH,
                'url_so_gan' => self::URL_SO_GAN_QUANG_BINH,
                'step' => 7
            ],
            
        ];

        if ($type == 0) {
            return $list;
        }

        return $list[$type];
    }

    public static function analyticXoso($url)
    {
        $dataCache = static::readCacheXoSo($url);

        if (!empty($dataCache)) {
            return json_decode($dataCache, true);
        }

        $response = [
            'code' => 200,
            'data' => []
        ];

        $class =  'bkqtinhmiennam_mini';

        if (strpos($url, 'mien-bac')!== false) {
            $class =  'bkqtinhmienbac_mini';
            
        }
      
        $dataRaw = MyHelpers::sendMessage($url);
       
      
        //$dataRaw  = file_get_contents($url, false, $arrContextOptions);
        
        $giaidb = 'class=\"giaidb\">(.*)<\/td>.*<\/tr>';
        $giai1 = 'class=\"giai1\">(.*)<\/td>.*<\/tr>';
        $giai2 = 'class=\"giai2\">(.*)<\/td>.*<\/tr>';
        $giai3 = 'class=\"giai3\">(.*)<\/td>.*<\/tr>';
        $giai4 = 'class=\"giai4\">(.*)<\/td>.*<\/tr>';
        $giai5 = 'class=\"giai5\">(.*)<\/td>.*<\/tr>';
        $giai6 = 'class=\"giai6\">(.*)<\/td>.*<\/tr>';
        $giai7 = 'class=\"giai7\">(.*)<\/td>.*<\/tr>';
        $giai8 = 'class=\"giai8\">(.*)<\/td>.*<\/tr>';
        if (strpos($url, 'mien-bac')!== false) {
            $giai8 = '';
            
        }
        $preg = '/.*class=\"'. $class.'\".*<tbody>.*' . $giaidb . '.*' 
        .$giai1.'.*'
        .$giai2.'.*'
        .$giai3.'.*'
        .$giai4.'.*'
        .$giai5.'.*'
        .$giai6.'.*'
        .$giai7.'.*'
        .$giai8.'.*<\/tbody>.*<\/table>.*/msi';

        $dataAna = preg_match_all($preg, $dataRaw, $result);
       // debug($dataRaw);
        // debug($dataAna);
        if (empty($result) || empty($result[1][0])) {
            $response['code'] = 400;
        } else {
            unset($result[0]);

            $result = array_values($result);
            $result = array_column($result, 0);
           
            foreach($result as $key => $value) {
                $value = trim($value);
                $listGiai = [3, 4, 6];
                if (strpos($url, 'mien-bac')!== false) {
                    $listGiai = [2,3, 4,5, 6,7];
                }

                if (in_array($key,$listGiai ) && !empty($value)) { // giai 3
                    $value = explode( '-', $value);
                }

                $response['data'][] = $value;
            }
        }
       
        if ($response['code'] == 200) {
            static::saveCacheDataXoSo($url, json_encode($response));
        }

        return $response;
    }

    private static function saveCacheDataXoSo($url, $content)
    {
        $arrUrl = explode("/", $url);
        $fileName = array_pop($arrUrl);
        $folder = array_pop($arrUrl);

        return MyHelpers::saveToFile($folder, $fileName, $content);
    }

    private static function readCacheXoSo($url) 
    {
        $arrUrl = explode("/", $url);
        $fileName = array_pop($arrUrl);
        $folder = array_pop($arrUrl);

        return MyHelpers::readFileContent($folder, $fileName);
    }

    public static function checkTimeXoSoMienNam()
    {
        return date('H') == 16 &&  date('i') > 15 &&  date('i') < 35;
    }

    public static function checkTimeXoSoMienTrung()
    {
        return date('H') == 17 &&  date('i') > 15 && date('i') < 35;
    }

    public static function checkTimeXoSoMienBac()
    {
        return date('H') == 18 &&  date('i') > 15 &&  date('i') < 35;
    }

    /**
     * Kiểm tra đến thời gian đã xổ số chưa
     */
    public static function checkTimeXoSo($type)
    {   
        if ($type == self::TYPE_MIEN_BAC) {
            return date('H') > 18 || (date('H') == 18 && date('i') > 35);
        } elseif ($type == self::TYPE_MIEN_TRUNG) {
            return date('H') > 17 || (date('H') == 17 && date('i') > 35);
        }if ($type == self::TYPE_MIEN_NAM) {
            return date('H') > 16 || (date('H') == 16 && date('i') > 35);
        }
    }

    /**
     * Lấy ngày xổ số mới nhất
     */
    public static function getDateXoSoLastFromUrl($url)
    {
       // debug($url);
        $arrContextOptions= stream_context_create(array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        ));  
        $dataRaw = MyHelpers::sendMessage($url);
        //$dataRaw  = file_get_contents($url, false, $arrContextOptions);
      
        $preg = '/.*id=\"box_kqxs_ngay\".*<option value=\"(.*)\" selected=\"selected\".*/msi';

        $dataAna = preg_match_all($preg, $dataRaw, $result);
        
        $date = \DateTime::createFromFormat('d-m-Y', $result[1][0]);
        $timestamp = 0;
        if (!empty($date)) {
            $timestamp = $date->getTimestamp();
        }
        
        return $timestamp;
    }

    /**
     * Dữ liêu đầu vào là mãng kqxs se xử lý  chuyển đổi thành loto
     * @param $data mãng kqxs
     * @type loại đầu | đuôi
     */
    public static function processingLoTo($data, $type = 'dau')
    {
        $result = [];

        for ($i=0; $i<= 9; $i++) {
            $result[$i] = '';
            foreach ($data as $value) {
                $value = strrev(trim($value));
                
                if ($type == 'dau' && $value[1] == $i) {
                    $result[$i] .= ($value[0] . ';');
                } else if ($type == 'duoi' && $value[0] == $i) {
                    $result[$i] .= $value[1] . ';';
                }
            }

            $result[$i] = trim($result[$i], ';');
        }
        
        return  $result;
    }

    /**
     * $param url https://atrungroi.com/thong-ke-lo-gan-xsag.html
     */
    public static function getContentLoGan($url)
    {
        $content = '';
        $dataRaw = MyHelpers::sendMessage($url);

        $preg = "/.*main.*Bảng thống kê 10 con lô gan.*<table(.*)<\/table>.*Bảng thống kê 10 cặp lô khan .*main.*/msi";
        $dataAna = preg_match_all($preg, $dataRaw, $result);

        if (!empty($result[1][0])) {
            $content = "<table". $result[1][0]."</table>";    
        }

       return $content;
    }
}
