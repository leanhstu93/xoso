<form action="/admin/form/create" method="post"
      class="wpcf7-form">
    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
    <div class="contact-form style-three">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="form-group">
                    <span class="fas fa-user"></span>
                    <input type="text"
                           name="Form[name]"
                           class="form-control"
                           value=""
                           placeholder="Họ và tên"
                           required>
                </div>
            </div>
            <div class="col-md-12 column">
                <div class="form-group"><span
                        class="fas fa-envelope"></span><input
                        type="email" name="Form[email]"
                        class="form-control required email" value=""
                        placeholder="Email" required></div>
            </div>
            <div class="col-md-12 column">
                <div class="form-group"><span
                        class="fas fa-phone"></span>
                    <input  type="text" name="Form[phone]"
                            class="form-control" value=""
                            placeholder="Điện thoại" required></div>
            </div>
            <div class="col-md-12 column">
                <div class="form-group"><span class="fas fa-comment"></span><textarea
                        name="Form[content]"
                        class="form-control textarea required"
                        placeholder="Lời nhắn"></textarea></div>
            </div>
        </div>
        <div class="contact-section-btn">
            <div class="form-group style-two text-center"><input
                    id="form_botcheck" name="form_botcheck"
                    class="form-control" type="hidden" value="">
                <button class="theme-btn btn-style-one w-100" type="submit"
                        data-loading-text="Please wait...">Gửi chúng tôi
                </button>
            </div>
        </div>
    </div>
    <div class="wpcf7-response-output wpcf7-display-none"></div>
</form>