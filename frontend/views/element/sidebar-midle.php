<?php 
use frontend\models\ConfigWebsite;

$date = strtotime('-1 day', time());

$dataYesterday = ConfigWebsite::getUrlXoSoFollowThu(date('Y-m-d',$date));

foreach($dataYesterday as $key => $item) {
    $dataProvince = ConfigWebsite::getDataFollowProvince($item['province_type']);
    $dataYesterday[$key]['alias'] = $dataProvince['alias'];  
}

// Danh sach tỉnh miền trung xổ số ngày hôm trước
$dataYesterdayMienTrung = ConfigWebsite::getUrlXoSoFollowThuMienTrung(date('Y-m-d',$date));

foreach($dataYesterday as $key => $item) {
    $dataProvince = ConfigWebsite::getDataFollowProvince($item['province_type']);
    $dataYesterdayMienTrung[$key]['alias'] = $dataProvince['alias'];  
}

?>
<aside class="sidebar wg160">
    <div class="widget">
        <div class="widget-top">
            <h3><span class="title-cat">Xổ Số Hôm Qua</span></h3>
        </div>
        <div class="widget-container">
            <ul>
                <li class="list-item">
                    <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xsmb-xo-so-mien-bac">Miền Bắc</a>
                    </div>
                </li>
                        <li class="list-item">
            <div class="sms-text">»
                <a class="textlotoblue textnodecoration" href="/xoso-khanh-hoa">Khánh Hòa</a>
            </div>
        </li>
                <li class="list-item">
            <div class="sms-text">»
                <a class="textlotoblue textnodecoration" href="/xoso-kon-tum">Kon Tum</a>
            </div>
        </li>
                <li class="list-item">
            <div class="sms-text">»
                <a class="textlotoblue textnodecoration" href="/xoso-thua-thien-hue">ThừaThiênHuế</a>
            </div>
        </li>
        <?php foreach($dataYesterday as $item) { ?>
                                <li class="list-item">
            <div class="sms-text">»
                <a class="textlotoblue textnodecoration" href="/<?php echo $item['alias'] ?>">
                    <?php echo $item['label'] ?>
                </a>
            </div>
        </li>
        <?php } ?>
               
                    </ul>
        </div>
    </div>
    <div class="widget">
        <div class="widget-top">
            <h3><a href="/xsmb-xo-so-mien-bac" class="title-cat">Xổ số Miền Bắc</a></h3>
        </div>
        <div class="widget-container">
            <ul>			<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-mien-bac" title="">Xổ Số Miền Bắc</a>
                </div>
            </li>
		</ul>
        </div>
    </div>
    <div class="widget">
        <div class="widget-top">
            <h3><a href="" class="title-cat">Xổ số Miền Nam</a></h3>
        </div>
        <div class="widget-container">
            <ul>			<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-an-giang" title="">Xổ Số An Giang</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-binh-duong" title="">Xổ Số Bình Dương</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-binh-phuoc" title="">Xổ Số Bình Phước</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-binh-thuan" title="">Xổ Số Bình Thuận</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-bac-lieu" title="">Xổ Số Bạc Liêu</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-ben-tre" title="">Xổ Số Bến Tre</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-ca-mau" title="">Xổ Số Cà Mau</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-can-tho" title="">Xổ Số Cần Thơ</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-hau-giang" title="">Xổ Số Hậu Giang</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-ho-chi-minh" title="">Xổ Số Hồ Chí Minh</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-kien-giang" title="">Xổ Số Kiên Giang</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-long-an" title="">Xổ Số Long An</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-soc-trang" title="">Xổ Số Sóc Trăng</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-tien-giang" title="">Xổ Số Tiền Giang</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-tra-vinh" title="">Xổ Số Trà Vinh</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-tay-ninh" title="">Xổ Số Tây Ninh</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-vinh-long" title="">Xổ Số Vĩnh Long</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-vung-tau" title="">Xổ Số Vũng Tàu</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-da-lat" title="">Xổ Số Đà Lạt</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-dong-nai" title="">Xổ Số Đồng Nai</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-dong-thap" title="">Xổ Số Đồng Tháp</a>
                </div>
            </li>
		</ul>
        </div>
    </div>
    <div class="widget">
        <div class="widget-top">
            <h3><a href="/xsmt-xo-so-mien-trung" class="title-cat">Xổ số Miền Trung</a></h3>
        </div>
        <div class="widget-container">
            <ul>			<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-binh-dinh" title="">Xổ Số Bình Định</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-daklak" title="">Xổ Số DakLak</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-gia-lai" title="">Xổ Số Gia Lai</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-khanh-hoa" title="">Xổ Số Khánh Hòa</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-kon-tum" title="">Xổ Số Kon Tum</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-ninh-thuan" title="">Xổ Số Ninh Thuận</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-phu-yen" title="">Xổ Số Phú Yên</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-quang-binh" title="">Xổ Số Quảng Bình</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-quang-nam" title="">Xổ Số Quảng Nam</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-quang-ngai" title="">Xổ Số Quảng Ngãi</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-quang-tri" title="">Xổ Số Quảng Trị</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-thua-thien-hue" title="">Xổ Số ThừaThiênHuế</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-da-nang" title="">Xổ Số Đà Nẵng</a>
                </div>
            </li>
					<li class="list-item">
                <div class="sms-text">»
                    <a class="textlotoblue textnodecoration" href="/xoso-dac-nong" title="">Xổ Số Đắc Nông</a>
                </div>
            </li>
		</ul>
        </div>
    </div>
</aside>