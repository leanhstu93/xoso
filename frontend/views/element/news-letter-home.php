<!-- Newsletter section -->
<section class="newsletter-section">
    <div class="container">
        <div class="inner-container">
            <div class="row clearfix">

                <!--Form Column-->
                <div class="form-column col-lg-9">
                    <div class="inner-column">

                        <div class="title-content">

                            <h4><span class="icon-news"></span><?= $this->params['lang']->newsletter_subscription ?></h4>
                        </div><!-- /.title-content -->

                        <!--Subscribe Form-->
                        <div class="subscribe-form">
                            <form method="post" action="">
                                <div class="form-group">
                                    <input type="email" name="email" value="" placeholder="<?= $this->params['lang']->enter_email ?>" required="">
                                    <button type="submit" class="theme-btn"><span class="icon-arrow"></span></button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

                <!--Right Column-->
                <div class="right-column col-lg-3">
                    <div class="inner-column">
                        <div class="icon-box">
                            <span class="icon-null"></span>
                        </div>
                        <h4>Study Materials</h4>
                        <div class="title">Download Now</div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>