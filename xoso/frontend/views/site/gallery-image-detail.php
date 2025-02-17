<?php

use frontend\models\Product;
use yii\widgets\LinkPager;

/**
 * @var $categories
 * @var $page
 * @var $bread
 * @var $pages
 */


echo $this->render("//element/page-title",['name' => $data->name, 'bread' => $bread]);
?>
<section data-kc-fullwidth="content" class="kc-elm kc-css-460340 kc_row"><div class="kc-row-container"><div class="kc-wrap-columns"><div class="kc-elm kc-css-265597 kc_col-sm-12 kc_column kc_col-sm-12"><div class="kc-col-container"><section class=" single-project sp-two">
                        <div class="container">
                            <!-- Project info -->
                            <div class="project-info">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="project-info-block">
                                            <div class="icon"><span class="icon-note"></span></div>
                                            <h4><?= Yii::$app->view->params['lang']->category ?></h4>
                                            <div class="text">Finance Management</div>
                                        </div>
                                    </div>


                                    <div class="col-lg-3 col-md-6">
                                        <div class="project-info-block">
                                            <div class="icon"><span class="icon-man"></span></div>
                                            <h4><?= Yii::$app->view->params['lang']->infor ?></h4>
                                            <div class="text">Kalia Technologies</div>
                                        </div>
                                    </div>


                                    <div class="col-lg-3 col-md-6">
                                        <div class="project-info-block">
                                            <div class="icon"><span class="icon-agenda"></span></div>
                                            <h4><?= Yii::$app->view->params['lang']->execution_time ?></h4>
                                            <div class="text">Sepetember 14, 2018</div>
                                        </div>
                                    </div>


                                    <div class="col-lg-3 col-md-6">
                                        <div class="project-info-block">
                                            <div class="icon"><span class="icon-url"></span></div>
                                            <h4><?= Yii::$app->view->params['lang']->contact_information ?></h4>
                                            <div class="text">www.yourwebsite.com</div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section></div></div></div></div></section><section class="kc-elm kc-css-255960 kc_row"><div class="kc-row-container  kc-container"><div class="kc-wrap-columns"><div class="kc-elm kc-css-254885 kc_col-sm-12 kc_column kc_col-sm-12"><div class="kc-col-container"><section class=" project-description sp-two">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="title">
                                        <h2><?= $data->name ?></h2>
                                    </div>
                                </div>
                                <div class="col-lg-8">

                                    <div class="row">
                                        <?= $data->content ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div></div></div></div></section>


                    <section class="case-section-two sp-two">
                        <div class="container">
                            <div class="sec-title centered">
                                <div class="title-section">Dự án liên quan</div>
                            </div>
                            <div class="three-item-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
                                <?php foreach ($dataRL as $item) { ?>
                                    <?php echo $this->render("//element/project/item-rl",['data' => $item,]); ?>
                                <?php } ?>

                            </div>
                        </div>
                    </section>

                </div></div></div></div></section>

<?php echo $this->render("//element/news-letter-home"); ?>
