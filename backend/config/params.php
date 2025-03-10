<?php
use frontend\models\ConfigPage;


return [
    'adminEmail' => 'admin@example.com',
    'menubarAdmin' => [
        'mn_manager_product' => [
            'name' => 'Quản lý sản phẩm',
            'link' => 'javascript:void(0)',
            'icon' => '<i class="site-menu-icon wb-layout" aria-hidden="true"></i>',
            'submenu' => [
                'submenu_1' => [
                    'name' => 'Thiết lập sản phẩm',
                    'link' => 'product/config'
                ],
                'submenu_2' => [
                    'name' => 'Danh sách sản phẩm',
                    'link' => 'product/index'
                ],
                'submenu_3' => [
                    'name' => 'Danh sách danh mục',
                    'link' => 'product-category/index'
                ],
            ]
        ],
        'mn_manager_register_template_form' => [
            'name' => 'Quản lý đăng ký template',
            'link' => 'javascript:void(0)',
            'icon' => '<i class="site-menu-icon wb-layout" aria-hidden="true"></i>',
            'submenu' => [
                'submenu_2' => [
                    'name' => 'Danh sách đăng ký',
                    'link' => 'register-template-form/index'
                ],
            ]
        ],
        'mn_manager_news' => [
            'name' => 'Quản lý tin tức',
            'link' => 'javascript:void(0)',
            'icon' => '<i class="site-menu-icon wb-layout" aria-hidden="true"></i>',
            'submenu' => [
                'submenu_1' => [
                    'name' => 'Thiết lập tin tức',
                    'link' => 'news/config'
                ],
                'submenu_2' => [
                    'name' => 'Danh sách tin tức',
                    'link' => 'news/index'
                ],
                'submenu_3' => [
                    'name' => 'Danh sách danh mục',
                    'link' => 'news-category/index'
                ]
            ]
        ],
        // 'mn_manager_single-page' => [
        //     'name' => 'Quản lý trang đơn',
        //     'link' => 'javascript:void(0)',
        //     'icon' => '<i class="site-menu-icon wb-layout" aria-hidden="true"></i>',
        //     'submenu' => [
        //         'submenu_1' => [
        //             'name' => 'Danh sách trang đơn',
        //             'link' => 'single-page/index'
        //         ],
        //     ]
        // ],
        // 'mn_manager_banner' => [
        //     'name' => 'Quản lý banner',
        //     'link' => 'javascript:void(0)',
        //     'icon' => '<i class="site-menu-icon wb-layout" aria-hidden="true"></i>',
        //     'submenu' => [
        //         'submenu_1' => [
        //             'name' => 'Danh sách',
        //             'link' => 'banner/index'
        //         ],
        //         'submenu_2' => [
        //             'name' => 'Danh sách danh mục',
        //             'link' => 'banner-category/index'
        //         ],
        //     ]
        // ],
        'mn_manager_template' => [

            'name' => 'Quản lý template',
            'link' => 'javascript:void(0)',
            'icon' => '<i class="site-menu-icon wb-layout" aria-hidden="true"></i>',
            'submenu' => [
                'submenu_1' => [
                    'name' => 'Thiết lập template',
                    'link' => 'template/config'
                ],
                'submenu_2' => [
                    'name' => 'Danh sách',
                    'link' => 'template/index'
                ],
                'submenu_3' => [
                    'name' => 'Danh sách danh mục',
                    'link' => 'template-category/index'
                ],
            ]
        ],
        'mn_manager_template_news' => [
            'name' => 'Quản lý mẫu bài viết',
            'link' => 'javascript:void(0)',
            'icon' => '<i class="site-menu-icon wb-layout" aria-hidden="true"></i>',
            'submenu' => [
                'submenu_1' => [
                    'name' => 'Danh sách mẫu bài viết',
                    'link' => 'template-news/index'
                ],
            ]
        ],
        // 'mn_manager_service' => [
        //     'name' => 'Quản lý dịch vụ',
        //     'link' => 'javascript:void(0)',
        //     'icon' => '<i class="site-menu-icon wb-layout" aria-hidden="true"></i>',
        //     'submenu' => [
        //         'submenu_1' => [
        //             'name' => 'Thiết lập dịch vụ',
        //             'link' => 'service/config'
        //         ],
        //         'submenu_1' => [
        //             'name' => 'Danh sách dịch vụ',
        //             'link' => 'service/index'
        //         ],
        //         'submenu_2' => [
        //             'name' => 'Danh sách danh mục',
        //             'link' => 'service-category/index'
        //         ],
        //     ]
        // ],
        // 'mn_manager_order' => [
        //     'name' => 'Quản lý đơn hàng',
        //     'link' => 'javascript:void(0)',
        //     'icon' => '<i class="site-menu-icon wb-layout" aria-hidden="true"></i>',
        //     'submenu' => [
        //         'submenu_1' => [
        //             'name' => 'Danh sách',
        //             'link' => 'bill/index'
        //         ],
        //     ]
        // ],
        // 'mn_manager_video' => [
        //     'name' => 'Quản lý video',
        //     'link' => 'javascript:void(0)',
        //     'icon' => '<i class="site-menu-icon wb-layout" aria-hidden="true"></i>',
        //     'submenu' => [
        //         'submenu_1' => [
        //             'name' => 'Thiết lập video',
        //             'link' => 'video/config'
        //         ],
        //         'submenu_2' => [
        //             'name' => 'Danh sách',
        //             'link' => 'video/index'
        //         ],
        //     ]
        // ],
        'mn_manager_custom' => [
            'name' => 'Quản lý giao diện',
            'link' => 'javascript:void(0)',
            'icon' => '<i class="site-menu-icon wb-layout" aria-hidden="true"></i>',
            'submenu' => [
                'submenu_1' => [
                    'name' => 'Tùy chỉnh giao diện',
                    'link' => 'custom/update'
                ],
                'submenu_2' => [
                    'name' => 'Thiết lập menu',
                    'link' => 'menu/update'
                ],
            ]
        ],
        'mn_manager_company' => [
            'name' => 'Quản lý website',
            'link' => 'javascript:void(0)',
            'icon' => '<i class="site-menu-icon wb-layout" aria-hidden="true"></i>',
            'submenu' => [
                'submenu_1' => [
                    'name' => 'Thiết lập website',
                    'link' => 'company/update'
                ],
            ]
        ],
        // 'mn_manager_language' => [
        //     'name' => 'Quản lý ngôn ngữ',
        //     'link' => 'javascript:void(0)',
        //     'icon' => '<i class="site-menu-icon wb-layout" aria-hidden="true"></i>',
        //     'submenu' => [
        //         'submenu_1' => [
        //             'name' => 'Tùy chĩnh ngôn ngữ',
        //             'link' => 'custom/custom-language'
        //         ],
        //     ]
        // ],
        // 'mn_manager_logs' => [
        //     'name' => 'Quản lý logs',
        //     'link' => 'javascript:void(0)',
        //     'icon' => '<i class="site-menu-icon wb-layout" aria-hidden="true"></i>',
        //     'submenu' => [
        //         'submenu_1' => [
        //             'name' => 'Danh sách',
        //             'link' => 'logs/index'
        //         ],
        //     ]
        // ]
    ],
    # tuy chinh giao dien
    'settingTemplate' => [
        'CUSTOM_IMAGE' => [
            'banner_home' =>[
                'name' => 'Banner home',
                'data' => 1,
                'type' => 'one',
                'note' => '',
                'limit' => 1
            ],
            'banner_review' =>[
                'name' => 'Banner đánh giá',
                'data' => 2,
                'note' => '',
                'limit' => 4
            ],
            'banner_brand' =>[
                'name' => 'Banner đối tác',
                'data' => 3,
                'note' => '',
                'limit' => 5
            ],
            'banner_ceo' =>[
                'name' => 'Banner CEO',
                'data' => 4,
                'note' => '',
                'type' => 'one',
                'limit' => 1
            ],
            'banner_brand' =>[
                'name' => 'Banner thành viên',
                'data' => 5,
                'note' => '',
                'limit' => 5
            ],
            'banner_adv_sidebar_1' => [
                'name' => 'Banner sidebar 1',
                'data' => 3,
                'type' => 'one',
                'note' => '',
                'limit' => 1
            ],
            'banner_adv_sidebar_2' => [
                'name' => 'Banner sidebar 2',
                'data' => 4,
                'type' => 'one',
                'note' => '',
                'limit' => 1
            ],
            'banner_adv_sidebar_3' => [
                'name' => 'Banner sidebar 3',
                'data' => 5,
                'type' => 'one',
                'note' => '',
                'limit' => 1
            ]

        ],
        // 'CUSTOM_SINGLE_PAGE' => [
        //     'one_about_home' =>[
        //         'name' => 'Trang đơn dưới banner home',
        //         'data' => 1,
        //         'note' => '',
        //         'limit' => 1
        //     ],
        //     'tree_middle_home' =>[
        //         'name' => '3 trang đơn giữa trang chủ',
        //         'data' => 2,
        //         'note' => '',
        //         'limit' => 3
        //     ],
        //     'footer_list_col_link_1' =>[
        //         'name' => 'Danh sách trang đơn footer cột liên kết 1',
        //         'data' => 3,
        //         'note' => '',
        //         'limit' => 5
        //     ],
        //     'footer_list_col_link_2' =>[
        //         'name' => 'Danh sách trang đơn footer cột liên kết 2',
        //         'data' => 4,
        //         'note' => '',
        //         'limit' => 5
        //     ],
        //     'one_page_about' =>[
        //         'name' => 'Trang giới thiệu',
        //         'data' => 1,
        //         'note' => '',
        //         'limit' => 1
        //     ],
        // ],
        'CUSTOM_NEWS_CATEGORY' => [
            'home_news_middle' =>[
                'name' => 'Danh sách tin tức nằm giữa trang chủ 1',
                'data' => 1,
                'note' => '',
                'limit' => 10
            ],
            'home_news_product_highlight' =>[
                'name' => 'Danh sách tin tức nằm giữa trang chủ 2',
                'data' => 2,
                'note' => '',
                'limit' => 15
            ],
            'home_news_slide_1' =>[
                'name' => 'Danh sách tin tức trang chủ slide 1',
                'data' => 3,
                'note' => '',
                'limit' => 6
            ],
            'home_news_slide_2' =>[
                'name' => 'Danh sách tin tức trang chủ slide 2',
                'data' => 4,
                'note' => '',
                'limit' => 6
            ],
        ],
    ],

    #menu website
    'menuDefault' => [
        [
            'name' => 'Trang chủ',
            'id' => 'mn_home',
            'module' => 'home',
            'link' => 'ourhome',
            'type' => ConfigPage::TYPE_HOME,
        ],
        // [
        //     'name' => 'Sản phẩm',
        //     'id' => 'mn_product',
        //     'module' => 'product',
        //     'link' => '/product/config',
        //     'type' => ConfigPage::TYPE_PRODUCT
        // ],
        [
            'name' => 'Tin tức',
            'id' => 'mn_news',
            'module' => 'news',
            'link' => 'news/config',
            'type' => ConfigPage::TYPE_NEWS
        ],
        // [
        //     'name' => 'Liên hệ',
        //     'id' => 'mn_contact',
        //     'module' => 'contact',
        //     'link' => 'javascrip:;',
        //     'type' => ConfigPage::TYPE_CONTACT
        // ],
        // [
        //     'name' => 'Thư viện hình ảnh',
        //     'id' => 'mn_gallery-image',
        //     'module' => 'gallery-image',
        //     'link' => 'gallery-image/config',
        //     'type' => ConfigPage::TYPE_GALLERY_IMAGE
        // ],
        // [
        //     'name' => 'Kho giao diện',
        //     'id' => 'mn_template',
        //     'module' => 'template',
        //     'link' => 'template/config',
        //     'type' => ConfigPage::TYPE_TEMPLATE
        // ],
        [
            'name' => 'Soi cầu',
            'id' => 'mn_soi_keo',
            'module' => 'news-soi-cau',
            'link' => 'javascrip:;',
            'type' => ConfigPage::TYPE_NEWS_SOI_KEO
         ],
    ],

    # setting language
    'settingLanguage' => [
        'home' => 'Trang chủ',
        'same_category' => 'Cùng chuyên mục',
        'read_a_lot' => 'Đọc nhiều',
        'video_relates' => 'Video liên quan',
        'mutex' => 'mutex',
        'contact' => 'Liên hệ',
        'see_more' => 'Xem thêm'
    ],
    'listLanguage' => [
        'vi' => [
            'default' => true,
            'icon' => 'images/vn.svg',
            'name' => 'VN',
        ],
//        'en' => [
//            'default' => false,
//            'icon' => 'images/uk.svg',
//            'name' => 'EN'
//        ]
    ],

];
