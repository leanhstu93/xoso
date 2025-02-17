<?php

use frontend\models\Province;
use yii\helpers\Html;
use kartik\select2\Select2;

?>
<section class="wrapper-advisory w100">
    <div class="w1000">
        <div class="wrapper-items">
            <div class="item">
                <div class="float-right">
                        <div class="title-item">
                            Hãy gửi </br>
                        câu hỏi bạn cần  </br>
                        chứng tôi tư vấn
                        </div>
                    <p>
                        Chúng tôi luôn sẵn sàng phục vụ và chăm sóc giấc ngủ
                        của bạn, cho bạn một sức khỏe tốt với giấc ngủ ngon.
                    </p>
                </div>
            </div>
            <div class="item">
                <form action="/admin/form/create" method="post"
                      class="wpcf7-form form-advisory">

                    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                    <div class="form-group">
                        <label>
                            Họ tên
                        </label>
                        <input type="text"
                               name="Form[name]"
                               class="form-control"
                               value=""
                               placeholder="Họ và tên"
                               required>
                    </div>
                    <div class="form-group">
                        <label>
                            Điện thoại
                        </label>
                        <input  type="text" name="Form[phone]"
                                class="form-control" value=""
                                placeholder="Điện thoại" required>
                    </div>
                    <div class="form-group">
                        <label>
                            Tỉnh thành
                        </label>
                        <?php
                        $proviceAll = Province::find()->asArray()->all();

                        $listCate = array_combine(array_column($proviceAll,'id'),array_column($proviceAll,'_name'));

                        echo Select2::widget([
                            'name' => 'Form[province_id]',
                            'value' => '',
                            'data' => $listCate,
                            'options' => ['multiple' => false, 'placeholder' => 'Chọn tỉnh thành  ...']
                        ]);
                        ?>
                    </div>
                    <div class="form-group">
                        <label>
                            Lời nhắn
                        </label>
                        <textarea
                                name="Form[content]"
                                class="form-control textarea required"
                                placeholder="Lời nhắn"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit"
                                data-loading-text="Please wait...">
                            Gửi <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>