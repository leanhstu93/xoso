<div class="item swiper-slide">
    <a href="<?php echo $data->getUrl()?>">
        <div class="wrapper-image">
            <img src="<?= $data->image ?>"
                 class="w100" alt="<?= $data->name ?>"/>
            <div class="category-name">
                <?php echo $data->category->name ?>
            </div>
            <ul class="date">
                <li>Th<?php echo date('m',$data->date_create) ?></li>
                <li><?php echo date('d',$data->date_create) ?></li>
                <li><?php echo date('Y',$data->date_create) ?></li>
            </ul>
        </div>
    </a>
    <div class="wrapper-info">
        <a href="<?php echo $data->getUrl()?>" class="title w100">
            <?php echo $data->name ?>
        </a>
        <div class="desc w100">
            <?php echo $data->getDescriptionCut(300) ?>
        </div>
        <a class="btn btn-view-more" href="<?php echo $data->getUrl()?>">
            Xem thêm <i class="fal fa-chevron-right"></i>
        </a>
    </div>
</div>
