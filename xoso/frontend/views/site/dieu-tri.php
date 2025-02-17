<section class="wrapper-banner w100">
    <?php

    use frontend\models\Banner;

    $banner = Banner::getDataByCustomSetting('banner_diagnose');

    if (!empty($banner->images->image)) {
        ?>
        <img src="/<?php echo $banner->images->image ?>" class="w100">
    <?php } ?>
</section>
<section class="wrapper-sympton-when-sleep wrapper-banner-cpap w100 wrapper-dieu-tri-ngung-tho ">
    <div class="w1000">
        <div class="wrapper-bg w100">
            <div class="content-section">
                <div class="left">
                    <div class="title-section">
                        “ĐIỀU TRỊ NGƯNG THỞ KHI NGỦ”
                    </div>
                    <p>
                        Sau khi làm chẩn đoán “Ngưng Thở Khi Ngủ”, dựa vào chỉ số ngưng giảm thở khi ngủ (AHI_ Apnea-Hypopnea Index) sẽ xác định được bạn có bị “ngưng thở khi ngủ hay không”
                    </p>
                    <div class="wrapper-btn js__call-modal">
                        <a>
                            Click làm bài đánh giá sức khỏe bạn
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="wrapper-aih-muc-do w100">
    <div class="w1000">
        <div class="content-section w100">
            <div class="wrapper-desc">
                Sau khi chẩn đoán, chỉ số quan trọng để đánh giá là AHI (Apnea Hypoapnea Index). AHI là số lần ngưng thở và giảm thở trung bình mỗi giờ ngủ.
            </div>
            <img src="/images/dieu-tri/hinh anh web-43.png" class="w100">

            <div class="wrapper-table">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>
                                <strong>
                                    Thay đổi hành vi:
                                </strong> </br>
                                - Tránh nằm ngửa khi ngủ.
                                - Giảm cân.
                                - Tránh hút thuốc, uống rượu bia, thuốc ngủ.
                            </td>
                            <td>
                                <strong>
                                    Không tốn
                                    chi phí
                                </strong>
                            </td>
                            <td>
                                <strong>
                                    Hiệu quả không
                                    cao, khó tuân thủ.
                                </strong>
                            </td>
                        </tr>
                    <tr>
                        <td>
                            <strong>
                                Dụng cụ răng hàm:
                            </strong></br>
                            Khi ngủ sẽ đeo dụng cụ đẩy hàm dưới ra trước
                        </td>
                        <td>
                            Chi phí thấp
                        </td>
                        <td>
                            Gây đau và tổn thương
                            hàm, khó ngủ
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                Phẩu thuật:
                            </strong></br>
                            Cắt và sửa những mô mêm bất thường,
                            tạo hình lưỡi gà - khẩu cái mềm - hầu.
                        </td>
                        <td>
                            Hiệu quả nhanh
                            ngay sau khi
                            phẩu thuật
                        </td>
                        <td>
                            Chi phí cao hiệu quả
                            đạt 60% - 80% có
                            thể tái phát lại
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                Thở máy Cpap:
                            </strong></br>
                            Máy di trì luồng khí thổi và đường hô hấp,
                            giúp đường hô hấp luôn mổ thông suốt.
                        </td>
                        <td>
                            Hiệu quả nhanh
                            không gây đau
                        </td>
                        <td>
                            Phải sử dụng máy
                            mỗi khi ngủ
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<section class="wrapper-tuy-chinh-ahi w100">
    <div class="w1000">
        <div class="content-section w100">
            <p>
                Tùy thuộc vào chỉ số “AHI” của bệnh nhân để xác định mức độ nặng nhẹ của bệnh nhân để có phương pháp điều trị thích hợp.
            </p>
            <p>
                Các phương pháp điều trị “ngưng thở khi ngủ” bao gồm:
            </p>
            <div class="sub-title">
                Thay đổi hành vi (Changing behaviors)
            </div>
            <p>
            Áp dụng cho bệnh nhân ở mức độ nhẹ như thay đổi tư thế, giảm cân…
            </p>
            <div class="sub-title">
                Thiết bị răng hàm (Oral Appliances)
            </div>
            <p>
            Một thiết bị răng miệng, thường được gọi là thiết bị định vị lại hàm dưới (MRD), có thể là một lựa chọn liệu pháp thứ hai và có thể được xem xét cho những bệnh nhân bị ngưng thở khi ngủ từ nhẹ đến trung bình. Nó là một thiết bị răng miệng có thể điều chỉnh được tùy chỉnh có sẵn từ nha sĩ để giữ hàm dưới ở vị trí phía trước trong khi ngủ. Sự nhô ra cơ học này mở rộng không gian phía sau lưỡi, gây căng thẳng lên các thành hầu để giảm sự sụp đổ của đường thở và giảm rung vòm miệng.
            </p>
            <div class="sub-title">
            Phẫu Thuật (Surgery)
            </div>
            <p>
            Uvulopalatopharyngoplastry (UPPP) là một thủ tục loại bỏ mô mềm ở phía sau cổ họng và vòm miệng của bạn cũng như mở rộng đường thở khi mở cổ họng.

            UPPP đã được sử dụng rộng rãi để điều trị chứng ngáy ngủ hoặc OSA, nhưng không được khuyến cáo là lựa chọn điều trị đầu tiên 2 . Phẫu thuật này liên quan đến việc loại bỏ các amidan, mềm vòm miệng / lưỡi gà và có những rủi ro nhất định có liên quan đến 3 .(Nguồn: Tác dụng và tác dụng phụ của phẫu thuật đối với chứng ngủ ngáy và tắc nghẽn ngưng thở- Một tổng quan hệ thống (SLEEP, tập 32, số 1 năm 2009.)
            </p>
            <div class="sub-title">
            Liệu pháp CPAP/Bilevel
            </div>
            <p>
            Theo nghiên cứu của hiệp hội giấc ngủ Hoa Kỳ (ASSM) liệu pháp CPAP là tiêu chuẩn vàng trong điều trị Ngưng Thở Khi Ngủ
            </p>

            <div class="wrapper-image">
                <img src="/images/dieu-tri/hinh anh web-32.png" class="w100"/>
            </div>
        </div>
    </div>
</section>
<?php echo $this->render("//element/home/risk-when-sleep"); ?>
<?php echo $this->render("//element/home/try"); ?>
<?php echo $this->render("//element/home/video"); ?>
<?php echo $this->render("//element/home/advisory"); ?>