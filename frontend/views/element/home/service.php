<?php
use frontend\models\Service;

?>
<section class="service-home w100">
    <div class="w1000">
        <div class="wrapper-content">
            <div class="title-section-home">
                DỊCH VỤ THINK DESIGNER
            </div>
            <div class="title-section-large">
                Think - Designer giải pháp tiếp thị Marketing Online

            </div>
           <div class="wrapper-items">
               <?php
               $data = Service::find()->where(['option' => Service::OPTION_HOT, 'active' => 1])->limit(3)->orderBy(Service::ORDER_BY)->all();
               if ($data) {
                   foreach ($data as $item) {
                   ?>
                   <div class="item">
                       <div class="wrapper-icon">
                           <?php echo $item->icon?>
                       </div>
                       <div class="title w100 text-center">
                           <?php echo $item->name?>
                       </div>
                       <div class="desc w100 text-center">
                           <?php echo $item->desc?>
                       </div>
                   </div>
               <?php }} ?>
           </div>

        </div>
    </div>
</section>
